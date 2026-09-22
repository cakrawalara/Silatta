<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Jadwal extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal_model');

    }
    public function index()
    {
       $this->load->view('jadwal', $this->global, NULL);
  }
  

  public function index2()
    {
       $this->load->view('jadwalSidang', $this->global, NULL);
  }
  function jadwalSeminar()
    {
        
            $this->load->model('jadwal_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->jadwal_model->listJadwalCount($searchText);

			$returns = $this->paginationCompress ( "jadwal/jadwalSeminar/", $count, 200 );
            
            $data['userRecords'] = $this->jadwal_model->listJadwal($searchText, $returns["page"], $returns["segment"]);
            
            
            
            $this->load->view('jadwalSeminar',  $data, NULL);
        
    }
    
    function jadwalSidang()
    {
        
            $this->load->model('jadwal_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->jadwal_model->listJadwalCount2($searchText);

			$returns = $this->paginationCompress ( "jadwal/jadwalSeminar/", $count, 200 );
            
            $data['userRecords'] = $this->jadwal_model->listJadwal2($searchText, $returns["page"], $returns["segment"]);
            
            
            
            $this->load->view('jadwalSidang',  $data, NULL);
        
    }
  
    }
 