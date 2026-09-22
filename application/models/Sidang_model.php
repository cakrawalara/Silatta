<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Sidang_model extends CI_Model
{
	function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

   
    
    function getDosen()
    {
        $this->db->select('dosenId, dosen');
        $this->db->from('tbl_dosen');
        $this->db->where('dosenId !=', NULL);
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
        $this->db->select('accSidang1, accSidang2, sidangId, userId, name, nim, dosenId, judul, dosenId2, penguji2Id, tempatSidang, tanggalSidang, linkSidang');
        $this->db->from('tbl_sidang');
		$this->db->where('dosenId !=', NULL);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    function editUser3($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo2);
        
        return TRUE;
    }

    function editUser2($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }


}
