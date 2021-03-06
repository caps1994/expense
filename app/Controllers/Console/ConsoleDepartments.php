<?php
namespace App\Controllers\Console;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Request;
use App\Models\RootUser;
use App\Models\Departments;

class ConsoleDepartments extends Controller
{
    private $_root_user;
    private $_client_users;
    private $_email;
	private $_departments;
	
    public function __construct()
    {
        parent::__construct();
        $this->_root_user = new RootUser();
        $this->_departments = new Departments();
    }
    
    public function showDepartments()
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        $data['title'] = 'Console - Users';
        $userDetails = $this->_root_user->getUseDetailsFromID(Session::get('rootuserID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        $data['departments'] = $this->_departments->getDepartments(Session::get('rootuserID'));
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/ShowDepartments', $data);
        View::renderTemplate('footer', $data, 'Console');
    }
    
    public function addDepartment()
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
        if(Request::isPost())
        {
            $details = array('root_account_id' => Session::get('rootuserID'),
                             'department_name' => strtoupper(Request::post('form-depname')),
                             );
            
            if (Csrf::isTokenValid('csrfToken'))
            {
                if(isset($details['department_name']))
                {
                    if(!$details['department_name'])
                    {
                        $error[] = 'Department Name is required';
                    }
                    else
                    {
                        $this->_departments->addDepartment($details);
                        
                        Url::redirect('console/departments/');
                    }
                }
            }
        }
        
        $data['title'] = 'Console - Add Department';
        $rootUserDetails = $this->_root_user->getUseDetailsFromID(Session::get('userID'));
        $data['firstname'] = $rootUserDetails->firstname;
        $data['lastname'] = $rootUserDetails->surname;
        $data['root_account_id'] = $rootUserDetails->account_id;
        $data['csrfToken'] = Csrf::makeToken('addBandGroup');
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/AddDepartment', $data, $error);
        View::renderTemplate('footer', $data, 'Console');
    }
    
    public function editDepartment($band_group_id)
    {
        if(!Session::get('rootloggedin')){
            Url::redirect('login');
        }
        
       if(Request::isPost())
        {
            $details = array('band_group_name' => ucfirst(strtolower(Request::post('form-band-group'))),
                             'max_spend' => ucfirst(strtolower(Request::post('form-max-spend'))),
                             'notes' => Request::post('form-notes'),
                             'enabled'  => Request::post('form-status'),
                             );
            
            if (Csrf::isTokenValid('csrfToken'))
            {
               
                if(isset($details['band_group_name'])
                   && isset($details['max_spend']))
                {
                     
                    if(!$details['band_group_name'])
                    {
                        $error[] = 'Band Group Name is not valid';
                    }
                    else
                    {
                        echo 'im here';
                        $this->_band_groups->updateBand($details, array('band_group_id' => $band_group_id));
                        
                        Url::redirect('console/band-groups/');
                    }
                }
            }
        }
        
        
        $data['title'] = 'Console - Edit Band';
        $userDetails = $this->_root_user->getUseDetailsFromID(Session::get('rootuserID'));
        $data['firstname'] = $userDetails->firstname;
        $data['lastname'] = $userDetails->surname;
        $data['band'] = $this->_band_groups->getBand(Session::get('rootuserID'), $band_group_id);
        $data['csrfToken'] = Csrf::makeToken('editBandgroup');
        View::renderTemplate('header', $data, 'Console');
        View::render('Console/EditBand', $data, $error);
        View::renderTemplate('footer', $data, 'Console');
        
        
    }

}
