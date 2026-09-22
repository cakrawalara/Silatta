<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Listing extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('list_model');
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
    function listPengajuan()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listPengajuanCount($searchText);

			$returns = $this->paginationCompress ( "listing/listPengajuan/", $count, 200 );
            
            $data['userRecords'] = $this->list_model->listPengajuan($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listPengajuan", $this->global, $data, NULL);
        }
    }

    function edit($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listPengajuan');
            }
            
            $data['periodes'] = $this->list_model->getPeriode();
            $data['roles'] = $this->list_model->getUserRoles();
            $data['dosens'] = $this->list_model->getDosen();
            $data['dosens2'] = $this->list_model->getDosen2();
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listPengajuanEdit", $this->global, $data, NULL);
        }
    }
  
    function editPengajuan()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editPengajuan($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                
                $roleId = $this->input->post('role');
                $dosenId = $this->input->post('dosen');
                $dosenId2 = $this->input->post('dosen2');
                
                $userInfo = array();
                
                
                    $userInfo = array('name'=>$name);
                
                $userInfo2 = array('roleId' => $roleId, 'dosenId'=>$dosenId, 'dosenId2'=>$dosenId2 );
                $userInfo3 = array('export' => 0 );
                
                $result = $this->list_model->editUser($userInfo, $userId);
                $result = $this->list_model->editUser2($userInfo2, $userId);
                $result = $this->list_model->editUser3($userInfo, $userId);
                $result = $this->list_model->editUser4($userInfo2, $userId);
                $result = $this->list_model->editUser12($userInfo3, $userId);
                $result = $this->list_model->editUser6($userInfo2, $userId);
                $result = $this->list_model->editUser10($userInfo2, $userId);
                $result = $this->list_model->editUser11($userInfo, $userId);

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listPengajuan/');
            }
        }
    }

// _____________________________________________________________________________________________________
    

    function listSeminar()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listSeminarCount($searchText);

            $returns = $this->paginationCompress ( "listSeminar/", $count, 150 );
            
            $data['userRecords'] = $this->list_model->listSeminar($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listSeminar", $this->global, $data, NULL);
        }
    }

    function edit2($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listSeminar');
            }
            
            $data['ruangan'] = $this->list_model->getRuangan();
            $data['periodes'] = $this->list_model->getPeriode();
            $data['roles'] = $this->list_model->getUserRoles();
            $data['dosens'] = $this->list_model->getDosen();
            $data['reviewers'] = $this->list_model->getReviewer();
            $data['moderators'] = $this->list_model->getModerator();
            $data['dosens2'] = $this->list_model->getDosen2();
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listSeminarEdit", $this->global, $data, NULL);
        }
    }
  
    function editSeminar()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editSeminar();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                
                $roleId = $this->input->post('role');
                $dosenId = $this->input->post('dosen');
                $dosenId2 = $this->input->post('dosen2');
                $reviewerId = $this->input->post('reviewer');
                $moderatorId = $this->input->post('moderator');
                $tempat = $this->input->post('tempat');
                $tanggal = $this->input->post('tanggal');
                $waktu = $this->input->post('waktu');
                $linkSeminar = $this->input->post('linkSeminar');
                
                $userInfo = array();
                
                    $userInfo = array('name'=>$name, 'reviewerId'=>$reviewerId,'moderatorId'=>$moderatorId, 'tempat'=>$tempat, 'tanggal'=>$tanggal, 'waktu'=>$waktu);
                
                $userInfo2 = array('roleId' => $roleId, 'dosenId'=>$dosenId, 'dosenId2'=>$dosenId2 );
                $userInfo3 = array('linkSeminar' => $linkSeminar, 'export'=> 0, 'jadwal'=> 1);
                
                $result = $this->list_model->editUser($userInfo, $userId);
                $result = $this->list_model->editUser2($userInfo2, $userId);
                $result = $this->list_model->editUser5($userInfo, $userId);
                $result = $this->list_model->editUser6($userInfo2, $userId);
                $result = $this->list_model->editUser8($userInfo2, $userId);
                $result = $this->list_model->editUser9($userInfo3, $userId);

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listSeminar/');
            }
        }
    }
    // _____________________________________________________________________________________________________
    function listSidang()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listSidangCount($searchText);

            $returns = $this->paginationCompress ( "listing/listSidang/", $count, 200 );
            
            $data['userRecords'] = $this->list_model->listSidang($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listSidang", $this->global, $data, NULL);
        }
    }

    function edit3($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listSidang');
            }
            
            $data['periodes'] = $this->list_model->getPeriode();
            $data['ruangan'] = $this->list_model->getRuangan();
            $data['roles'] = $this->list_model->getUserRoles();
            $data['dosens'] = $this->list_model->getDosen();
            $data['pengujis'] = $this->list_model->getPenguji2();
            $data['dosens2'] = $this->list_model->getDosen2();
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listSidangEdit", $this->global, $data, NULL);
        }
    }
  
    function editSidang()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editSidang();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $roleId = $this->input->post('role');
                $dosenId = $this->input->post('dosen');
                $dosenId2 = $this->input->post('dosen2');
                $penguji2Id = $this->input->post('penguji2');
                $tempatSidang = $this->input->post('tempatSidang');
                $tanggalSidang = $this->input->post('tanggalSidang');
                $waktu = $this->input->post('waktu');
                
                $userInfo = array();
                
                    $userInfo = array('name'=>$name,'penguji2Id'=>$penguji2Id, 'tempatSidang'=>$tempatSidang, 'tanggalSidang'=>$tanggalSidang, 'waktu'=>$waktu);
                
                $userInfo2 = array('roleId' => $roleId, 'dosenId'=>$dosenId, 'dosenId2'=>$dosenId2 );
                $userInfo3 = array('export' => 0, 'jadwal'=> 1);
                $result = $this->list_model->editUser($userInfo, $userId);
                $result = $this->list_model->editUser2($userInfo2, $userId);
                $result = $this->list_model->editUser7($userInfo, $userId);
                $result = $this->list_model->editUser8($userInfo2, $userId);
                $result = $this->list_model->editUser13($userInfo3, $userId);

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listSidang/');
            }
        }
    }
