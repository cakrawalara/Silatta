<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Penilaian extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('penilaian_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : List Pengajuan';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function listing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penilaian_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->penilaian_model->listCount($searchText);

			$returns = $this->paginationCompress ( "penilaian/listing/", $count, 200 );
            
            $data['userRecords'] = $this->penilaian_model->listPenilaian($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listPenilaianMahasiswa", $this->global, $data, NULL);
        }
    }
    
    function printNilaiKetuaPenguji($nim='')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penilaian_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->penilaian_model->listCountKetuaPenguji($searchText);

			$returns = $this->paginationCompress ( "penilaian/printNilaiKetuaPenguji/", $count, 200 );
            
            $data['userRecords'] = $this->penilaian_model->listPenilaianKetuaPenguji($nim);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listPenilaianKetuaPenguji", $this->global, $data, NULL);
        }
    }
    
     

    function penilaianKetuaPengujiCetak($nim = NULL)
    {
        
            
            $data['userInfo'] = $this->penilaian_model->getUserInfo($nim);
            
            $this->global['pageTitle'] = '';
            
            $this->loadCetak("listPenilaianKetuaPengujiCetak", NULL, $data, NULL);
        
    }
    
    // _____________________________________________________________________
    
    function printNilaiPenguji1($nim='')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penilaian_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->penilaian_model->listCountPenguji1($searchText);

			$returns = $this->paginationCompress ( "penilaian/printNilaiPenguji1/", $count, 200 );
            
            $data['userRecords'] = $this->penilaian_model->listPenilaianPenguji1($nim);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listPenilaianPenguji1", $this->global, $data, NULL);
        }
    }
    
     

    function penilaianPenguji1Cetak($nim = NULL)
    {
        
            
            $data['userInfo'] = $this->penilaian_model->getUserInfo2($nim);
            
            $this->global['pageTitle'] = '';
            
            $this->loadCetak("listPenilaianPenguji1Cetak", NULL, $data, NULL);
        
    }
    
    // ______________________________________________________________________
    
    function printNilaiPenguji2($nim='')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penilaian_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->penilaian_model->listCountPenguji2($searchText);

			$returns = $this->paginationCompress ( "penilaian/printNilaiPenguji2/", $count, 200 );
            
            $data['userRecords'] = $this->penilaian_model->listPenilaianPenguji2($nim);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listPenilaianPenguji2", $this->global, $data, NULL);
        }
    }
    
     

    function penilaianPenguji2Cetak($nim = NULL)
    {
        
            $data['userInfo'] = $this->penilaian_model->getUserInfo3($nim);
            
            $this->global['pageTitle'] = '';
            
            $this->loadCetak("listPenilaianPenguji2Cetak", NULL, $data, NULL);
        
    }
    
    // _____________________________________________________________________
    function pilihRekap($nim='')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penilaian_model');
            $data['userInfo'] = $this->penilaian_model->getRekap($nim);
            
            $this->global['pageTitle'] = 'SILATTA : Add New User';

            $this->loadViews("rekapEdit", $this->global, $data, NULL);
        }
    }
    
    function addNewUser($nim = '')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewUser();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $ketuaId = $this->input->post('ketuaId');
                $userId = $this->input->post('userId');
                $nim = $this->input->post('nim');
                $NAS = $this->input->post('NAS');
                $NAP = $this->input->post('NAP');
                
                $penguji1Id = $this->input->post('penguji1Id');
                $penguji2Id = $this->input->post('penguji2Id');
                $totalKetua1 = $this->input->post('totalKetua1');
                $totalKetua2 = $this->input->post('totalKetua2');
                $totalPenguji11 = $this->input->post('totalPenguji11');
                $totalPenguji12 = $this->input->post('totalPenguji12');
                $totalPenguji22 = $this->input->post('totalPenguji22');
                $totalPenguji21 = $this->input->post('totalPenguji21');
                $nilai = round((((($totalPenguji21 + $totalPenguji11 + $totalKetua1)/3)*0.6)+((($totalPenguji12 + $totalKetua2)/2))*0.4), 2);
                $hurufMutu = $nilai;
                if($nilai >= 360){
                    $hurufMutu = 'A';
                }else if($nilai >= 320){
                    $hurufMutu = 'A-';
                }else if($nilai >= 300){
                    $hurufMutu = 'B+';
                }else if($nilai >= 280){
                    $hurufMutu = 'B';
                }else if($nilai > 260){
                    $hurufMutu = 'B-';
                }else {
                    $hurufMutu = 'TIDAK LULUS';
                }
                $kriteria = $nilai;
                if($nilai < 200){
                    $kriteria = 'TIDAK LULUS';
                }else if($nilai < 250){
                    $kriteria = 'LULUS BERSYARAT';
                }else{
                    $kriteria = 'LULUS';
                }
                
                
                $userInfo = array('ketuaId'=>$ketuaId, 'userId'=>$ketuaId, 'nim'=>$nim, 'nilai'=>$nilai, 'kriteria'=>$kriteria, 'hurufMutu'=>$hurufMutu, 'NAS'=>round((($totalPenguji21 + $totalPenguji11 + $totalKetua1)/3), 2),'NAP'=>round((( $totalPenguji12 + $totalKetua2)/2) , 2), 'penguji1Id'=>$penguji1Id, 'name'=> $name, 'penguji2Id'=>$penguji2Id, );
                
                $this->load->model('penilaian_model');
                $result = $this->penilaian_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Berhasil di Rekap');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Gagal di Rekap');
                }
                
                
                redirect('penilaian/listing');
            }
        }
    }
    
    
    
    
    
    
     function printNilaiRekap($nim= NULL)
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['userInfo'] = $this->penilaian_model->getRekap($nim);
            
            $this->global['pageTitle'] = '';

            $this->loadCetak("listPenilaianRekapitulasi", $this->global, $data, NULL);
        }
    }
    
     

    function penilaianRekap($nim = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->printNilaiRekap();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $total= $this->input->post('total1');
                $total2= $this->input->post('total2');
                $dosenId= $this->input->post('dosenId');
                $dosenId2= $this->input->post('dosenId2');
                $nim = $this->input->post('nim');
                
                $userInfo = array('name'=>$name);
                
                $this->load->model('penilaian_model');
                $result = $this->penilaian_model->addNew($userInfo);
               
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('penilaian/printNilaiRekap');
            }
        }
    }

}
?>