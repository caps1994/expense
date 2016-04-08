<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Console extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if(!Session::get('loggedin')){
            Url::redirect();
        }
        $data['title'] = 'index';
        //TODO lock down index and do console templates in Templates/Console
        View::renderTemplate('header', $data, 'Login');
        View::render('Console/Index', $data);
        View::renderTemplate('footer', $data, 'Login');
    }

}
