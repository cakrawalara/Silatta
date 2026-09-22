<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_dosen_model extends CI_Model
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
        $this->db->select('dosenId, dosen, email, mobile, jenisKelamin, alamat, tanggalLahir, agama, nip');
        $this->db->from('tbl_dosen');
		$this->db->where('dosenId !=', NULL);
        $this->db->where('dosenId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editUser($userInfo, $userId)
    {
        $this->db->where('dosenId', $userId);
        $this->db->update('tbl_dosen', $userInfo);
        
        return TRUE;
    }

    function editUser2($userInfo2, $userId)
    {
        $this->db->where('dosenId', $userId);
        $this->db->update('tbl_dosen', $userInfo2);
        
        return TRUE;
    }
    function editUser3($userInfo, $userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->update('tbl_dosen2', $userInfo);
        
        return TRUE;
    }
    function editUser4($userInfo3, $userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->update('tbl_dosen2', $userInfo3);
        
        return TRUE;
    }
    function editUser5($userInfo, $userId)
    {
        $this->db->where('reviewerId', $userId);
        $this->db->update('tbl_reviewer', $userInfo);
        
        return TRUE;
    }
    function editUser6($userInfo4, $userId)
    {
        $this->db->where('reviewerId', $userId);
        $this->db->update('tbl_reviewer', $userInfo4);
        
        return TRUE;
    }
    function editUser7($userInfo, $userId)
    {
        $this->db->where('penguji2Id', $userId);
        $this->db->update('tbl_penguji2', $userInfo);
        
        return TRUE;
    }
    function editUser8($userInfo5, $userId)
    {
        $this->db->where('penguji2Id', $userId);
        $this->db->update('tbl_penguji2', $userInfo5);
        
        return TRUE;
    }
    function editUser9($userInfo, $userId)
    {
        $this->db->where('moderatorId', $userId);
        $this->db->update('tbl_moderator', $userInfo);
        
        return TRUE;
    }
    function editUser10($userInfo6, $userId)
    {
        $this->db->where('moderatorId', $userId);
        $this->db->update('tbl_moderator', $userInfo6);
        
        return TRUE;
    }
    function editUser11($userInfo7, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo7);
        
        return TRUE;
    }



   



}
