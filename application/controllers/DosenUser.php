<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class DosenUser extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_user_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('dosen_user_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->dosen_user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "dosenUser/userListing/", $count, 30 );
            
            $data['userRecords'] = $this->dosen_user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("usersDosen", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewDosen()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('dosen_user_model');
            $data['roles'] = $this->dosen_user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'SILATTA : Add New User';

            $this->loadViews("addNewDosen", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->dosen_user_model->checkEmailExists($email);
        } else {
            $result = $this->dosen_user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewDosen();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                $nim = $this->input->post('nim');
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name, 'userId'=>$nim,  'nim'=>$nim, 'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                $userInfo2 = array('email'=>$email, 'dosen'=> $name, 'mobile'=>$mobile, 'dosenId'=>$nim,  'nip'=>$nim);
                $userInfo3 = array('email'=>$email, 'dosen2'=> $name, 'mobile'=>$mobile, 'dosenId2'=>$nim,  'nip'=>$nim);
                $userInfo4 = array('email'=>$email, 'reviewer'=> $name, 'mobile'=>$mobile, 'reviewerId'=>$nim,  'nip'=>$nim);
                $userInfo5 = array('email'=>$email, 'moderator'=> $name, 'mobile'=>$mobile, 'moderatorId'=>$nim,  'nip'=>$nim);
                $userInfo6 = array('email'=>$email, 'penguji2'=> $name, 'mobile'=>$mobile, 'penguji2Id'=>$nim,  'nip'=>$nim);
                $this->load->model('dosen_user_model');
                $result = $this->dosen_user_model->addNewUser($userInfo);
                $result = $this->dosen_user_model->addNewUser2($userInfo2);
                $result = $this->dosen_user_model->addNewUser3($userInfo3);
                $result = $this->dosen_user_model->addNewUser4($userInfo4);
                $result = $this->dosen_user_model->addNewUser5($userInfo5);
                $result = $this->dosen_user_model->addNewUser6($userInfo6);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('dosenUser/addNewDosen');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->dosen_user_model->getUserRoles();
            $data['userInfo2'] = $this->dosen_user_model->getDosen($userId);
            $data['userInfo'] = $this->dosen_user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }


    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
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
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $dosen = ucwords(strtolower($this->input->post('fname')));
                $dosen2 = ucwords(strtolower($this->input->post('fname')));
                $reviewer = ucwords(strtolower($this->input->post('fname')));
                $moderator = ucwords(strtolower($this->input->post('fname')));
                $penguji2 = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $dosenId = $this->input->post('dosen');
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
                
                $userInfo4 = array( 'dosen'=>$dosen, 'email'=>$email);
                $userInfo5 = array( 'dosen2'=>$dosen2, 'email'=>$email);
                $userInfo6 = array( 'reviewer'=>$reviewer, 'email'=>$email);
                $userInfo7 = array( 'moderator'=>$moderator, 'email'=>$email);
                $userInfo8 = array( 'penguji2'=>$penguji2, 'email'=>$email);
                $result = $this->dosen_user_model->editUser($userInfo, $userId);
                $result = $this->dosen_user_model->editUser2($userInfo2, $userId);
                $result = $this->dosen_user_model->editUser3($userInfo2, $userId);
                $result = $this->dosen_user_model->editUser4($userInfo2, $userId);
                $result = $this->dosen_user_model->editUser5($userInfo2, $userId);
                $result = $this->dosen_user_model->editUser6($userInfo, $userId);
                $result = $this->dosen_user_model->editUser7($userInfo, $userId);
                $result = $this->dosen_user_model->editUser8($userInfo, $userId);
                $result = $this->dosen_user_model->editUser9($userInfo, $userId);
                $result = $this->dosen_user_model->editUser10($userInfo2, $userId);
                $result = $this->dosen_user_model->editUser11($userInfo4, $userId);
                $result = $this->dosen_user_model->editUser12($userInfo5, $userId);
                $result = $this->dosen_user_model->editUser13($userInfo3, $userId);
                $result = $this->dosen_user_model->editUser14($userInfo6, $userId);
                $result = $this->dosen_user_model->editUser15($userInfo7, $userId);
                $result = $this->dosen_user_model->editUser16($userInfo8, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->dosen_user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'SILATTA : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[50]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[50]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[50]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->dosen_user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->dosen_user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'SILATTA : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    public function export() {
        error_reporting(E_ALL);
    
        include_once './application/third_party/phpExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->dosen_user_model->select_all();

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 
        $rowCount = 1; 

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Lengkap");
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Jenis Kelamin");
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "NIM");
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Agama");
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Tanggal Lahir");
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Email");
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Nomor Hp");
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Nama Bapak");
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Nama Ibu");
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, "Nomor HP Orang Tua");
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, "Judul Skripsi");
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, "Pembimbing 1");
        $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, "Pembimbing 2");
        $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, "Reviewer");
        $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, "Penguji 2");
        $rowCount++;

        foreach($data as $value){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->userId); 
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->jenisKelamin);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->nim);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$rowCount, $value->agama);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->tanggalLahir);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->mobile, PHPExcel_Cell_DataType::TYPE_STRING); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->namaBapak);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->namaIbu);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->mobileOrtu);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->judul);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $value->dosen);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $value->dosen2);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $value->reviewer);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $value->penguji2);
            $rowCount++; 
        } 

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save('./application/third_party/phpExcel/Data Mahasiswa.xlsx'); 

        $this->load->helper('download');
        force_download('./application/third_party/phpExcel/Data Mahasiswa.xlsx', NULL);
    }
}

?>