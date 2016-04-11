<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function getUserDetailsFromEmail($email)
    {
         $data = $this->db->select("SELECT * FROM ".PREFIX."root_account WHERE email = :email", array(':email' => $email));
         return $data[0];
    }
    
    public function getUseDetailsFromID($account_id)
    {
         $data = $this->db->select("SELECT * FROM ".PREFIX."root_account WHERE account_id = :account_id", array(':account_id' => $account_id));
         return $data[0];
    }
    
    public function getHash($email)
    {
        $data = $this->db->select("SELECT password FROM ".PREFIX."root_account WHERE email = :email", array(':email' => $email));
        return $data[0]->password;
    }
    
    public function getAuthKey($email)
    {   //not in use
        $data = $this->db->select("SELECT auth_key FROM ".PREFIX."root_account WHERE email = :email", array(':email' => $email));
        return $data[0]->password;
    }
    
    public function register($data)
    {
        $this->db->insert(PREFIX.'root_account', $data);
        return $this->db->lastInsertId('account_id');
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
