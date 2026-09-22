<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Audien_model extends CI_Model
{
    
    function getUserInfo($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, periode.periode, periode.idPeriodeSempro, audien.idAudien, audien.daftar, kuota.ruangan, kuota.kuota, audien.idAudienKuota');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_audien as audien', 'audien.nim = BaseTbl.nim','left');
        $this->db->join('tbl_audien_kuota as kuota', 'kuota.idAudienKuota = audien.idAudienKuota','left');
        $this->db->join('tbl_periode_sempro as periode', 'periode.idPeriodeSempro = audien.idPeriodeSempro','left');
        $this->db->where('BaseTbl.userId', $userId);
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
    
    function getPeriodeAudien()
    {
        $this->db->select('*');
        $this->db->from('tbl_periode_sempro');
        $this->db->where('aktif !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
     function getAudienKuota()
    {
        $this->db->select('*');
        $this->db->from('tbl_audien_kuota');
        $this->db->where('kuota !=', 0);
        $this->db->where('kuota >', '0');
        $this->db->where('status !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    	function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_audien', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function kuota($idAudienKuota)
    {
        $this->db->query("UPDATE tbl_audien_kuota SET kuota = kuota-1 WHERE idAudienKuota = '$idAudienKuota'  ");
        
    }
    
    	function addNewRuangan($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_audien_kuota', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function listIkutAudienCount($searchText = '')
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
    function listIkutAudien($searchText = '', $page, $segment, $userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.daftar, periode.periode,BaseTbl.idAudien, kuota.ruangan');
        $this->db->from('tbl_audien as BaseTbl');
        $this->db->join('tbl_audien_kuota as kuota', 'kuota.idAudienKuota = BaseTbl.idAudienKuota','left');
        $this->db->join('tbl_periode_sempro as periode', 'periode.idPeriodeSempro = BaseTbl.idPeriodeSempro','left');
        if(!empty($searchText)) {
            $likeCriteria = "(periode.periode  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    //_________________________________________________Admin______________________________________-
    function listAudienCount($searchText = '')
    {
         $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.nilai, BaseTbl.daftar, periode.periode, BaseTbl.statusKelulusan, BaseTbl.idKompre');
        $this->db->from('tbl_kompre as BaseTbl');
        $this->db->join('tbl_kompre_periode as periode', 'periode.idPeriodeKompre = BaseTbl.idPeriodeKompre','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
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
    function listAudien($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.idAudienKuota, BaseTbl.status, BaseTbl.kuota, periode.periode, BaseTbl.ruangan');
        $this->db->from('tbl_audien_kuota as BaseTbl');
        $this->db->join('tbl_periode_sempro as periode', 'periode.idPeriodeSempro = BaseTbl.idPeriodeSempro','left');
        $this->db->join('tbl_audien as audien', 'audien.idAudienKuota = BaseTbl.idAudienKuota','left');
        $this->db->order_by("BaseTbl.ruangan", "asc");
        $this->db->group_by("BaseTbl.idAudienKuota");
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
    
     function hapusRuangan($idAudienKuota){
        $hasil=$this->db->query("DELETE FROM tbl_audien_kuota WHERE idAudienKuota='$idAudienKuota'");
        return $hasil;
    }
    
    function editRuang($ruangan, $kuota, $idPeriodeSempro, $idAudienKuota, $status){
        $hasil=$this->db->query("UPDATE tbl_audien_kuota SET ruangan='$ruangan', status='$status',kuota='$kuota',idPeriodeSempro='$idPeriodeSempro' WHERE idAudienKuota='$idAudienKuota'");
        return $hasil;
    }
    
    function editRuang2($userInfo, $idAudienKuota)
    {
        $this->db->where('idAudienKuota', $idAudienKuota);
        $this->db->update('tbl_audien_kuota', $userInfo);
        
        return TRUE;
    }
    
    
     function daftarLagi($userId)
    {
        $data = array(
        'daftar' => 0
        );
        $this->db->where('userId', $userId);
        $this->db->update('tbl_audien', $data);
    }
    
    function listIkutAudienListCount($searchText = '')
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
    function listIkutAudienSempro($searchText = '', $page, $segment, $idAudienKuota)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.name, BaseTbl.nim, BaseTbl.daftar, periode.periode,BaseTbl.idAudien, kuota.ruangan');
        $this->db->from('tbl_audien as BaseTbl');
        $this->db->join('tbl_audien_kuota as kuota', 'kuota.idAudienKuota = BaseTbl.idAudienKuota','left');
        $this->db->join('tbl_periode_sempro as periode', 'periode.idPeriodeSempro = BaseTbl.idPeriodeSempro','left');
        if(!empty($searchText)) {
            $likeCriteria = "(periode.periode  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.idAudienKuota', $idAudienKuota);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    public function select_all() {
        $this->db->select('*');
        $this->db->from('tbl_audien_kuota as BaseTbl');
        $this->db->join('tbl_audien as kuota', 'kuota.idAudienKuota = BaseTbl.idAudienKuota','left');
        $this->db->join('tbl_periode_sempro as periode', 'periode.idPeriodeSempro = kuota.idPeriodeSempro','left');
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nim  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.userId  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;

    }
    
}