<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Controllers\Email;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Request;
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
        
        if($token === $user_token)
        {
            $this->_token->activateClientUser(array('enabled' => 0), array('user_id' => Request::get('id')));
            echo 'correct token, you have been activated';
        }
        
        //View::renderTemplate('header', $data);
        //View::render('UserActivation/Activate', $data);
        //View::renderTemplate('footer', $data);
    }
}
