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

class Auth extends Controller
{
    private $_model;
    
    public function __construct()
    {
        parent::__construct();
        $this->_model = new User();
        
    }

    public function login()
    {
        //echo password_hash("test", PASSWORD_DEFAULT)."\n";
        if(Request::isPost())
        {
            $username = Request::post('form-username');
            $password = Request::post('form-password');

            if (Csrf::isTokenValid('csrfTokenLogin'))
            {
                //TODO CORRECT VALIDATION
                if(Password::verify($password, $this->_model->getHash($username)))
                {
                    Session::set('loggedin', true);
                    Session::set('authKey', $this->_model->getHash($username));
                    Url::redirect('console');
                }
                else
                {
                    $error[] = 'Password is incorrect';
                }
            }
            else
            {
                Url::redirect('login');
            }
            //if validation is sucessful redirect to protected area.
            if(!$error)
            {
                
            }
        }
        $data['title'] = 'login';
        //TODO login form inside Templates/login
        View::renderTemplate('header', $data, 'Login');
        View::render('Login/index', $data, $error);
        View::renderTemplate('footer', $data, 'Login');
    }

    public function logout()
    {
        $data['title'] = 'logout';

        View::renderTemplate('header', $data);
        View::render('Console/Logout', $data);
        View::renderTemplate('footer', $data);
    }
}
