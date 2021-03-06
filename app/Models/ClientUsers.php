<?php
namespace App\Models;

use Core\Model;

class ClientUsers extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getManagers($root_account)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."client_users WHERE root_account_id = :root_account AND is_manager = :is_manager AND enabled = :enabled", array(':root_account' => $root_account, ':is_manager' => 0, ':enabled' => 0));
        return $data;
    }
    
    public function getClientUsers($root_account)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."client_users WHERE root_account_id = :root_account", array(':root_account' => $root_account));
        return $data;
    }
    
    public function getClientUser($root_account, $user_id)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."client_users WHERE root_account_id = :root_account AND user_id = :user_id", array(':root_account' => $root_account, 'user_id' => $user_id));
        return $data;
    }

    public function addClientUser($data)
    {
        $data['date_created'] = date("Y-m-d H:i:s");
        $this->db->insert(PREFIX.'client_users', $data);
        return $this->db->lastInsertId('account_id');
    }
    
    public function updateClientUser($data, $where)
    {
        $data['date_created'] = date("Y-m-d H:i:s");
        $this->db->update(PREFIX.'client_users', $data, $where);
    }
    
    public function createActivationKey($data)
    {
        $data['created_at'] = $_SERVER['REQUEST_TIME'];
        $this->db->insert(PREFIX.'user_activation_tokens', $data);
        return $this->db->lastInsertId('activation_id');
    }
    
    public function getActivationKey($user_id)
    {
        $data = $this->db->select("SELECT user_id, token_key, created_at FROM ".PREFIX."user_activation_tokens WHERE user_id = :user_id", array('user_id' => $user_id));
        return $data[0];
    }

    public function activateClientUser($data, $id)
    {
        $this->db->update(PREFIX.'client_users', $data, $id);
        //$this->db->delete(PREFIX.user_activation_tokens, $id);
        return $this->db->lastInsertId('account_id');
    }
    
    public function deleteActivationToken($id)
    {
        $this->db->delete(PREFIX.user_activation_tokens, $id);
    }
    
    public function changePassword($data, $userid)
    {
        $this->db->update(PREFIX.'client_users', $data, $userid);
    }
    
    public function getEmailCount($email)
    {
         $data = $this->db->select("SELECT count(email) as count FROM ".PREFIX."client_users WHERE email = :email ", array(':email' => $email));
         return $data[0];
    }
    
    public function getHash($email)
    {
        $data = $this->db->select("SELECT password FROM ".PREFIX."client_users WHERE email = :email", array(':email' => $email));
        return $data[0]->password;
    }
    
   public function getUserDetailsFromEmail($email)
    {
         $data = $this->db->select("SELECT * FROM ".PREFIX."client_users WHERE email = :email", array(':email' => $email));
         return $data[0];
    }
    
    public function deleteClientUser($id)
    {
        $this->db->delete();
    }
}
