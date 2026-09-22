<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
       $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, Dosen.dosen, Dosen2.dosen2');
        $this->db->from('tbl_mahasiswa as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        if(!empty($searchText)) {
            $likeCriteria = "(Dosen.dosen  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, Dosen.dosen, Dosen2.dosen2');
        $this->db->from('tbl_mahasiswa as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        if(!empty($searchText)) {
            $likeCriteria = "(Dosen.dosen  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.dosenId !=', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
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
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId, dosenId, dosenId2');
        $this->db->from('tbl_mahasiswa');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo);
        
        return TRUE;
    }
    function editUser2($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }
    function editUser3($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo);
        
        return TRUE;
    }
    function editUser4($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
    function editUser5($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    
    
    
}

  