<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'Home';

        View::renderTemplate('header', $data);
        View::render('Pages/Index', $data);
        View::renderTemplate('footer', $data);
    }
    
    public function thankyouPage()
    {
        $data['title'] = 'Thank you for registering!';

         View::renderTemplate('header', $data, 'Login');
        View::render('Pages/thank-you', $data);
        View::renderTemplate('footer', $data, 'Login');
    }
    
}