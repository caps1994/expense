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
use App\Models\ClientUsers;

class Auth extends Controller
{
    private $_root_user;
    private $_client_user;
    
    public function __construct()
    {
        parent::__construct();
        $this->_root_user = new RootUser();
        $this->_client_user = new ClientUsers();
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
               
                if($this->_root_user->getEmailCount($username)->count == 1)
                {
                    if($this->_root_user->getUserDetailsFromEmail($username)->enabled == 0)
                    {
                        //TODO CORRECT VALIDATION
                        if(Password::verify($password, $this->_root_user->getHash($username)))
                        {
                            Session::set('rootloggedin', true);
                            Session::set('rootuserID', $this->_root_user->getUserDetailsFromEmail($username)->account_id);
                            //TODO Create authkey
                            Session::set('rootauthKey', $this->_root_user->getHash($username));
                            Url::redirect('console/dashboard');
                        }
                        else
                        {
                            $error[] = 'Username or Passowrd incorrect';
                        }
                    }
                    else
                    {
                        $error[] = 'You account is not enabled!';
                    }
                }
                elseif($this->_client_user->getEmailCount($username)->count == 1)
                {
                    if($this->_client_user->getUserDetailsFromEmail($username)->enabled == 0)
                    {
                        //TODO CORRECT VALIDATION
                        if(Password::verify($password, $this->_client_user->getHash($username)))
                        {   
                            Session::set('clientloggedin', true);
                            Session::set('clientuserID', $this->_client_user->getUserDetailsFromEmail($username)->account_id);
                            //TODO Create authkey
                            Session::set('clientauthKey', $this->_client_user->getHash($username));
                            Url::redirect('client/dashboard');
                        }
                        else
                        {
                            $error[] = 'Username or Passowrd incorrect';
                        }
                    }
                    else
                    {
                        $error[] = 'You account is not enabled!';
                    }
                }
            }
            else
            {
                Url::redirect('login');
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
        if(Session::get('rootloggedin'))
        {
            Session::destroy('rootloggedin');
            Session::destroy('rootauthKey');
            Session::destroy('rootuserID');
            Url::redirect();
        }
        elseif(Session::get('loggedin'))
        {
            Session::destroy('clientloggedin');
            Session::destroy('clientauthKey');
            Session::destroy('clientuserID');
            Url::redirect();
        }
       
        Url::redirect();
    }
}
