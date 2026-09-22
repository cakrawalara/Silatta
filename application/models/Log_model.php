<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model
{
	function logPembimbing1Count($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.ajuan1, BaseTbl.ajuan2, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role');
        $this->db->from('tbl_pengajuan as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId !=', 5);
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
    function logPembimbing1($nim)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.logBimbinganSeminar, BaseTbl.nim, BaseTbl.logSeminarId, BaseTbl.tanggalBimbingan, BaseTbl.statusSeminar');
        $this->db->from('tbl_log_seminar_pembimbing1 as BaseTbl');
        
        $this->db->where('BaseTbl.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addNewLog($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_log_seminar_pembimbing1', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     function getLogInfo($userId)
    {
        $this->db->select('userId, nim, name, email, mobile, roleId, dosenId, dosenId2');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
     
    function getUserInfo($logSeminarId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.nim, BaseTbl.tanggalBimbingan, BaseTbl.logSeminarId, BaseTbl.logBimbinganSeminar, Dosen.dosen, User.name, User.dosenId');
        $this->db->from('tbl_log_seminar_pembimbing1 as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
          $this->db->join('tbl_users as User', 'User.nim = BaseTbl.nim','left');
        $this->db->where('BaseTbl.logSeminarId', $logSeminarId);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function editLog($userInfo, $logSeminarId)
    {
        $this->db->where('logSeminarId', $logSeminarId);
        $this->db->update('tbl_log_seminar_pembimbing1', $userInfo);
        
        return TRUE;
    }
    
    function deleteLog($where, $tbl_log_seminar_pembimbing1)
    {
        $this->db->where($where);
	    $this->db->delete($tbl_log_seminar_pembimbing1);
        
        return TRUE;
    }
// _____________________________________________________________________________
//Log pembimbing 2 SEMINAR




    function logPembimbing2Count($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.ajuan1, BaseTbl.ajuan2, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role');
        $this->db->from('tbl_pengajuan as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId !=', 5);
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
    function logPembimbing2($nim2)
    {
       $this->db->select('BaseTbl.userId2, BaseTbl.logBimbingan2Seminar, BaseTbl.nim2, BaseTbl.logSeminar2Id, BaseTbl.tanggalBimbingan2, BaseTbl.statusSeminar2');
        $this->db->from('tbl_log_seminar_pembimbing2 as BaseTbl');
        
        $this->db->where('BaseTbl.nim2', $nim2);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addNewLog2($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_log_seminar_pembimbing2', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     
    function getUserInfo2($logSeminar2Id)
    {
        $this->db->select('BaseTbl.userId2, BaseTbl.nim2, BaseTbl.logSeminar2Id, BaseTbl.logBimbingan2Seminar, BaseTbl.tanggalBimbingan2, Dosen2.dosen2, User.dosenId2');
        $this->db->from('tbl_log_seminar_pembimbing2 as BaseTbl');
         $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
          $this->db->join('tbl_users as User', 'User.nim = BaseTbl.nim2','left');
        $this->db->where('BaseTbl.logSeminar2Id', $logSeminar2Id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function editLog2($userInfo, $logSeminar2Id)
    {
        $this->db->where('logSeminar2Id', $logSeminar2Id);
        $this->db->update('tbl_log_seminar_pembimbing2', $userInfo);
        
        return TRUE;
    }
    
    function deleteLog2($where, $tbl_log_seminar_pembimbing2)
    {
        $this->db->where($where);
	    $this->db->delete($tbl_log_seminar_pembimbing2);
        
        return TRUE;
    }
    
// ____________________________________________________________________________
//Log Pembimbing 1 SIDANG

function logPembimbing3Count($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.ajuan1, BaseTbl.ajuan2, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role');
        $this->db->from('tbl_pengajuan as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId !=', 5);
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
    function logPembimbing3($nim)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.statusSidang, BaseTbl.logBimbinganSidang, BaseTbl.nim, BaseTbl.logSidangId, BaseTbl.tanggalBimbingan3');
        $this->db->from('tbl_log_sidang_pembimbing1 as BaseTbl');
        
        $this->db->where('BaseTbl.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addNewLog3($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_log_sidang_pembimbing1', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     
    function getUserInfo3($logSidangId)
    {
        $this->db->select('BaseTbl.statusSidang, BaseTbl.userId, BaseTbl.nim, BaseTbl.logSidangId, BaseTbl.logBimbinganSidang, Dosen.dosen, User.dosenId, BaseTbl.tanggalBimbingan3');
        $this->db->from('tbl_log_sidang_pembimbing1 as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
          $this->db->join('tbl_users as User', 'User.nim = BaseTbl.nim','left');
        $this->db->where('BaseTbl.logSidangId', $logSidangId);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function editLog3($userInfo, $logSidangId)
    {
        $this->db->where('logSidangId', $logSidangId);
        $this->db->update('tbl_log_sidang_pembimbing1', $userInfo);
        
        return TRUE;
    }
    
    function deleteLog3($where, $tbl_log_sidang_pembimbing1)
    {
        $this->db->where($where);
	    $this->db->delete('tbl_log_sidang_pembimbing1');
        
        return TRUE;
    }
    
    
    // ____________________________________________________________________________
//Log Pembimbing 2 SIDANG

function logPembimbing4Count($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.ajuan1, BaseTbl.ajuan2, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role');
        $this->db->from('tbl_pengajuan as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId !=', 5);
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
    function logPembimbing4($nim2)
    {
       $this->db->select('BaseTbl.userId2, BaseTbl.statusSidang2, BaseTbl.logBimbingan2Sidang, BaseTbl.nim2, BaseTbl.logSidang2Id, BaseTbl.tanggalBimbingan4');
        $this->db->from('tbl_log_sidang_pembimbing2 as BaseTbl');
        
        $this->db->where('BaseTbl.nim2', $nim2);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function addNewLog4($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_log_sidang_pembimbing2', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     
    function getUserInfo4($logSidang2Id)
    {
        $this->db->select('BaseTbl.statusSidang2, BaseTbl.userId2, BaseTbl.nim2, BaseTbl.logSidang2Id, BaseTbl.logBimbingan2Sidang, Dosen2.dosen2, User.dosenId2,BaseTbl.tanggalBimbingan4');
        $this->db->from('tbl_log_sidang_pembimbing2 as BaseTbl');
         $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
          $this->db->join('tbl_users as User', 'User.nim = BaseTbl.nim2','left');
        $this->db->where('BaseTbl.logSidang2Id', $logSidang2Id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function editLog4($userInfo, $logSidang2Id)
    {
        $this->db->where('logSidang2Id', $logSidang2Id);
        $this->db->update('tbl_log_sidang_pembimbing2', $userInfo);
        
        return TRUE;
    }
    
    function deleteLog4($where, $tbl_log_sidang_pembimbing2)
    {
        $this->db->where($where);
	    $this->db->delete('tbl_log_sidang_pembimbing2');
        
        return TRUE;
    }
    // _______________________________________________________________________
    //Other
    function userListingCount($searchText = '')
    {
       $this->db->select('userId, email, name');
        $this->db->from('tbl_seminar ');
        
        if(!empty($searchText)) {
            $likeCriteria = "(nim  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%'
                            OR  mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        
        $query = $this->db->get();
        
        return count($query->result());
    }
    function listLog($userId)
    {
        $this->db->where('userId', $userId);

        return $user = $this->db->get('tbl_seminar')->result();
        
    }

    function userListing2($userId)
    {
        $this->db->where('dosenId2', $userId);

        return $user2 = $this->db->get('tbl_seminar')->result();
        
    }
    
    function getUserAcc($userId)
    {
        $this->db->select('userId, name, jadwal, email');
        $this->db->from('tbl_seminar');
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
}