<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Controllers\Email;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Request;

class UserActivation extends Controller
{
    private $_email;
    
    public function __construct()
    {
        parent::__construct();
        $this->_email = new Email();
    }
    
    public function index()
    {
        Url::redirect();
    }

    public function activate()
    {
        $data['title'] = 'activate';

        View::renderTemplate('header', $data);
        View::render('UserActivation/Activate', $data);
        View::renderTemplate('footer', $data);
    }
}
