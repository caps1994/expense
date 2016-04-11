<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Password;
use Helpers\Url;
use Helpers\Request;
use Helpers\Csrf;
use App\Models\User;
use App\Controllers\Email;

class Register extends Controller
{
    private $_model;
    private $_email;
    public function __construct()
    {
        parent::__construct();
        $this->_model = new User();
        $this->_email = new Email();
    }
    
    public function index()
    {
        $data['title'] = 'Register';

        if(Request::isPost())
        {
            $details = array('firstname' => ucfirst(Request::post('form-firstname')),
                             'surname' => ucfirst(Request::post('form-surname')),
                             'company' => ucfirst(Request::post('form-company')),
                             'email' => Request::post('form-email'),
                             'password' => Request::post('form-password'),
                             );
            
            $password_confirm = Request::post('form-password-confirm');
            
            if (Csrf::isTokenValid('csrfTokenRegister'))
            {
                
                if(isset($details['firstname'])
                   && isset($details['surname'])
                   && isset($details['email'])
                   && isset($details['password']))
                {
                    if($details['password'] != $password_confirm)
                    {
                        $error[] = 'Passwords do not match';
                    }
                    elseif(!filter_var($details['email'], FILTER_VALIDATE_EMAIL))
                    {
                        $error[] = 'Email address is not valid';
                    }
                    else
                    {
                        $details['password'] = Password::make($details['password']);
                        $this->_model->register($details);
                        $this->_email->send(array('address' => $details['email'],
                                                  'subject' => 'Thanks for registering',
                                                  'message' => 'Thank you for registering,'
                                                  ));
                        Url::redirect('thank-you');
                    }
                }
            }
        }
            
        View::renderTemplate('header', $data, 'Login');
        View::render('Register/Index', $data, $error);
        View::renderTemplate('footer', $data, 'Login');
    }
}
