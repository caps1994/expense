<?php
namespace App\Controllers\Console;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Request;
use App\Models\RootUser;
use App\Models\ClientUsers;
use App\Controllers\Email;
class ConsoleUsers extends Controller
{
    private $_root_user;
    private $_client_users;
    private $_email;
    public function __construct()
    {
        parent::__construct();
        $this->_root_user = new RootUser();
        $this->_client_users = new ClientUsers();
        $this->_email = new Email();
    }
    
    public function index()
    {
        if(!Session::get('loggedin')){
            Url::redirect('login');
        }
        
        $data['title'] = 'Console - Users';
        $userDetails = $this->_root_user->getUseDetailsFromID(Session::get('userID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/User', $data);
        View::renderTemplate('footer', $data, 'Console');
    }
    
    public function addClientUser()
    {
        if(!Session::get('loggedin')){
            Url::redirect('login');
        }
        
        if(Request::isPost())
        {
            $details = array('root_account_id' => Session::get('userID'),
                             'firstname' => ucfirst(Request::post('form-firstname')),
                             'surname' => ucfirst(Request::post('form-surname')),
                             'email' => Request::post('form-email'),
                             'band'  => Request::post('form-band'),
                             'post' => Request::post('form-post'),
                             );
            
            if (Csrf::isTokenValid('csrfToken'))
            {
                var_dump($details);
                if(isset($details['firstname'])
                   && isset($details['surname'])
                   && isset($details['email']))
                {
                    if(!filter_var($details['email'], FILTER_VALIDATE_EMAIL))
                    {
                        $error[] = 'Email address is not valid';
                    }
                    else
                    {
                        $this->_client_users->addClientUser($details);
                        $this->_email->send(array('address' => $details['email'],
                                                  'subject' => 'Thanks for registering',
                                                  'message' => 'Thank you for registering,'
                                                  ));
                        Url::redirect('thank-you');
                    }
                }
            }
        }
        $error = array();
        $data['title'] = 'Console - Add Client User';
        $rootUserDetails = $this->_root_user->getUseDetailsFromID(Session::get('userID'));
        $data['firstname'] = $rootUserDetails->firstname;
        $data['lastname'] = $rootUserDetails->surname;
        $data['root_account_id'] = $rootUserDetails->account_id;
        $data['csrfToken'] = Csrf::makeToken('addClientUser');
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/AddUser', $data, $error);
        View::renderTemplate('footer', $data, 'Console');
    }

}
