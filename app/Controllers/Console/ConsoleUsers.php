<?php
namespace App\Controllers\Console;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use App\Models\User;

class ConsoleUsers extends Controller
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
        
        $data['title'] = 'Console - Users';
        $userDetails = $this->_user->getUseDetailsFromID(Session::get('userID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/User', $data);
        View::renderTemplate('footer', $data, 'Console');
    }

}
