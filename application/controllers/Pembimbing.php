<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Pembimbing extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembimbing_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Dashboard';
        
        $this->loadViews("pembimbing", $this->global, NULL , NULL);
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
            $this->load->model('pembimbing_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->pembimbing_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "pembimbing/userListing/", $count, 5 );
            
            $data['userRecords'] = $this->pembimbing_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("pembimbing", $this->global, $data, NULL);
        }
    }


    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editPembimbing2($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('pembimbing/userListing');
            }
            $data['dosens'] = $this->pembimbing_model->getDosen();
            $data['dosens2'] = $this->pembimbing_model->getDosen2();
            $data['userInfo'] = $this->pembimbing_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SPSS : Edit User';
            
            $this->loadViews("editPembimbing", $this->global, $data, NULL);
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
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editPembimbing2($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $dosenId = $this->input->post('dosen');
                $dosenId2 = $this->input->post('dosen2');
                
                $userInfo = array();
                 $userInfo = array( 'dosenId'=>$dosenId, 'dosenId2'=>$dosenId2);
                
                $result = $this->pembimbing_model->editUser($userInfo, $userId);
                $result = $this->pembimbing_model->editUser2($userInfo, $userId);
                $result = $this->pembimbing_model->editUser3($userInfo, $userId);
                $result = $this->pembimbing_model->editUser4($userInfo, $userId);
                $result = $this->pembimbing_model->editUser5($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('pembimbing/userListing');
            }
        }
    }


    
}

?>