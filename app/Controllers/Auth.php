<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Password;
use Helpers\Url;
use Helpers\Request;
class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if(isset($_POST['login_submit']))
        {
            $username = $_POST['form_username'];
            $password = $_POST['form_password'];
            
            print_r($username);
            if($username == '')
            {
                $error[] = 'Username is Required';
            }
            
            if(!$error)
            {
                
            }
        }
        $data['title'] = 'login';
        //TODO login form inside Templates/login
        View::renderTemplate('header', $data, 'Login');
        View::render('Login/index', $data, $error);
        View::renderTemplate('footer', $data, 'login');
    }

    public function logout()
    {
        $data['title'] = 'logout';

        View::renderTemplate('header', $data);
        View::render('Console/Logout', $data);
        View::renderTemplate('footer', $data);
    }
}
