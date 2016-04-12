<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Password;
use Helpers\Url;
use Helpers\Request;
use Helpers\Csrf;
use App\Models\RootUser;

class Auth extends Controller
{
    private $_model;
    
    public function __construct()
    {
        parent::__construct();
        $this->_model = new RootUser();
        
    }

    public function login()
    {
        if(Session::get('loggedin')){
            Url::redirect('console/');
        }
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
                    Session::set('userID', $this->_model->getUserDetailsFromEmail($username)->account_id);
                    //TODO Create authkey
                    Session::set('authKey', $this->_model->getHash($username));
                    Url::redirect('console/dashboard');
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
        Session::destroy('loggedin');
        Session::destroy('authKey');
        Session::destroy('userID');
        Url::redirect();
    }
}
