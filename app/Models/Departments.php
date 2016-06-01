<?php
namespace App\Models;

use Core\Model;

class Departments extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDepartments($root_account)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."departments WHERE root_account_id = :root_account", array(':root_account' => $root_account));
        return $data;
    }
    
    public function getDepartment($root_account, $department_id)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."departments WHERE root_account_id = :root_account AND department_id = :department_id", array(':root_account' => $root_account, 'department_id' => $department_id));
        return $data;
    }

    public function addDepartment($data)
    {
        $this->db->insert(PREFIX.'departments', $data);
        return $this->db->lastInsertId('department_id');
    }
    
    public function updateDepartment($data, $where)
    {
        $this->db->update(PREFIX.'departments', $data, $where);
        return $this->db->lastInsertId('departments');
    }

    public function deleteDepartment($id)
    {
        $this->db->delete();
    }
}
