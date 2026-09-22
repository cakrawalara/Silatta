<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Sidang extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sidang_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index($userId = NULL)
    {
         
          $data['roles'] = $this->sidang_model->getUserRoles();
           $data['dosens'] = $this->sidang_model->getDosen();
           $data['dosens2'] = $this->sidang_model->getDosen2();
          $data['userInfo'] = $this->sidang_model->getUserInfo($userId);
          $this->global['pageTitle'] = 'SILATTA : My Profil';
            
            $this->loadViews("sidang", $this->global, $data, NULL);
        
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
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editUser($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $nim = $this->input->post('nim');
                $linkSidang = $this->input->post('linkSidang');
              	$judul = $this->input->post('judul');
                $userInfo = array();
                
                
                    $userInfo = array('linkSidang'=>$linkSidang, 'judul'=>$judul,  );
                
                $userInfo2 = array('export'=> 1 );
                
                $result = $this->sidang_model->editUser($userInfo, $userId);
                $result = $this->sidang_model->editUser2($userInfo, $userId);
                $result = $this->sidang_model->editUser3($userInfo2, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("sidang/index/$userId");
            }
        }
    }


}

?>