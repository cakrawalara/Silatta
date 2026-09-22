<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Seminar extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('seminar_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index($userId = NULL)
    {
         
          $data['roles'] = $this->seminar_model->getUserRoles();
           $data['dosens'] = $this->seminar_model->getDosen();
           $data['dosens2'] = $this->seminar_model->getDosen2();
          $data['userInfo'] = $this->seminar_model->getUserInfo($userId);
          $this->global['pageTitle'] = 'SILATTA : My Profil';
            
            $this->loadViews("seminar", $this->global, $data, NULL);
        
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
                $judul = $this->input->post('judul');
                $linkSeminar = $this->input->post('linkSeminar');
                $userInfo = array();
                
                    $userInfo = array('name'=>$name, 'nim'=>$nim, 'judul'=>$judul, 'linkSeminar'=>$linkSeminar, 'export'=> 1
                                    );
                
                $userInfo2 = array('linkSeminar' => $linkSeminar, 'judul'=>$judul );
                $userInfo3 = array('judul'=>$judul );
                $result = $this->seminar_model->editUser($userInfo, $userId);
                $result = $this->seminar_model->editUser2($userInfo2, $userId);
                $result = $this->seminar_model->editUser3($userInfo3, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("seminar/index/$userId");
            }
        }
    }


}

?>