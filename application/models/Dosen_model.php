<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
       $this->db->select('userId, email, name');
        $this->db->from('tbl_sidang ');
        
        if(!empty($searchText)) {
            $likeCriteria = "(nim  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('userId !=', NULL);
        
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
    function userListing($userId)
    {
        
        $this->db->select('BaseTbl.*, Pembimbing.*');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_penilaian_ketua_penguji as Ketua', 'Ketua.nim = BaseTbl.userId','left');
        $this->db->join('tbl_dosen as Pembimbing', 'Pembimbing.dosenId = BaseTbl.dosenId','left');
        $this->db->where('BaseTbl.dosenId', $userId);
        
        $this->db->where('BaseTbl.jadwal', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function userListing2($userId)
    {
        $this->db->select('BaseTbl.*, Pembimbing2.*');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_penilaian_penguji_1 as Penguji1', 'Penguji1.nim = BaseTbl.userId','left');
         $this->db->join('tbl_dosen2 as Pembimbing2', 'Pembimbing2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->where('BaseTbl.dosenId2', $userId);
        
        $this->db->where('BaseTbl.jadwal', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
        
    }
    function userListing3($userId)
    {
         $this->db->select('BaseTbl.*, Pembimbing3.*');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_penilaian_penguji_2 as Penguji2', 'Penguji2.nim = BaseTbl.userId','left');
         $this->db->join('tbl_penguji2 as Pembimbing3', 'Pembimbing3.penguji2Id = BaseTbl.penguji2Id','left');
        $this->db->where('BaseTbl.penguji2Id', $userId);
        $this->db->where('BaseTbl.jadwal', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
        
        
    }

    function countHistoriNilai($searchText = '')
    {
       $this->db->select('userId, email, name');
        $this->db->from('tbl_sidang ');
        
        if(!empty($searchText)) {
            $likeCriteria = "(nim  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('userId !=', NULL);
        
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
    function listHistoriNilai($userId)
    {
        $this->db->select('BaseTbl.*, Pembimbing.*');
        $this->db->from('tbl_penilaian as BaseTbl');
        $this->db->join('tbl_dosen as Pembimbing', 'Pembimbing.dosenId = BaseTbl.dosenId','left');
        $this->db->where('BaseTbl.dosenId', $userId);
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
        $this->db->select('*');
        $this->db->from('tbl_dosen');
        $this->db->where('dosenId !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getDosen2()
    {
        $this->db->select('*');
        $this->db->from('tbl_dosen2');
        $this->db->where('dosenId2 !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getPenguji2()
    {
        $this->db->select('*');
        $this->db->from('tbl_penguji2');
        $this->db->where('penguji2Id !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getSidang()
    {
        $this->db->select('userId, name');
        $this->db->from('tbl_sidang');
        $this->db->where('userId !=', NULL);
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
        $this->db->select('BaseTbl.*, Pembimbing.*, Pembimbing2.*, Pembimbing3.*');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Pembimbing', 'Pembimbing.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Pembimbing2', 'Pembimbing2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_penguji2 as Pembimbing3', 'Pembimbing3.penguji2Id = BaseTbl.penguji2Id','left');
        $this->db->where('BaseTbl.userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    function getNilai($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian');
        
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
        $this->db->update('tbl_penilaian', $userInfo);
        
        return TRUE;
    }


    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penilaian', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser2($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penilaian_ketua_penguji', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser3($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penilaian_penguji_1', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser4($userInfo2)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penilaian_penguji_2', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
}