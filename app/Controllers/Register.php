<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Password;
use Helpers\Url;
use Helpers\Request;

class Register extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'index';

        View::renderTemplate('header', $data, 'Login');
        View::render('Register/Index', $data);
        View::renderTemplate('footer', $data, 'Login');
    }

    public function register()
    {
        $data['title'] = 'register';

        View::renderTemplate('header', $data);
        View::render('Register/Register', $data);
        View::renderTemplate('footer', $data);
    }
}
