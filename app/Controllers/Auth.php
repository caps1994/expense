<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;

class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'index';

        View::renderTemplate('header', $data);
        View::render('Auth/Index', $data);
        View::renderTemplate('footer', $data);
    }

        public function login()
    {
        $data['title'] = 'login';
        //TODO login form inside Templates/login
        View::renderTemplate('header', $data, 'Login');
        View::render('Console/Login', $data);
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
