<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class List_model extends CI_Model
{
    /**
     list Pengajuan
     */
    function listPengajuanCount($searchText = '')
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
    function listPengajuan($searchText = '', $page, $segment)
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
        $this->db->where('BaseTbl.roleId !=', 4);
        $this->db->where('BaseTbl.export', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }


    // ______________________________________________________________________________________________________
    /**
     list Seminar
     */
    function listSeminarCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, BaseTbl.tempat, BaseTbl.tanggal, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, Reviewer2.reviewer, Moderator2.moderator, BaseTbl.roleId, roles.role, BaseTbl.linkSeminar');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as Reviewer2', 'Reviewer2.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as Moderator2', 'Moderator2.moderatorId = BaseTbl.moderatorId','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->where('BaseTbl.roleId !=', 4);
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
    
    function listSeminar($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, BaseTbl.tempat, BaseTbl.tanggal, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, Reviewer2.reviewer, Moderator2.moderator, BaseTbl.roleId, roles.role, BaseTbl.linkSeminar');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as Reviewer2', 'Reviewer2.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as Moderator2', 'Moderator2.moderatorId = BaseTbl.moderatorId','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId', 5);
        
        $this->db->where('BaseTbl.export', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    // ______________________________________________________________________________________________________

    function listSidangCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, , Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, Penguji.penguji2, BaseTbl.tempatSidang, BaseTbl.tanggalSidang' );
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_penguji2 as Penguji', 'Penguji.penguji2Id = BaseTbl.penguji2Id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.judul  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
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
    function listSidang($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, , Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, Penguji.penguji2, BaseTbl.tempatSidang, BaseTbl.tanggalSidang' );
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_penguji2 as Penguji', 'Penguji.penguji2Id = BaseTbl.penguji2Id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.judul  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId', 4);
        $this->db->where('BaseTbl.export', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    // ______________________________________________________________________________________________________

     function listMahasiswaCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, , Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, Penguji.penguji2, BaseTbl.tempatSidang, BaseTbl.tanggalSidang' );
        $this->db->from('tbl_mahasiswa as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.judul  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
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
    function listMahasiswa($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, , Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, BaseTbl.email' );
        $this->db->from('tbl_mahasiswa as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.judul  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        
        $this->db->where('BaseTbl.roleId', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    // _________________________________________________________________
    
    function listJadwalSeminarCount($searchText = '')
    {
         $this->db->select('BaseTbl.name, BaseTbl.nim, BaseTbl.judul, BaseTbl.tanggal, BaseTbl.tempat, Dosen.dosen, Dosen2.dosen2, Reviewer.reviewer, Moderator.moderator, BaseTbl.tanggal, BaseTbl.waktu');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as Reviewer', 'Reviewer.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as Moderator', 'Moderator.moderatorId = BaseTbl.moderatorId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->where('BaseTbl.roleId !=', 4);
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
    
    function listJadwalSeminar($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.name, BaseTbl.nim, BaseTbl.judul, BaseTbl.tanggal, BaseTbl.tempat, Dosen.dosen, Dosen2.dosen2, Reviewer.reviewer, Moderator.moderator, BaseTbl.tanggal, BaseTbl.linkSeminar, BaseTbl.waktu, BaseTbl.userId');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as Reviewer', 'Reviewer.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as Moderator', 'Moderator.moderatorId = BaseTbl.moderatorId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.jadwal', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function editJadwal($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
    
     function editJadwal2($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    
    
    function listJadwalSidangCount($searchText = '')
    {
       $this->db->select('BaseTbl.name, BaseTbl.nim, BaseTbl.judul, BaseTbl.tempatSidang, Dosen.dosen, Dosen2.dosen2, Penguji2.penguji2, BaseTbl.tanggalSidang, BaseTbl.waktu');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_penguji2 as Penguji2', 'Penguji2.penguji2Id = BaseTbl.penguji2Id','left');
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId !=', 5);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    
    function listJadwalSidang($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.*, BaseTbl.nim, BaseTbl.judul, BaseTbl.tempatSidang, Dosen.dosen, Dosen2.dosen2, Penguji2.penguji2, BaseTbl.tanggalSidang, BaseTbl.waktu, BaseTbl.userId');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_penguji2 as Penguji2', 'Penguji2.penguji2Id = BaseTbl.penguji2Id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.jadwal', 1);
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
        $this->db->where('roleId !=', 1);
        $this->db->where('roleId !=', 2);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getPeriode()
    {
        $this->db->select('*');
        $this->db->from('tbl_periode_sempro');
        $this->db->where('aktif !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
     function getRuangan()
    {
        $this->db->select('*');
        $this->db->from('tbl_ruangan');
        $this->db->where('ruanganId !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }
     function getPenguji2()
    {
        $this->db->select('penguji2Id, penguji2');
        $this->db->from('tbl_penguji2');
        $this->db->where('penguji2Id !=', NULL);
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


    function getReviewer()
    {
        $this->db->select('reviewerId, reviewer');
        $this->db->from('tbl_reviewer');
        $this->db->where('reviewerId !=', NULL);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getModerator()
    {
        $this->db->select('moderatorId, moderator');
        $this->db->from('tbl_moderator');
        $this->db->where('moderatorId !=', NULL);
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
        $this->db->select('userId, name, roleId, dosenId, dosenId2, reviewerId, moderatorId, tempat, waktu, tanggal, penguji2Id, tempatSidang, tanggalSidang, linkSeminar, linkSidang, judul, email, mobile');
        $this->db->from('tbl_users');
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getUserInfo2($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_seminar');
		$this->db->where('roleId !=', NULL);
        
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getUserInfo3($userId)
    {
        $this->db->select('userId, name, jadwal, email');
        $this->db->from('tbl_sidang');
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
    function editUser3($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo);
        
        return TRUE;
    }
    function editUser4($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo2);
        
        return TRUE;
    }
    function editUser5($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
    function editUser6($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo2);
        
        return TRUE;
    }
    function editUser7($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    function editUser8($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo2);
        
        return TRUE;
    }
    function editUser9($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo3);
        
        return TRUE;
    }
    function editUser10($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo2);
        
        return TRUE;
    }
    function editUser11($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo);
        
        return TRUE;
    }
    
    function editUser12($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo3);
        
        return TRUE;
    }
    
    function editUser13($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo3);
        
        return TRUE;
    }
    
    function editUser00($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }

    function editUser20($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo2);
        
        
        return TRUE;
    }
    function editUser30($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo2);
        
        return TRUE;
    }
     function editUser40($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo2);
        
        return TRUE;
    }
    function editUser50($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo2);
        
        return TRUE;
    }
    function editUser60($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_mahasiswa', $userInfo);
        
        return TRUE;
    }
    function editUser70($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return TRUE;
    }
     function editUser80($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_pengajuan', $userInfo);
        
        return TRUE;
    }
    function editUser90($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
    function editUser100($userInfo2, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo2);
        
        return TRUE;
    }
    
    function editUser110($userInfo4, $userId)
    {
        $this->db->where('dosenId', $userId);
        $this->db->update('tbl_dosen', $userInfo4);
        
        return TRUE;
    }
    function editUser120($userInfo5, $userId)
    {
        $this->db->where('dosenId2', $userId);
        $this->db->update('tbl_dosen2', $userInfo5);
        
        return TRUE;
    }
    function editUser130($userInfo3, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo3);
        
        return TRUE;
    }
    function editUser140($userInfo6, $userId)
    {
        $this->db->where('reviewerId', $userId);
        $this->db->update('tbl_reviewer', $userInfo6);
        
        return TRUE;
    }
    function editUser150($userInfo7, $userId)
    {
        $this->db->where('moderatorId', $userId);
        $this->db->update('tbl_moderator', $userInfo7);
        
        return TRUE;
    }
    function editUser160($userInfo8, $userId)
    {
        $this->db->where('penguji2Id', $userId);
        $this->db->update('tbl_penguji2', $userInfo8);
        
        return TRUE;
    }

public function select_all() {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan as BaseTbl');
        $this->db->join('tbl_users as user', 'user.userId = BaseTbl.userId','left');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        
        $this->db->where('user.roleId', 6);
        $this->db->where('BaseTbl.export', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }
    
    
    public function select_all_seminar() {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, BaseTbl.tempat, BaseTbl.tanggal, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, Reviewer2.reviewer, Moderator2.moderator, BaseTbl.roleId, roles.role, BaseTbl.linkSeminar, BaseTbl.waktu');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as Reviewer2', 'Reviewer2.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as Moderator2', 'Moderator2.moderatorId = BaseTbl.moderatorId','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId', 5);
        
        $this->db->where('BaseTbl.export', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }

   public function select_all_sidang() {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, , Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, Penguji.penguji2, BaseTbl.tempatSidang, BaseTbl.tanggalSidang, BaseTbl.waktu' );
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_penguji2 as Penguji', 'Penguji.penguji2Id = BaseTbl.penguji2Id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.judul  LIKE '%".$searchText."%'
                            OR  BaseTbl.nim  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.roleId', 4);
        $this->db->where('BaseTbl.export', 1);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }
    
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_seminar', $userInfo);
        
        return $this->db->affected_rows();
    }
    
    function deleted($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->delete('tbl_seminar', $userInfo);
        
        return TRUE;
    }
    
    // ________________History______________
    
    function lihatHistoryCount($searchText = '')
    {
         $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.daftar', 1);
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
    function lihatHistory($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.tanggal, BaseTbl.name, BaseTbl.nim');
        $this->db->from('tbl_seminar as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tanggal  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function listHistoryCount($searchText = '')
    {
         $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.daftar', 1);
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
    function listHistory($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_seminar as BaseTbl');
        $this->db->join('tbl_dosen as dosen1', 'dosen1.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as dosen2', 'dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_reviewer as reviewer', 'reviewer.reviewerId = BaseTbl.reviewerId','left');
        $this->db->join('tbl_moderator as moderator', 'moderator.moderatorId = BaseTbl.moderatorId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tanggal  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    // _______________________________________________________________________________________________________________________________
    
     function lihatHistorySidangCount($searchText = '')
    {
         $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.daftar', 1);
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
    function lihatHistorySidang($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.tanggalSidang, BaseTbl.name, BaseTbl.nim');
        $this->db->from('tbl_sidang as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tanggalSidang  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function listHistorySidangCount($searchText = '')
    {
         $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.daftar', 1);
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
    function listHistorySidang($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as dosen1', 'dosen1.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as dosen2', 'dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_penguji2 as penguji', 'penguji.penguji2Id = BaseTbl.penguji2Id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tanggalSidang  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function editHistory($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_sidang', $userInfo);
        
        return TRUE;
    }
// ______________________________ruangan___________________________
function lihatRuanganCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_ruangan as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.ruangan  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
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
    function lihatRuangan($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_ruangan as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.ruangan  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
     function tambahRuangan($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_ruangan', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function editRuangan($userInfo, $ruanganId)
    {
        $this->db->where('ruanganId', $ruanganId);
        $this->db->update('tbl_ruangan', $userInfo);
        
        return TRUE;
    }
    
    function hapusRuangan($ruanganId){
        $hasil=$this->db->query("DELETE FROM tbl_ruangan WHERE ruanganId='$ruanganId'");
        return $hasil;
    }

    
}