<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Audiens extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('audien_model');
        $this->isLoggedIn();   

    }
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Pendaftaran Audien Seminar';
       $this->loadViews('daftarAudien', $this->global, NULL);
  }
  public function daftar($userId='')
    {
        $this->global['pageTitle'] = 'SILATTA : Pendaftaran Audien Seminar';
       $data['periodeSempro'] = $this->audien_model->getPeriodeAudien();
       $data['audien'] = $this->audien_model->getAudienKuota();
       $data['userInfo'] = $this->audien_model->getUserInfo($userId);
       $this->loadViews('daftarAudienMahasiswa', $this->global, $data, NULL);
  }
  public function prosesDaftar($userId="")
  {
  	 $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->prosesDaftar();
            }
            else
            {
                $this->audien_model->kuota($this->input->post('idAudienKuota'));
                
                $name = ucwords(strtolower($this->input->post('fname')));
                 $userId = $this->input->post('userId');
                 $nim = $this->input->post('nim');
                 $idPeriodeSempro = $this->input->post('idPeriodeSempro');
                 $ruangan = $this->input->post('ruangan');
                 $idAudienKuota = $this->input->post('idAudienKuota');
                 
                
                $userInfo = array('name'=> $name, 'userId'=>$userId, 'nim'=>$nim, 'idPeriodeSempro'=>$idPeriodeSempro, 'daftar'=>1, 'idAudienKuota'=>$idAudienKuota);
                
                $this->load->model('audien_model');
                
                $result = $this->audien_model->addNewUser($userInfo);
                
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('Audiens/AudienList/'. $userId);
            }
        }
        public function AudienList($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->audien_model->listIkutAudienCount($searchText);

			$returns = $this->paginationCompress ( "AudienAdmin/", $count, 150 );
			$data['userRecords'] = $this->audien_model->listIkutAudien($searchText, $returns["page"], $returns["segment"], $userId);
			$data['userInfo'] = $this->audien_model->getUserInfo($userId);
			$data['periodeSempro'] = $this->audien_model->getPeriodeAudien();
			
			
        $this->global['pageTitle'] = 'SILATTA : Ujian Audien';
       $this->loadViews('daftarAudienMahasiswaList', $this->global, $data, NULL);
  }
  public function AudienSearch($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->audien_model->listIkutAudienCount($searchText);

			$returns = $this->paginationCompress ( "AudienSearch/", $count, 150 );
			$data['userRecords'] = $this->audien_model->listIkutAudien($searchText, $returns["page"], $returns["segment"]);
			$data['userInfo'] = $this->audien_model->getUserInfo($userId);
			$data['periodeAudien'] = $this->audien_model->getPeriodeAudien();
        $this->global['pageTitle'] = 'SILATTA : Ujian Audien';
       $this->loadViews('AudienSearch', $this->global, $data, NULL);
  }
  
  function daftarLagi($userId='')
    {
        $this->audien_model->daftarLagi($userId);
            redirect(site_url().'Audiens/daftar/'. $userId);
    }

}