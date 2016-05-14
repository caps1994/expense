<?php
namespace App\Models;

use Core\Model;

class Band extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getBands($root_account)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."band_groups WHERE root_account_id = :root_account", array(':root_account' => $root_account));
        return $data;
    }
    
    public function getBand($root_account, $band_group_id)
    {
        $data = $this->db->select("SELECT * FROM ".PREFIX."band_groups WHERE root_account_id = :root_account AND band_group_id = :band_group_id", array(':root_account' => $root_account, 'band_group_id' => $band_group_id));
        return $data;
    }

    public function addBand($data)
    {
        $this->db->insert(PREFIX.'band_groups', $data);
        return $this->db->lastInsertId('band_group_id');
    }
    
    public function updateBand($data, $where)
    {
        $this->db->update(PREFIX.'band_groups', $data, $where);
        return $this->db->lastInsertId('band_group_id');
    }

    public function deleteBand($id)
    {
        $this->db->delete();
    }
}
