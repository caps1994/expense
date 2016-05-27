<?php
namespace App\Controllers\Console;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use App\Models\RootUser;

class ConsoleDashboard extends Controller
{
    private $_user;
    
    public function __construct()
    {
        parent::__construct();
        $this->_user = new RootUser();
    }
    
    public function index()
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        $data['title'] = 'Console';
        $userDetails = $this->_user->getUseDetailsFromID(Session::get('userID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        View::renderTemplate('header', $data, 'Console');
        //View::render('Console/Index', $data);
        View::renderTemplate('footer', $data, 'Console');
    }

}
