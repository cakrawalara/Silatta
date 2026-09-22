<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Log_dosen_model extends CI_Model
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
    function userListingCount2($searchText = '')
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
    function logPembimbing1($nim)
    {
       $this->db->select('BaseTbl.logBimbinganSeminar, BaseTbl.logSeminarId, BaseTbl.tanggalBimbingan, BaseTbl.statusSeminar, BaseTbl.nim');
        $this->db->from('tbl_log_seminar_pembimbing1 as BaseTbl');
        $this->db->join('tbl_seminar as seminar','seminar.nim = BaseTbl.nim','left');
        $this->db->where('BaseTbl.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
 
    function logPembimbing2($nim)
    {
       $this->db->select('BaseTbl.logBimbingan2Seminar, BaseTbl.logSeminar2Id, BaseTbl.tanggalBimbingan2, BaseTbl.statusSeminar2, BaseTbl.nim2, seminar.nim');
        $this->db->from('tbl_log_seminar_pembimbing2 as BaseTbl');
        $this->db->join('tbl_seminar as seminar','seminar.nim = BaseTbl.nim2','left');
        $this->db->where('seminar.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function logPembimbing3($nim)
    {
       $this->db->select('BaseTbl.logBimbinganSidang, BaseTbl.logSidangId, BaseTbl.tanggalBimbingan3, BaseTbl.statusSidang, BaseTbl.nim');
        $this->db->from('tbl_log_sidang_pembimbing1 as BaseTbl');
        $this->db->join('tbl_sidang as seminar','seminar.nim = BaseTbl.nim','left');
        $this->db->where('BaseTbl.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function logPembimbing4($nim)
    {
       $this->db->select('BaseTbl.logBimbingan2Sidang, BaseTbl.logSidang2Id, BaseTbl.tanggalBimbingan4, BaseTbl.statusSidang2, BaseTbl.nim2');
        $this->db->from('tbl_log_sidang_pembimbing2 as BaseTbl');
        $this->db->join('tbl_sidang as seminar','seminar.nim = BaseTbl.nim2','left');
        $this->db->where('seminar.nim', $nim);
        
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function getUser($nim)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.dosenId, BaseTbl.dosenId2, BaseTbl.accDosen1, BaseTbl.accDosen2');
        $this->db->from('tbl_seminar as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    function getUser2($nim)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.dosenId, BaseTbl.dosenId2, BaseTbl.accDosen1, BaseTbl.accDosen2');
        $this->db->from('tbl_seminar as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
         $this->db->join('tbl_log_seminar_pembimbing2 as Log2', 'Log2.nim2 = BaseTbl.nim','left');
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function getUser3($nim)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.dosenId, BaseTbl.dosenId2, BaseTbl.accSidang1, BaseTbl.accSidang2');
        $this->db->from('tbl_sidang as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function getUser4($nim)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.dosenId, BaseTbl.dosenId2, BaseTbl.accSidang1, BaseTbl.accSidang2');
        $this->db->from('tbl_sidang as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    
    function getUserInfo($logSeminarId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.nim, BaseTbl.tanggalBimbingan, BaseTbl.logSeminarId, BaseTbl.logBimbinganSeminar, Dosen.dosen, User.name, User.dosenId, BaseTbl.statusSeminar');
        $this->db->from('tbl_log_seminar_pembimbing1 as BaseTbl');
         $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
          $this->db->join('tbl_users as User', 'User.nim = BaseTbl.nim','left');
        $this->db->where('BaseTbl.logSeminarId', $logSeminarId);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
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
        $this->db->where('dosenId', $userId);
        $this->db->where('roleId', 5);
        return $user = $this->db->get('tbl_seminar')->result();
        
    }

    function userListing2($userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->where('roleId', 5);
        return $user2 = $this->db->get('tbl_seminar')->result();
        
    }

    function userListing3($userId)
    {
        $this->db->where('dosenId', $userId);
        $this->db->where('roleId', 4);
        return $user = $this->db->get('tbl_sidang')->result();
        
    }

    function userListing4($userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->where('roleId', 4);
        return $user2 = $this->db->get('tbl_sidang')->result();
        
    }
   
    function acc($logSeminarId)
    {
        $data = array(
        'statusSeminar' => 1
        );
        $this->db->select('nim');
        $this->db->where('logSeminarId', $logSeminarId);
        $this->db->update('tbl_log_seminar_pembimbing1', $data);
    }

    function notAcc($logSeminarId)
    {
        $data = array(
        'statusSeminar' => 0
        );

        $this->db->where('logSeminarId', $logSeminarId);
        $this->db->update('tbl_log_seminar_pembimbing1', $data);
    }

    function acc2($logSeminar2Id)
    {
        $data = array(
        'statusSeminar2' => 1
        );
        $this->db->select('nim2');
        $this->db->where('logSeminar2Id', $logSeminar2Id);
        $this->db->update('tbl_log_seminar_pembimbing2', $data);
    }

    function notAcc2($logSeminar2Id)
    {
        $data = array(
        'statusSeminar2' => 0
        );

        $this->db->where('logSeminar2Id', $logSeminar2Id);
        $this->db->update('tbl_log_seminar_pembimbing2', $data);
    }


    function acc3($logSidangId)
    {
        $data = array(
        'statusSidang' => 1
        );
        $this->db->select('nim');
        $this->db->where('logSidangId', $logSidangId);
        $this->db->update('tbl_log_sidang_pembimbing1', $data);
    }

    function notAcc3($logSidangId)
    {
        $data = array(
        'statusSidang' => 0
        );

        $this->db->where('logSidangId', $logSidangId);
        $this->db->update('tbl_log_sidang_pembimbing1', $data);
    }

    function acc4($logSidang2Id)
    {
        $data = array(
        'statusSidang2' => 1
        );
        $this->db->select('nim2');
        $this->db->where('logSidang2Id', $logSidang2Id);
        $this->db->update('tbl_log_sidang_pembimbing2', $data);
    }

    function notAcc4($logSidang2Id)
    {
        $data = array(
        'statusSidang2' => 0
        );

        $this->db->where('logSidang2Id', $logSidang2Id);
        $this->db->update('tbl_log_sidang_pembimbing2', $data);
    }


    function accSempro($userId)
    {
        $data = array(
        'accDosen1' => 1
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $data);
    }
    function cancelAccSempro($userId)
    {
        $data = array(
        'accDosen1' => 0
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $data);
    }
    
    function accSempro2($userId)
    {
        $data = array(
        'accDosen2' => 1
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $data);
    }
    
    function cancelAccSempro2($userId)
    {
        $data = array(
        'accDosen2' => 0
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $data);
    }
    
    function accSidang($userId)
    {
        $data = array(
        'accSidang1' => 1
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $data);
    }
    
    function cancelAccSidang($userId)
    {
        $data = array(
        'accSidang1' => 0
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $data);
    }
    
    function accSidang2($userId)
    {
        $data = array(
        'accSidang2' => 1
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $data);
    }
    
    function cancelAccSidang2($userId)
    {
        $data = array(
        'accSidang2' => 0
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $data);
    }
    
    function deleteUser($logSeminarId, $userInfo)
    {
        $this->db->where('logSeminarId', $logSeminarId);
        $this->db->update('tbl_log_seminar_pembimbing1', $userInfo);
        
        return $this->db->affected_rows();
    }
}