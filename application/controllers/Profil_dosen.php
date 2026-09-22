<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Profil_dosen extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_dosen_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index($userId = NULL)
    {
         
          $data['roles'] = $this->profil_dosen_model->getUserRoles();
          $data['userInfo'] = $this->profil_dosen_model->getUserInfo($userId);
          $this->global['pageTitle'] = 'SILATTA : My Profil';
            
            $this->loadViews("profil_dosen", $this->global, $data, NULL);
        
    }
    
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isLoggedIn())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            
            
            $this->form_validation->set_rules('mobile','Mobile Number','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $dosen = ucwords(strtolower($this->input->post('fname')));
                $dosen2 = ucwords(strtolower($this->input->post('fname')));
                $reviewer = ucwords(strtolower($this->input->post('fname')));
                $penguji2 = ucwords(strtolower($this->input->post('fname')));
                $moderator = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $nip = $this->input->post('nip');
                $jenisKelamin = $this->input->post('jenisKelamin');
                $alamat = $this->input->post('alamat');
                $tanggalLahir = $this->input->post('tanggalLahir');
                $agama = $this->input->post('agama');
                

                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('jenisKelamin'=>$jenisKelamin, 'alamat'=>$alamat, 'tanggalLahir'=>$tanggalLahir, 'agama'=>$agama,  
                                    'mobile'=>$mobile, 'email' => $email, 'nip'=>$nip);
                }
                else
                {
                    $userInfo = array('jenisKelamin'=>$jenisKelamin, 'alamat'=>$alamat, 'tanggalLahir'=>$tanggalLahir, 'agama'=>$agama,  
                                    'mobile'=>$mobile, 'email' => $email, 'nip'=>$nip);
                }
                $userInfo2 = array('dosen' => $dosen);
                $userInfo3 = array('dosen2' => $dosen2);
                $userInfo4 = array('reviewer' => $reviewer);
                $userInfo5 = array('penguji2' => $penguji2);
                $userInfo6 = array('moderator' => $moderator);
                $userInfo7 = array('email' => $email);
                $result = $this->profil_dosen_model->editUser($userInfo, $userId);
                $result = $this->profil_dosen_model->editUser2($userInfo2, $userId);
                $result = $this->profil_dosen_model->editUser3($userInfo, $userId);
                $result = $this->profil_dosen_model->editUser4($userInfo3, $userId);
                $result = $this->profil_dosen_model->editUser5($userInfo, $userId);
                $result = $this->profil_dosen_model->editUser6($userInfo4, $userId);
                $result = $this->profil_dosen_model->editUser7($userInfo, $userId);
                $result = $this->profil_dosen_model->editUser8($userInfo5, $userId);
                $result = $this->profil_dosen_model->editUser9($userInfo, $userId);
                $result = $this->profil_dosen_model->editUser10($userInfo6, $userId);
                $result = $this->profil_dosen_model->editUser11($userInfo7, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("profil_dosen/index/$userId");
            }
        }
    }


}

?>