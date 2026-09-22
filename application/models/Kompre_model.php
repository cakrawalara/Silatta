<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Kompre_model extends CI_Model
{
	function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_kompre', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getUserInfo($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, periode.periode, periode.idPeriodeKompre, kompre.daftar, kompre.nilai, kompre.statusKelulusan, kompre.idKompre');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_kompre as kompre', 'kompre.nim = BaseTbl.nim','left');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = kompre.idPeriodeKompre','left');
        $this->db->where('BaseTbl.userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getPeriodeKompre()
    {
        $this->db->select('idPeriodeKompre, periode');
        $this->db->from('tbl_kompre_periode');
        $this->db->where('aktif !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getPeriodeKompreEdit($idPeriodeKompre)
    {
        $this->db->select('idPeriodeKompre, periode, aktif');
        $this->db->from('tbl_kompre_periode');
        $this->db->where('idPeriodeKompre', $idPeriodeKompre);
        $query = $this->db->get();
        
        return $query->result();
    }
    
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
        $this->db->where('BaseTbl.roleId !=', 2);
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
    function userListing($searchText = '', $page, $segment, $userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    
    //menu admin
    
    
    function listIkutKompreCount($searchText = '')
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
    function listIkutKompre($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(periode.periode  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function tambahPeriode($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_kompre_periode', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function editKompre($idKompre)
    {
        $this->db->select('userId, name, nilai, daftar, idKompre, statusKelulusan');
        $this->db->from('tbl_kompre');
        
        $this->db->where('idKompre', $idKompre);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function updateNilai($userInfo, $idKompre)
    {
        $this->db->where('idKompre', $idKompre);
        $this->db->update('tbl_kompre', $userInfo);
        
        return TRUE;
    }
    
    function lihatPeriodeCount($searchText = '')
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
    function lihatPeriode($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.idPeriodeKompre, BaseTbl.periode, BaseTbl.aktif');
        $this->db->from('tbl_kompre_periode as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(periode.periode  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function editPeriodeKompre($userInfo, $idPeriodeKompre)
    {
        $this->db->where('idPeriodeKompre', $idPeriodeKompre);
        $this->db->update('tbl_kompre_periode', $userInfo);
        
        return TRUE;
    }
    
    function hapusPeriode($idPeriodeKompre){
        $hasil=$this->db->query("DELETE FROM tbl_kompre_periode WHERE idPeriodeKompre='$idPeriodeKompre'");
        return $hasil;
    }
}