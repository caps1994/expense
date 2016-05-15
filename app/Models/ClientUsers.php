<?php
namespace App\Models;

use Core\Model;

class ClientUsers extends Model
{
    public function __construct()
    {
        parent::__construct();
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
        return $this->db->lastInsertId('account_id');
    }
    
    public function createActivationKey($data)
    {
        $this->db->insert(PREFIX.'user_activation_tokens', $data);
        return $this->db->lastInsertId('activation_id');
    }

    public function activateClientUser($date, $id)
    {
        $this->db->update(PREFIX.'client_users', $data, $id);
        return $this->db->lastInsertId('account_id');
    }
    
    public function deleteClientUser($id)
    {
        $this->db->delete();
    }
}
