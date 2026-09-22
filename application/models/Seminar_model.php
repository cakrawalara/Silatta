<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Seminar_model extends CI_Model
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
        $this->db->select('BaseTbl.accDosen1, BaseTbl.accDosen2, BaseTbl.seminarId, BaseTbl.userId, mahasiswa.name, mahasiswa.nim, mahasiswa.dosenId, BaseTbl.judul, mahasiswa.dosenId2, BaseTbl.reviewerId, BaseTbl.moderatorId, BaseTbl.tempat, BaseTbl.tanggal, BaseTbl.linkSeminar, ');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_mahasiswa as mahasiswa', 'mahasiswa.userId = BaseTbl.userId','left');
		$this->db->where('BaseTbl.dosenId !=', NULL);
        $this->db->where('BaseTbl.userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
    function editUser2($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo2);
        
        return TRUE;
    }
    function editUser3($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo3);
        
        return TRUE;
    }


}
