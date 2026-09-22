<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model
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
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.email, BaseTbl.mobile, BaseTbl.dosenId, BaseTbl.dosenId2, BaseTbl.jenisKelamin, BaseTbl.alamat, BaseTbl.tanggalLahir, BaseTbl.agama, BaseTbl.alamatOrtu, BaseTbl.alamatKos, BaseTbl.namaBapak, BaseTbl.namaIbu, BaseTbl.mobileOrtu, BaseTbl.nim, Pengajuan.ajuan1, Pengajuan.ajuan2');
        $this->db->from('tbl_mahasiswa as BaseTbl');
        $this->db->join('tbl_pengajuan as Pengajuan', 'Pengajuan.userId = BaseTbl.userId','left');
		$this->db->where('BaseTbl.dosenId !=', NULL);
        $this->db->where('BaseTbl.userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo);
        
        return TRUE;
    }

    function editUser2($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo2);
        
        return TRUE;
    }

    function editUser3($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo2);
        
        return TRUE;
    }

     function editUser4($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo2);
        
        return TRUE;
    }
     function editUser5($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo2);
        
        return TRUE;
    }
     function editUser6($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo2);
        
        return TRUE;
    }

    function editUser7($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo3);
        
        return TRUE;
    }



}
