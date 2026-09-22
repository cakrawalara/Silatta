<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_user_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->where('BaseTbl.roleId ', 2);
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
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->where('BaseTbl.roleId ', 2);
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
        $this->db->where('roleId', 2);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
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
        $this->db->insert('tbl_dosen', $userInfo2);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser3($userInfo3)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_dosen2', $userInfo3);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser4($userInfo4)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_reviewer', $userInfo4);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser5($userInfo5)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_moderator', $userInfo5);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewUser6($userInfo6)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penguji2', $userInfo6);
        
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
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId, dosenId');
        $this->db->from('tbl_users');
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
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }

    function editUser2($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo2);
        
        
        return TRUE;
    }
    function editUser3($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo2);
        
        return TRUE;
    }
     function editUser4($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo2);
        
        return TRUE;
    }
    function editUser5($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo2);
        
        return TRUE;
    }
    function editUser6($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo);
        
        return TRUE;
    }
    function editUser7($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
     function editUser8($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo);
        
        return TRUE;
    }
    function editUser9($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    function editUser10($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo2);
        
        return TRUE;
    }
    
    function editUser11($userInfo4, $userId)
    {
        $this->db->where('dosenId', $userId);
        $this->db->update('tbl_dosen', $userInfo4);
        
        return TRUE;
    }
    function editUser12($userInfo5, $userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->update('tbl_dosen2', $userInfo5);
        
        return TRUE;
    }
    function editUser13($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo3);
        
        return TRUE;
    }
    function editUser14($userInfo6, $userId)
    {
        $this->db->where('reviewerId', $userId);
        $this->db->update('tbl_reviewer', $userInfo6);
        
        return TRUE;
    }
    function editUser15($userInfo7, $userId)
    {
        $this->db->where('moderatorId', $userId);
        $this->db->update('tbl_moderator', $userInfo7);
        
        return TRUE;
    }
    function editUser16($userInfo8, $userId)
    {
        $this->db->where('penguji2Id', $userId);
        $this->db->update('tbl_penguji2', $userInfo8);
        
        return TRUE;
    }


    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }

    public function select_all() {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role, mhsw.jenisKelamin');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_mahasiswa as mhsw', 'mhsw.userId = BaseTbl.userId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }
}

  