// _______________________________________________________________________________

function listJadwalSeminar($userId='')
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listJadwalSeminarCount($searchText);

            $returns = $this->paginationCompress ( "listing/listJadwalSeminar/", $count, 50 );
            
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            $data['userRecords'] = $this->list_model->listJadwalSeminar($searchText, $returns["page"], $returns["segment"]);
            $data['reviewers'] = $this->list_model->getReviewer();
            $data['ruangan'] = $this->list_model->getRuangan();
            $data['moderators'] = $this->list_model->getModerator();
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listJadwalSeminar", $this->global, $data, NULL);
        }
    }
    
    function editJadwalSeminar($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listJadwalSeminar');
            }
            
            $data['userInfo'] = $this->list_model->getUserInfo2($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listJSeminarEdit", $this->global, $data, NULL);
        }
    }
    
    function editJadwal()
    {               $userId = $this->input->post('userId');
                    $reviewer = $this->input->post('reviewer');
                    $moderator = $this->input->post('moderator');
                    $tempat = $this->input->post('tempat');
                    $tanggal = $this->input->post('tanggal');
                    $waktu = $this->input->post('waktu');
                
                $userInfo = array();
                $userInfo = array('userId'=>$userId, 'reviewerId'=>$reviewer, 'moderatorId'=>$moderator, 'tempat'=>$tempat, 'tanggal'=>$tanggal, 'waktu'=>$waktu);
                $result = $this->list_model->editJadwal($userInfo, $userId);
                
                
                redirect('listing/listJadwalSeminar');
            }
    
     function editJadwal2($userId="")
    {               $userId = $this->input->post('userId');
                    $penguji2 = $this->input->post('penguji2');
                    $tempatSidang = $this->input->post('tempatSidang');
                    $tanggalSidang = $this->input->post('tanggalSidang');
                    $waktu = $this->input->post('waktu');
                
                $userInfo = array();
                $userInfo = array('userId'=>$userId, 'penguji2Id'=>$penguji2, 'tempatSidang'=>$tempatSidang, 'tanggalSidang'=>$tanggalSidang, 'waktu'=>$waktu);
                $result = $this->list_model->editJadwal2($userInfo, $userId);
                
                
                redirect('listing/listJadwalSidang');
            }
    
    function editJadwalUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            $this->form_validation->set_rules('fname','Full Name','trim|max_length[128]|xss_clean');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editJadwalUser();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $userInfo = array();
                
                $userInfo = array('name'=>$name, 'jadwal'=>0);
                $result = $this->list_model->editUser5($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listJadwalSeminar');
            }
        }
    }
    
    // _________________________________________________________________________
    
    
    // _______________________________________________________________________________

