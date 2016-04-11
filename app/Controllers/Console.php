<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use App\Models\User;

class Console extends Controller
{
    private $_user;
    
    public function __construct()
    {
        parent::__construct();
        $this->_user = new User();
    }
    
    public function index()
    {
        if(!Session::get('loggedin')){
            Url::redirect('login');
        }
        
        $data['title'] = 'Console';
        $data['firstname'] = $this->_user->getUseDetailsFromID(Session::get('userID'))->firstname;
        $data['lastname'] = $this->_user->getUseDetailsFromID(Session::get('userID'))->surname;
        //TODO lock down index and do console templates in Templates/Console
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/Index', $data);
        View::renderTemplate('footer', $data, 'Console');
    }

}
