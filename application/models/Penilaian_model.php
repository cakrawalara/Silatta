<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    /**
     list Pengajuan
     */
    function listCount($searchText = '')
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
    function listPenilaian($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.judul, BaseTbl.nim, Dosen.dosen, Dosen2.dosen2, Dosen.dosenId, BaseTbl.roleId, roles.role, Penguji2.penguji2');
        $this->db->from('tbl_sidang as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.dosenId2','left');
        $this->db->join('tbl_penguji2 as Penguji2', 'Penguji2.penguji2Id = BaseTbl.penguji2Id','left');
        $this->db->join('tbl_roles as roles', 'roles.roleId = BaseTbl.roleId','left');
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
    
    // __________________________________________________________________________
    function listCountKetuaPenguji($searchText = '')
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
    function listPenilaianKetuaPenguji($nim)
    {
        $this->db->where('nim', $nim);

        return $user = $this->db->get('tbl_penilaian_ketua_penguji')->result();
        
    
    }
    
    // ________________________________________________________________________
    
    function listCountPenguji1($searchText = '')
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
    function listPenilaianPenguji1($nim)
    {
        $this->db->where('nim', $nim);

        return $user = $this->db->get('tbl_penilaian_penguji_1')->result();
        
    
    }
    
    // _______________________________________________________________________
    function listCountPenguji2($searchText = '')
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
    function listPenilaianPenguji2($nim)
    {
        $this->db->where('nim', $nim);

        return $user = $this->db->get('tbl_penilaian_penguji_2')->result();
        
    
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
        $this->db->select('periodeId, periode');
        $this->db->from('tbl_periode_pengajuan');
        $this->db->where('periodeId !=', NULL);
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
    function getUser($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.total1, BaseTbl.name, BaseTbl.judul, BaseTbl.dosenId, BaseTbl.nim, Dosen.dosen, BaseTbl.a1, BaseTbl.a2, BaseTbl.a3, BaseTbl.b1, BaseTbl.b2, BaseTbl.b3, BaseTbl.c1, BaseTbl.c2, BaseTbl.c3, BaseTbl.d1, BaseTbl.d2, BaseTbl.d3, BaseTbl.d4, BaseTbl.e1, BaseTbl.e2, BaseTbl.e3, BaseTbl.f1, BaseTbl.f2, BaseTbl.g1, BaseTbl.g2');
        $this->db->from('tbl_penilaian as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.dosenId','left');
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
        
    }
   
   
    function getUserInfo($nim)
    {
         $this->db->select('BaseTbl.userId, BaseTbl.totalKetua1 , BaseTbl.totalKetua2, BaseTbl.name, BaseTbl.judul, BaseTbl.ketuaId, BaseTbl.nim, Dosen.dosen, BaseTbl.i1, BaseTbl.i2,BaseTbl.i3,BaseTbl.i4,BaseTbl.i5,BaseTbl.i6,BaseTbl.i7,  BaseTbl.a1, BaseTbl.a2, BaseTbl.a3, BaseTbl.b1, BaseTbl.b2, BaseTbl.b3, BaseTbl.c1, BaseTbl.c2, BaseTbl.c3, BaseTbl.d1, BaseTbl.d2, BaseTbl.d3, BaseTbl.d4, BaseTbl.e1, BaseTbl.e2, BaseTbl.e3, BaseTbl.f1, BaseTbl.f2, BaseTbl.g1, BaseTbl.g2');
        $this->db->from('tbl_penilaian_ketua_penguji as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.ketuaId','left');
        
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    
    function getUserInfo2($nim)
    {
         $this->db->select('BaseTbl.userId, BaseTbl.totalPenguji11,totalPenguji12,  BaseTbl.name, BaseTbl.judul, BaseTbl.penguji1Id, BaseTbl.nim, Dosen.dosen,  BaseTbl.i1, BaseTbl.i2,BaseTbl.i3,BaseTbl.i4,BaseTbl.i5,BaseTbl.i6,BaseTbl.i7,    BaseTbl.a1, BaseTbl.a2, BaseTbl.a3, BaseTbl.b1, BaseTbl.b2, BaseTbl.b3, BaseTbl.c1, BaseTbl.c2, BaseTbl.c3, BaseTbl.d1, BaseTbl.d2, BaseTbl.d3, BaseTbl.d4, BaseTbl.e1, BaseTbl.e2, BaseTbl.e3, BaseTbl.f1, BaseTbl.f2, BaseTbl.g1, BaseTbl.g2');
        $this->db->from('tbl_penilaian_penguji_1 as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.penguji1Id','left');
        
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function getUserInfo3($nim)
    {
         $this->db->select('BaseTbl.userId, BaseTbl.totalPenguji21,  BaseTbl.name, BaseTbl.judul, BaseTbl.penguji2Id, BaseTbl.nim, Dosen.dosen,  BaseTbl.a1, BaseTbl.a2, BaseTbl.a3, BaseTbl.b1, BaseTbl.b2, BaseTbl.b3, BaseTbl.c1, BaseTbl.c2, BaseTbl.c3, BaseTbl.d1, BaseTbl.d2, BaseTbl.d3, BaseTbl.d4, BaseTbl.e1, BaseTbl.e2, BaseTbl.e3, BaseTbl.f1, BaseTbl.f2, BaseTbl.g1, BaseTbl.g2');
        $this->db->from('tbl_penilaian_penguji_2 as BaseTbl');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = BaseTbl.penguji2Id','left');
        
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function getRekap($nim)
    {
         $this->db->select('BaseTbl.userId, Rekap.NAS, Rekap.NAP, Sidang.tanggalSidang, Rekap.nilai, Rekap.hurufMutu, Rekap.kriteria, BaseTbl.nim, BaseTbl.totalPenguji11, Penguji2.penguji2Id, BaseTbl.totalPenguji12,  Ketua.name, Ketua.judul, BaseTbl.penguji1Id, Ketua.totalKetua1, Ketua.totalKetua2, Ketua.ketuaId , Dosen.dosen, Dosen2.dosen2, Dosen3.penguji2, Penguji2.totalPenguji21, Penguji2.totalPenguji22');
        $this->db->from('tbl_penilaian_penguji_1 as BaseTbl');
         $this->db->join('tbl_penilaian_ketua_penguji as Ketua', 'Ketua.nim = BaseTbl.nim','left');
        $this->db->join('tbl_penilaian_penguji_2 as Penguji2', 'Penguji2.nim = BaseTbl.nim','left');
        $this->db->join('tbl_penilaian_rekapitulasi as Rekap', 'Rekap.nim = BaseTbl.nim','left');
        $this->db->join('tbl_dosen as Dosen', 'Dosen.dosenId = Ketua.ketuaId','left');
        $this->db->join('tbl_dosen2 as Dosen2', 'Dosen2.dosenId2 = BaseTbl.penguji1Id','left');
        $this->db->join('tbl_penguji2 as Dosen3', 'Dosen3.penguji2Id = Penguji2.penguji2Id','left');
        $this->db->join('tbl_sidang as Sidang', 'Sidang.nim = BaseTbl.nim','left');
        
       
        
        $this->db->where('BaseTbl.nim', $nim);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_penilaian_rekapitulasi', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
}

  