function listJadwalSidang($userId="")
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listJadwalSidangCount($searchText);

            $returns = $this->paginationCompress ( "listing/listJadwalSidang/", $count, 50 );
            $data['pengujis'] = $this->list_model->getPenguji2();
            $data['ruangan'] = $this->list_model->getRuangan();
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            $data['userRecords'] = $this->list_model->listJadwalSidang($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listJadwalSidang", $this->global, $data, NULL);
        }
    }
    
    function editJadwalSidang($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listJadwalSidang');
            }
            
            $data['userInfo'] = $this->list_model->getUserInfo3($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listJSidangEdit", $this->global, $data, NULL);
        }
    }
    
    function editJadwalUser2()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            $this->form_validation->set_rules('fname','Full Name','trim|max_length[128]|xss_clean');
           
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editJadwalUser2();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $userInfo = array();
                
                $userInfo = array('name'=>$name, 'jadwal'=>0);
                $result = $this->list_model->editUser7($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listJadwalSidang');
            }
        }
    }
    
    // _________________________________________________________________________
    
    
    function listMahasiswa()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('list_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listSidangCount($searchText);

            $returns = $this->paginationCompress ( "listing/listMahasiswa/", $count, 250 );
            
            $data['userRecords'] = $this->list_model->listMahasiswa($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listMahasiswa", $this->global, $data, NULL);
        }
    }

    function edit4($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('listing/listMahasiswa');
            }
            
            $data['roles'] = $this->list_model->getUserRoles();
            $data['userInfo2'] = $this->list_model->getDosen($userId);
            $data['userInfo'] = $this->list_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("listMahasiswaEdit", $this->global, $data, NULL);
        }
    }


    
    
    /**
     * This function is used to edit the user information
     */
    function editUser2()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit4($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
              
                $mobile = $this->input->post('mobile');
                
                $userInfo3 = array();
                
                if(empty($password))
                {
                    $userInfo3 = array('name'=>$name);
                }
                else
                {
                    $userInfo3 = array( 'password'=>getHashedPassword($password));
                }
                $userInfo = array('email'=>$email, 'name'=>$name, 'mobile'=>$mobile);
                $userInfo2 = array('roleId' => $roleId);
                
                
                $result = $this->list_model->editUser00($userInfo, $userId);
                $result = $this->list_model->editUser20($userInfo2, $userId);
                $result = $this->list_model->editUser30($userInfo2, $userId);
                $result = $this->list_model->editUser40($userInfo2, $userId);
                $result = $this->list_model->editUser50($userInfo2, $userId);
                $result = $this->list_model->editUser60($userInfo, $userId);
                $result = $this->list_model->editUser70($userInfo, $userId);
                $result = $this->list_model->editUser80($userInfo, $userId);
                $result = $this->list_model->editUser90($userInfo, $userId);
                $result = $this->list_model->editUser100($userInfo2, $userId);
                
                $result = $this->list_model->editUser130($userInfo3, $userId);
               
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/listMahasiswa');
            }
        }
    }
    public function exportPengajuan() {
        error_reporting(E_ALL);
    
        include_once './application/third_party/phpExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->list_model->select_all();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Lengkap");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NIM");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Ajuan Judul 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Ajuan Judul 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Ajuan Pembimbing 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Ajuan Pembimbing 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Pembimbing 1 Final");
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Pembimbing 2 Final");
       
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->userId); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->ajuan1);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $value->ajuan2);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->dosen);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->dosen2);
            
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./application/third_party/phpExcel/Pengajuan Judul.xlsx'); 

        $this->load->helper('download');
        force_download('./application/third_party/phpExcel/Pengajuan Judul.xlsx', NULL);
    }
    
    public function exportSeminar() {
        error_reporting(E_ALL);
    
        include_once './application/third_party/phpExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->list_model->select_all_seminar();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "Nama");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NIM");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Judul");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Pembimbing 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Pembimbing 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Reviewer");
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Moderator");
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Tanggal");
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Waktu");
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Tempat");
       
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->judul);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->dosen);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $value->dosen2);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->reviewer);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->moderator);
           
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->tempat);
            
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./application/third_party/phpExcel/Jadwal Seminar.xlsx'); 

        $this->load->helper('download');
        force_download('./application/third_party/phpExcel/Jadwal Seminar.xlsx', NULL);
    }
    
    public function exportSidang() {
        error_reporting(E_ALL);
    
        include_once './application/third_party/phpExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->list_model->select_all_sidang();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "Nama");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NIM");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Judul");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Ketua Penguji");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Penguji 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Penguji 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Tanggal");
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Waktu");
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Ruang Sidang");
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Catatan");
       
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->judul);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->dosen);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $value->dosen2);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->penguji2);
            
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->tempatSidang);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Berkas Lengkap");
            
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./application/third_party/phpExcel/Jadwal Sidang.xlsx'); 

        $this->load->helper('download');
        force_download('./application/third_party/phpExcel/Jadwal Sidang.xlsx', NULL);
    }
    
    // _________________________ History ________________________
    
    public function historySeminar($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->lihatHistoryCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : History Seminar';
        $data['userRecords'] = $this->list_model->lihatHistory($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('historySeminar', $this->global, $data, NULL);
  }
  
  public function historyFound($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listHistoryCount($searchText);

			$returns = $this->paginationCompress ( "listHistory/", $count, 150 );
			$data['userRecords'] = $this->list_model->listHistory($searchText, $returns["page"], $returns["segment"]);
			$data['userInfo'] = $this->list_model->getUserInfo($userId);
        $this->global['pageTitle'] = 'SILATTA : History Seminar';
       $this->loadViews('historySeminarList', $this->global, $data, NULL);
  }
  
  
//   ___________________________________________________________________________________________________________________________

public function historySidang($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->lihatHistorySidangCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : History Sidang';
        $data['userRecords'] = $this->list_model->lihatHistorySidang($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('historySidang', $this->global, $data, NULL);
  }
  
  public function historyFound2($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->listHistorySidangCount($searchText);

			$returns = $this->paginationCompress ( "listHistory/", $count, 150 );
			$data['userRecords'] = $this->list_model->listHistorySidang($searchText, $returns["page"], $returns["segment"]);
			$data['userInfo'] = $this->list_model->getUserInfo($userId);
        $this->global['pageTitle'] = 'SILATTA : History Seminar';
       $this->loadViews('historySidangList', $this->global, $data, NULL);
  }
  function editHistory()
    {                $userId = $this->input->post('userId');
                    $jadwal = $this->input->post('jadwal');
                
                $userInfo = array();
                $userInfo = array('jadwal'=>$jadwal);
                $result = $this->list_model->editHistory($userInfo, $userId);
                
                
                redirect('listing/listJadwalSidang');
            }
// _______________________________Ruangan____________________________________________________________

  public function ruangan($userId='')
    {
        $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->list_model->lihatRuanganCount($searchText);

			$returns = $this->paginationCompress ( "index/", $count, 150 );
        $this->global['pageTitle'] = 'SILATTA : Lihat Ruangan';
        $data['userRecords'] = $this->list_model->lihatRuangan($searchText, $returns["page"], $returns["segment"], $userId);
       $this->loadViews('listRuangan', $this->global, $data, NULL);
  }
  function tambahRuangan()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
           
            $this->global['pageTitle'] = 'SILATTA : Tambah Baru Ruangan';

            $this->loadViews("listRuanganAdd", $this->global, NULL);
        }
    }
    
    function prosesTambahRuangan()
    {
        
               
                $ruanganId = $this->input->post('ruanganId');
                $ruangan = $this->input->post('ruangan');
                
                $userInfo = array('ruanganId'=>$ruanganId, 'ruangan'=>$ruangan);
                $result = $this->list_model->tambahRuangan($userInfo);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('listing/ruangan');
            
    }
    
    function editRuangan()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $ruanganId = $this->input->post('ruanganId');
            
            $this->form_validation->set_rules('ruanganId','Id Ruangan','trim|required|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editRuangan($ruanganId);
            }
            else
            {
                $ruanganId = $this->input->post('ruanganId');
                $ruangan = $this->input->post('ruangan');
                
                $userInfo = array();
                $userInfo = array('ruanganId'=>$ruanganId, 'ruangan'=>$ruangan);
                $result = $this->list_model->editRuangan($userInfo, $ruanganId);
                

                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('listing/ruangan');
            }
        }
}

function hapusRuangan(){
        $ruanganId=$this->input->post('ruanganId');
        $this->list_model->hapusRuangan($ruanganId);
        redirect('listing/ruangan');
    }
}

?>