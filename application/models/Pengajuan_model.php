<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
	function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getDosen()
    {
        $this->db->select('dosenId, dosen');
        $this->db->from('tbl_dosen');
        $this->db->where('available ', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getDosen2()
    {
        $this->db->select('dosenId2, dosen2');
        $this->db->from('tbl_dosen2');
        $this->db->where('dosenId2 !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getUserInfo($userId)
    {
        $this->db->select('pengajuanId, userId, name, ajuan1, ajuan2, dosenId, dosenId2');
        $this->db->from('tbl_pengajuan');
		$this->db->where('dosenId !=', NULL);
        $this->db->where('dosenId2 !=', NULL);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo);
        
        return TRUE;
    }


}
