<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
	function listJadwalCount($searchText = '')
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
    function listJadwal($searchText = '', $page, $segment)
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
        $this->db->where('BaseTbl.jadwal', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    
    function listJadwalCount2($searchText = '')
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
    
    
    function listJadwal2($searchText = '', $page, $segment)
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
        $this->db->where('BaseTbl.jadwal', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
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