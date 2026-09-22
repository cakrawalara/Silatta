<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class DaftarUjianKompre extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kompre_model');
        $this->isLoggedIn();   

    }
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Ujian Kompre';
       $this->loadViews('daftarKompre', $this->global, NULL);
  }
  public function daftar($userId='')
    {
        $this->global['pageTitle'] = 'SILATTA : Ujian Kompre';
       $data['periodeKompre'] = $this->kompre_model->getPeriodeKompre();
       $data['userInfo'] = $this->kompre_model->getUserInfo($userId);
       $this->loadViews('daftarKompreMahasiswa', $this->global, $data, NULL);
  }
  public function prosesDaftar()
  {
  	 $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->prosesDaftar();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                 $userId = $this->input->post('userId');
                 $nim = $this->input->post('nim');
                 $idPeriodeKompre = $this->input->post('idPeriodeKompre');
                 
                
                $userInfo = array('name'=> $name, 'userId'=>$userId, 'nim'=>$nim, 'idPeriodeKompre'=>$idPeriodeKompre);
                
                $this->load->model('kompre_model');
                $result = $this->kompre_model->addNewUser($userInfo);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('DaftarUjianKompre/index');
            }
        }
        
        public function hasilKompre($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->kompre_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : Hasil Kompre';
        $data['userRecords'] = $this->kompre_model->userListing($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('daftarKompreMahasiswaHasil', $this->global, $data, NULL);
  }
  
  public function kompreAdmin($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->kompre_model->listIkutKompreCount($searchText);

			$returns = $this->paginationCompress ( "kompreAdmin/", $count, 150 );
			$data['userRecords'] = $this->kompre_model->listIkutKompre($searchText, $returns["page"], $returns["segment"]);
			$data['userInfo'] = $this->kompre_model->getUserInfo($userId);
			$data['periodeKompre'] = $this->kompre_model->getPeriodeKompre();
        $this->global['pageTitle'] = 'SILATTA : Ujian Kompre';
       $this->loadViews('kompre', $this->global, $data, NULL);
  }
  public function kompreSearch($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->kompre_model->listIkutKompreCount($searchText);

			$returns = $this->paginationCompress ( "kompreSearch/", $count, 150 );
			$data['userRecords'] = $this->kompre_model->listIkutKompre($searchText, $returns["page"], $returns["segment"]);
			$data['userInfo'] = $this->kompre_model->getUserInfo($userId);
			$data['periodeKompre'] = $this->kompre_model->getPeriodeKompre();
        $this->global['pageTitle'] = 'SILATTA : Ujian Kompre';
       $this->loadViews('kompreSearch', $this->global, $data, NULL);
  }
  
  
   function edit($idKompre = NULL)
    {
            $data['userInfo'] = $this->kompre_model->editKompre($idKompre);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("kompreEdit", $this->global, $data, NULL);
        
    }
    
    function editNilai($idKompre='')
    {
                $userId = $this->input->post('userId');
                $name = ucwords(strtolower($this->input->post('fname')));
                $nilai = $this->input->post('nilai');
                $idKompre = $this->input->post('idKompre');
                $statusKelulusan = $this->input->post('statusKelulusan');
                $userInfo = array();
                
                
                $userInfo = array('daftar'=>0, 'nilai'=>$nilai, 'statusKelulusan'=>$statusKelulusan);
                $result = $this->kompre_model->updateNilai($userInfo, $idKompre);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('daftarUjianKompre/kompreSearch');
    }
    
    function tambahPeriode()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
           
            $this->global['pageTitle'] = 'SILATTA : Add New Periode';

            $this->loadViews("kompreTambahPeriode", $this->global, NULL);
        }
    }
    
    function prosesTambah()
    {
        
               
                $idPeriodeKompre = $this->input->post('idPeriodeKompre');
                $periode = $this->input->post('periode');
                
                $userInfo = array('idPeriodeKompre'=>$idPeriodeKompre, 'periode'=>$periode);
                $result = $this->kompre_model->tambahPeriode($userInfo);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('DaftarUjianKompre/kompreSearch');
            
    }
    
    public function lihatPeriode($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->kompre_model->lihatPeriodeCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : Lihat Periode';
        $data['userRecords'] = $this->kompre_model->lihatPeriode($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('kompreLihatPeriode', $this->global, $data, NULL);
  }
  
  function editPeriode($idPeriodeKompre = NULL)
    {
            $data['userInfo'] = $this->kompre_model->getPeriodeKompreEdit($idPeriodeKompre);
            
            $this->global['pageTitle'] = 'SILATTA : Edit Periode';
            
            $this->loadViews("kompreLihatPeriodeEdit", $this->global, $data, NULL);
        
    }
    
    function editPeriodeProses()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $idPeriodeKompre = $this->input->post('idPeriodeKompre');
            
            $this->form_validation->set_rules('idPeriodeKompre','Id PeriodeKompre','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editPeriodeProses($idPeriodeKompre);
            }
            else
            {
                $idPeriodeKompre = $this->input->post('idPeriodeKompre');
                $periode = $this->input->post('periode');
                $aktif = $this->input->post('aktif');
                
                $userInfo = array();
                $userInfo = array('idPeriodeKompre'=>$idPeriodeKompre, 'periode'=>$periode, 'aktif'=>$aktif);
                $result = $this->kompre_model->editPeriodeKompre($userInfo, $idPeriodeKompre);
                

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('DaftarUjianKompre/lihatPeriode');
            }
        }
}

function hapusPeriode(){
        $idPeriodeKompre=$this->input->post('idPeriodeKompre');
        $this->kompre_model->hapusPeriode($idPeriodeKompre);
        redirect('DaftarUjianKompre/lihatPeriode');
    }
}