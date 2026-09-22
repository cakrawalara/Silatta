<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Pengajuan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index($userId = NULL)
    {
         
          $data['roles'] = $this->pengajuan_model->getUserRoles();
           $data['dosens'] = $this->pengajuan_model->getDosen();
           $data['dosens2'] = $this->pengajuan_model->getDosen2();
          $data['userInfo'] = $this->pengajuan_model->getUserInfo($userId);
          $this->global['pageTitle'] = 'SILATTA : My Profil';
            
            $this->loadViews("pengajuan", $this->global, $data, NULL);
        
    }
    
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == FALSE)
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
                $this->editUser($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $ajuan1 = $this->input->post('ajuan1');
                $ajuan2 = $this->input->post('ajuan2');
                $dosenId = $this->input->post('dosen');
                $dosenId2 = $this->input->post('dosen2');
                $userInfo = array();
                
                    $userInfo = array('name'=>$name, 'dosenId'=>$dosenId, 'ajuan1'=>$ajuan1, 'ajuan2'=>$ajuan2, 'dosenId2'=>$dosenId2, 'export'=> 1
                                    );
                
                
                $result = $this->pengajuan_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("pengajuan/index/$userId");
            }
        }
    }


}

?>