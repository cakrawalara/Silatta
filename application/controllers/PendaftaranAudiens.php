<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class PendaftaranAudiens extends BaseController
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
   
  public function listing($userId='')
    {
        $data['kuota'] = $this->audien_model->getAudienKuota();
        $data['periodeSempro'] = $this->audien_model->getPeriodeAudien(); 
        $data['userinfo'] = $this->audien_model->getPeriodeAudien(); 
        $this->load->model('audien_model');
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->audien_model->listAudienCount($searchText);

			$returns = $this->paginationCompress ( "listing/", $count, 150 );
			$data['userRecords'] = $this->audien_model->listAudien($searchText, $returns["page"], $returns["segment"]);
        $this->global['pageTitle'] = 'SILATTA : List Audien';
       $this->loadViews('listAudien', $this->global, $data, NULL);
    }
    
    function addNew($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('audien_model');
            $data['periodeSempro'] = $this->audien_model->getPeriodeAudien(); 
            $data['ruangan'] = $this->audien_model->getRuangan(); 
            $data['userinfo'] = $this->audien_model->getUserInfo($userId); 
            
            $this->global['pageTitle'] = 'SILATTA : Tambah Ruang Seminar';

            $this->loadViews("listAudienTambah", $this->global, $data, NULL);
        }
    }
    
    public function prosesTambah()
  {
  	 $this->load->library('form_validation');
            
            $this->form_validation->set_rules('ruangan','Ruangan','trim|required|max_length[128]|xss_clean');
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->prosesTambah();
            }
            else
            {
                
                 $ruangan = $this->input->post('ruangan');
                 $status = $this->input->post('status');
                 $kuota = $this->input->post('kuota');
                 $idPeriodeSempro = $this->input->post('idPeriodeSempro');
                 
                
                $userInfo = array('ruangan'=> $ruangan, 'kuota'=>$kuota, 'status'=>$status,  'idPeriodeSempro'=>$idPeriodeSempro);
                
                $this->load->model('audien_model');
                $result = $this->audien_model->addNewRuangan($userInfo);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('PendaftaranAudiens/listing');
            }
        }
        
        
        function hapusRuang(){
            $idAudienKuota=$this->input->post('idAudienKuota');
            $this->audien_model->hapusRuangan($idAudienKuota);
            redirect('PendaftaranAudiens/listing');
                }
            
        // function editRuang(){
        //             $idAudienKuota=$this->input->post('idAudienKuota');
        //             $ruangan=$this->input->post('ruangan');
        //             $kuota=$this->input->post('kuota');
        //             $status=$this->input->post('status');
        //             $idPeriodeSempro=$this->input->post('idPeriodeSempro');
        //             $this->audien_model->editRuang($ruangan, $kuota, $idPeriodeSempro, $idAudienKuota, $status);
        //             redirect('PendaftaranAudiens/listing');
        // }
        
         function editRuang()
    {
                    $idAudienKuota = $this->input->post('idAudienKuota');
                    $ruangan = $this->input->post('ruangan');
                    $kuota = $this->input->post('kuota');
                    $status = $this->input->post('status');
                    $idPeriodeSempro = $this->input->post('idPeriodeSempro');
                
                $userInfo = array();
                $userInfo = array('idPeriodeSempro'=>$idPeriodeSempro, 'status'=>$status, 'kuota'=>$kuota, 'ruangan'=>$ruangan, 'idAudienKuota'=>$idAudienKuota);
                $result = $this->audien_model->editRuang2($userInfo, $idAudienKuota);
                
                
                redirect('PendaftaranAudiens/listing');
            }
        
        
        public function AudienList($idAudienKuota='', $userId="")
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->audien_model->listIkutAudienListCount($searchText);

			$returns = $this->paginationCompress ( "AudienList/", $count, 150 );
			$data['userRecords'] = $this->audien_model->listIkutAudienSempro($searchText, $returns["page"], $returns["segment"], $idAudienKuota);
			$data['userInfo'] = $this->audien_model->getUserInfo($userId);
			$data['periodeSempro'] = $this->audien_model->getPeriodeAudien();
			$data['kuota'] = $this->audien_model->getAudienKuota();
			
			
        $this->global['pageTitle'] = 'SILATTA : Ujian Audien';
       $this->loadViews('listAudienView', $this->global, $data, NULL);
  }
  
   public function export() {
        error_reporting(E_ALL);
    
        include_once './application/third_party/phpExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->audien_model->select_all();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Lengkap");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NIM");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Periode Seminar");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Ruangan");
        
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->userId); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->periode);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $value->ruangan);
            
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./application/third_party/phpExcel/Audiens.xlsx'); 

        $this->load->helper('download');
        force_download('./application/third_party/phpExcel/Audiens.xlsx', NULL);
    }
    
}