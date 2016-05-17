<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Controllers\Email;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Request;
use Helpers\Password;
use App\Models\ClientUsers;

class UserActivation extends Controller
{
    private $_email;
    private $_token;
    
    public function __construct()
    {
        parent::__construct();
        $this->_email = new Email();
        $this->_token = new ClientUsers();   
    }
    
    public function index()
    {
        Url::redirect();
    }

    public function activate($token)
    {
        $data['title'] = 'activate';
        
        $user_token = $this->_token->getActivationKey(Request::get('id'))->token_key;
        $expire_time = $this->_token->getActivationKey(Request::get('id'))->created_at;
        $delta = 86400;//this is 24 hours in seconds
        
        if ($_SERVER["REQUEST_TIME"] - $expire_time > $delta)
        {
           echo 'Token has expired';
        }
        else
        {
            if($token === $user_token)
            {
                $error = array();
                $this->_token->activateClientUser(array('enabled' => 0), array('user_id' => Request::get('id')));
                $data['csrfToken'] = Csrf::makeToken('editClientUser');
                $data['user_id'] = base64_encode(Request::get('id'));
                $data['root_account'] = base64_encode(Request::get('root'));
                View::renderTemplate('header', $data);
                View::render('UserActivation/Activate', $data, $error);
                View::renderTemplate('footer', $data);
            }
            else
            {
                echo 'Token is not valid.';    
            }
        } 
    }
    
    public function changePassword()
    {
        
        if(Request::isPost())
        {
            
            $details = array('password' => Request::post('form-password'));
            
            $password_confirm = Request::post('form-password-confirm');
            
            if (Csrf::isTokenValid('csrfToken'))
            {
                if(isset($details['password']))
                { 
                    if($details['password'] != $password_confirm)
                    {
                        $error[] = 'Passwords do not match';
                    }
                    else
                    {
                        $details['password'] = Password::make($details['password']);
                        $this->_token->changePassword($details , array('user_id' =>  base64_decode(Request::post('user_id'))));
                        $this->_email->send(array('address' => $this->_token->getClientUser(base64_decode(Request::post('root')), base64_decode(Request::post('user_id')))[0]->email,
                                                  'subject' => 'Thanks! Now your account has been activated',
                                                  'message' => 'Thank you for activating!'
                                                  ));
                        Url::redirect('thank-you');
                    }
                }
            }
            else
            {
                Url::redirect();
            }
        }
        echo "im here";
        //View::render('Register/Index', $data, $error);
    }
}
