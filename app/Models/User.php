<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getHash($email)
    {
        $data = $this->db->select("SELECT password FROM ".PREFIX."root_account WHERE email = :email", array(':email' => $email));
        return $data[0]->password;
    }
    
    public function getAuthKey($email)
    {
        $data = $this->db->select("SELECT auth_key FROM ".PREFIX."root_account WHERE email = :email", array(':email' => $email));
        return $data[0]->password;
    }
    
    public function add()
    {
       
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
