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
use App\Models\Band;
use App\Models\Departments;

class ConsoleUsers extends Controller
{
    private $_root_user;
    private $_client_users;
    private $_email;
    private $_bands;
    private $_departments;
    
    public function __construct()
    {
        parent::__construct();
        $this->_root_user = new RootUser();
        $this->_client_users = new ClientUsers();
        $this->_bands = new Band;
        $this->_email = new Email();
        $this->_departments = new Departments();
    }
    
    public function showClientUsers()
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        $data['title'] = 'Console - Users';
        $userDetails = $this->_root_user->getUseDetailsFromID(Session::get('rootuserID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        $data['clientUsers'] = $this->_client_users->getClientUsers(Session::get('rootuserID'));
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/ShowClientUsers', $data);
        View::renderTemplate('footer', $data, 'Console');
    }
    
    public function addClientUser()
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        if(Request::isPost())
        {
            $details = array('root_account_id' => Session::get('rootuserID'),
                             'firstname' => ucfirst(strtolower(Request::post('form-firstname'))),
                             'surname' => ucfirst(strtolower(Request::post('form-surname'))),
                             'email' => Request::post('form-email'),
                             'band'  => Request::post('form-band'),
                             'job_title' => Request::post('form-jtitle'),
                             'is_manager' => (Request::post('form-ismanager') == NULL ? 1 : Request::post('form-ismanager')),
                             'department' => Request::post('form-department'),
                             'manager' => Request::post('form-manager'),
                             );
            
            if (Csrf::isTokenValid('csrfToken'))
            {
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
                        if($this->_root_user->getEmailCount($details['email'])->count >= 1)
                        {
                            $error[] = 'Email in already in use';
                        }
                        else
                        {
                                $account_id = $this->_client_users->addClientUser($details);
                            
                            $key = array('user_id' => (int)$account_id,
                                 'token_key' => md5(microtime().rand()));
                            
                            $this->_client_users->createActivationKey($key);
                            
                            $this->_email->send(array('address' => $details['email'],
                                                      'subject' => 'You have been enrolled on Expense! - Please Activate now',
                                                      'message' => 'Thank you for registering, please click on the link below
                                                      ' . SITEURL.'useractivation/activate/'.$this->_client_users->getActivationKey($account_id)->token_key.
                                                      '?id='.$this->_client_users->getActivationKey($account_id)->user_id.'&root='.$this->_client_users->getClientUser(Session::get('rootuserID'), $account_id)[0]->root_account_id
                                                      ));
                            Url::redirect('console/users/');
                        } 
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
        $data['bands'] = $this->_bands->getBands(Session::get('rootuserID'));
        $data['managers'] = $this->_client_users->getManagers(Session::get('rootuserID'));
        $data['departments'] = $this->_departments->getDepartments(Session::get('rootuserID'));
        $data['csrfToken'] = Csrf::makeToken('addClientUser');
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/AddUser', $data, $error);
        View::renderTemplate('footer', $data, 'Console');
    }
    
    public function editClientUser($user_id)
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        if(Request::isPost())
         {

            $details = array('firstname' => ucfirst(strtolower(Request::post('form-firstname'))),
                             'surname' => ucfirst(strtolower(Request::post('form-surname'))),
                             'email' => Request::post('form-email'),
                             'band'  => Request::post('form-band'),
                             'enabled' => Request::post('form-status'),
                             'job_title' => Request::post('form-jtitle'),
                             'is_manager' => (Request::post('form-ismanager') == NULL ? 1 : Request::post('form-ismanager')),
                             'department' => Request::post('form-department'),
                             'manager' => Request::post('form-manager'),
                             );
            
            if (Csrf::isTokenValid('csrfToken'))
            {
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
                        if($this->_root_user->getEmailCount($details['email'])->count >= 1)
                        {
                            $error[] = 'Email in already in use';
                        }
                        else
                        {
                            $this->_client_users->updateClientUser($details, array('user_id' => $user_id));
                        
                            Url::redirect('console/users/');
                        }
                    }
                }
            }
         }
        
            $data['title'] = 'Console - Edit User';
            $userDetails = $this->_root_user->getUseDetailsFromID(Session::get('rootuserID'));
            $data['firstname'] = $userDetails->firstname;
            $data['lastname'] = $userDetails->surname;
            $data['clientUser'] = $this->_client_users->getClientUser(Session::get('rootuserID'), $user_id);
            $data['managers'] = $this->_client_users->getManagers(Session::get('rootuserID'));
            $data['bands'] = $this->_bands->getBands(Session::get('rootuserID'));
            $data['departments'] = $this->_departments->getDepartments(Session::get('rootuserID'));
            $data['csrfToken'] = Csrf::makeToken('editClientUser');
            View::renderTemplate('header', $data, 'Console');
            View::render('Console/EditClientUsers', $data, $error);
            View::renderTemplate('footer', $data, 'Console');
        
        
    }

}
