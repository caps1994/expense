<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;

class Console extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'index';
        //TODO lock down index and do console templates in Templates/Console
        View::renderTemplate('header', $data);
        View::render('Console/Index', $data);
        View::renderTemplate('footer', $data);
    }

}
