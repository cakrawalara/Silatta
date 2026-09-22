<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{

    public function isDuplicate_nim($userId)
    {
        $this->db->get_where('tbl_users', array('userId' => $userId), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;       
    }

	function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser2($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_mahasiswa', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser3($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_pengajuan', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser4($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_seminar', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser5($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_sidang', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId, nim');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
}