<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Periode extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('periode_model');
        $this->isLoggedIn();   

    }
    
    public function index($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->periode_model->lihatPeriodeCount($searchText);

			$returns = $this->paginationCompress ( "index/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : Lihat Periode';
        $data['userRecords'] = $this->periode_model->lihatPeriode($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('listPeriodeSeminar', $this->global, $data, NULL);
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

            $this->loadViews("listPeriodeSeminarAdd", $this->global, NULL);
        }
    }
    
    function prosesTambahPeriode()
    {
        
               
                $idPeriodeSempro = $this->input->post('idPeriodeSempro');
                $periode = $this->input->post('periode');
                $tanggal = $this->input->post('tanggal');
                
                $userInfo = array('idPeriodeSempro'=>$idPeriodeSempro, 'periode'=>$periode, 'tanggal'=>$tanggal);
                $result = $this->periode_model->tambahPeriode($userInfo);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('periode/index');
            
    }
    

  
  function editPeriode($idPeriodeSempro = NULL)
    {
            $data['userInfo'] = $this->periode_model->getPeriodeKompreEdit($idPeriodeSempro);
            
            $this->global['pageTitle'] = 'SILATTA : Edit Periode';
            
            $this->loadViews("listPeriodeSeminarEdit", $this->global, $data, NULL);
        
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
            
            $idPeriodeSempro = $this->input->post('idPeriodeSempro');
            
            $this->form_validation->set_rules('idPeriodeSempro','Id PeriodeKompre','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editPeriodeProses($idPeriodeSempro);
            }
            else
            {
                $idPeriodeSempro = $this->input->post('idPeriodeSempro');
                $periode = $this->input->post('periode');
                $tanggal = $this->input->post('tanggal');
                $aktif = $this->input->post('aktif');
                
                $userInfo = array();
                $userInfo = array('idPeriodeSempro'=>$idPeriodeSempro, 'periode'=>$periode, 'tanggal'=>$tanggal, 'aktif'=>$aktif);
                $result = $this->periode_model->editPeriodeKompre($userInfo, $idPeriodeSempro);
                

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('periode/index');
            }
        }
}

function hapusPeriode(){
        $idPeriodeSempro=$this->input->post('idPeriodeSempro');
        $this->periode_model->hapusPeriode($idPeriodeSempro);
        redirect('periode/index');
    }
}