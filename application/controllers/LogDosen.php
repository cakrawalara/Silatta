<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class LogDosen extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_dosen_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Dosen';
        
        $this->loadViews("log3", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "dosen/userListing/", $count, 500 );
            
            $data['userRecords'] = $this->log_dosen_model->userListing($userId);
            $data['userRecords2'] = $this->log_dosen_model->userListing2($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("logPembimbing", $this->global, $data, NULL);
        
    }

    function praPenelitian1($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount($searchText);

            $returns = $this->paginationCompress ( "dosen/userListing/", $count, 500 );
            
            $data['userRecords'] = $this->log_dosen_model->userListing($userId);
            $data['userRecords2'] = $this->log_dosen_model->userListing2($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("log3", $this->global, $data, NULL);
        
    }

    function praPenelitian2($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount($searchText);

            $returns = $this->paginationCompress ( "dosen/userListing/", $count, 500 );
            
            $data['userRecords'] = $this->log_dosen_model->userListing($userId);
            $data['userRecords2'] = $this->log_dosen_model->userListing2($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("log32", $this->global, $data, NULL);
        
    }

    function userListing2($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount2($searchText);

            $returns = $this->paginationCompress ( "dosen/userListing2/", $count, 500 );
            
            $data['userRecords3'] = $this->log_dosen_model->userListing3($userId);
            $data['userRecords4'] = $this->log_dosen_model->userListing4($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("logPembimbing0", $this->global, $data, NULL);
        
    }

    function penelitian1($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount2($searchText);

            $returns = $this->paginationCompress ( "dosen/userListing2/", $count, 500 );
            
            $data['userRecords3'] = $this->log_dosen_model->userListing3($userId);
            $data['userRecords4'] = $this->log_dosen_model->userListing4($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("log4", $this->global, $data, NULL);
        
    }

    function penelitian2($userId='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->userListingCount2($searchText);

            $returns = $this->paginationCompress ( "dosen/userListing2/", $count, 500 );
            
            $data['userRecords3'] = $this->log_dosen_model->userListing3($userId);
            $data['userRecords4'] = $this->log_dosen_model->userListing4($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("log42", $this->global, $data, NULL);
        
    }
    
    function pembimbing1($nim='')
    {
        
            $this->load->model('log_dosen_model');
            
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->logPembimbing1Count($searchText);

			$returns = $this->paginationCompress ( "log/pembimbing1/", $count, 200 );
            
            $data['userRecords'] = $this->log_dosen_model->logPembimbing1($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            $data['userInfo'] = $this->log_dosen_model->getUser($nim);
            
            $this->loadViews('logPembimbing1Dosen', $this->global, $data, NULL);
        
    }

    function pembimbing2($nim='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->logPembimbing2Count($searchText);

            $returns = $this->paginationCompress ( "log/pembimbing2/", $count, 200 );
            
            $data['userRecords'] = $this->log_dosen_model->logPembimbing2($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            $data['userInfo'] = $this->log_dosen_model->getUser2($nim);
            
            $this->loadViews('logPembimbing2Dosen', $this->global, $data, NULL);
        
    }

    function pembimbing3($nim='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->logPembimbing3Count($searchText);

            $returns = $this->paginationCompress ( "log/pembimbing3/", $count, 200 );
            
            $data['userRecords'] = $this->log_dosen_model->logPembimbing3($nim);
            $data['userInfo'] = $this->log_dosen_model->getUser3($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing3Dosen', $this->global, $data, NULL);
        
    }

    function pembimbing4($nim='')
    {
        
            $this->load->model('log_dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_dosen_model->logPembimbing4Count($searchText);

            $returns = $this->paginationCompress ( "log/pembimbing4/", $count, 200 );
            
            $data['userRecords'] = $this->log_dosen_model->logPembimbing4($nim);
            $data['userInfo'] = $this->log_dosen_model->getUser4($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing4Dosen', $this->global, $data, NULL);
        
    }
    function editLog($logSeminarId = NULL)
    {
             $this->load->model('log_model');
            $data['userInfo'] = $this->log_model->getUserInfo($logSeminarId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing1DosenEdit", $this->global, $data, NULL);
        
    }
    function accSempro($userId='')
    {
        $this->log_dosen_model->accSempro($userId);
            redirect(site_url().'logDosen/pembimbing1/'. $userId);
    }
    function cancelAccSempro($userId='')
    {
        $this->log_dosen_model->cancelAccSempro($userId);
            redirect(site_url().'logDosen/pembimbing1/'. $userId);
    }
     function accSempro2($userId='')
    {
        $this->log_dosen_model->accSempro2($userId);
            redirect(site_url().'logDosen/pembimbing2/'. $userId);
    }
    
    function cancelAccSempro2($userId='')
    {
        $this->log_dosen_model->cancelAccSempro2($userId);
            redirect(site_url().'logDosen/pembimbing2/'. $userId);
    }
    function accSidang($userId='')
    {
        $this->log_dosen_model->accSidang($userId);
            redirect(site_url().'logDosen/pembimbing3/'. $userId);
    }
    function cancelAccSidang($userId='')
    {
        $this->log_dosen_model->cancelAccSidang($userId);
            redirect(site_url().'logDosen/pembimbing3/'. $userId);
    }
    function accSidang2($userId='')
    {
        $this->log_dosen_model->accSidang2($userId);
            redirect(site_url().'logDosen/pembimbing4/'. $userId);
    }
    function cancelAccSidang2($userId='')
    {
        $this->log_dosen_model->cancelAccSidang2($userId);
            redirect(site_url().'logDosen/pembimbing4/'. $userId);
    }
     function terima($logSeminarId='', $nim='')
    {
            $this->log_dosen_model->acc($logSeminarId);
            redirect(site_url().'logDosen/pembimbing1/'. $nim);
    }
    function unverified($logSeminarId='', $nim='')
    {
            $this->log_dosen_model->notAcc($logSeminarId);
            
            $this->session->set_flashdata('success', 'User Berhasil Diaktifkan'); 
            redirect(site_url().'logDosen/pembimbing1/'.$nim);
    }


    function editLog2($logSeminar2Id = NULL)
    {
             $this->load->model('log_model');
            $data['userInfo'] = $this->log_model->getUserInfo2($logSeminar2Id);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing2DosenEdit", $this->global, $data, NULL);
        
    }
     function terima2($logSeminar2Id='', $nim='')
    {
            $this->log_dosen_model->acc2($logSeminar2Id);
            redirect(site_url().'logDosen/pembimbing2/'. $nim);
    }
    function unverified2($logSeminar2Id='', $nim='')
    {
            $this->log_dosen_model->notAcc2($logSeminar2Id);
            $this->session->set_flashdata('success', 'User Berhasil Diaktifkan'); 
            redirect(site_url().'logDosen/pembimbing2/'.$nim);
    }




    function editLog3($logSidangId = NULL)
    {
             $this->load->model('log_model');
            $data['userInfo'] = $this->log_model->getUserInfo3($logSidangId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing3DosenEdit", $this->global, $data, NULL);
        
    }
    
     function terima3($logSidangId='', $nim='')
    {
            $this->log_dosen_model->acc3($logSidangId);
            redirect(site_url().'logDosen/pembimbing3/'. $nim);
    }
    function unverified3($logSidangId='', $nim='')
    {
            $this->log_dosen_model->notAcc3($logSidangId);
            $this->session->set_flashdata('success', 'User Berhasil Diaktifkan'); 
            redirect(site_url().'logDosen/pembimbing3/'.$nim);
    }

    function editLog4($logSidang2Id = NULL)
    {
             $this->load->model('log_model');
            $data['userInfo'] = $this->log_model->getUserInfo4($logSidang2Id);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing4DosenEdit", $this->global, $data, NULL);
        
    }
    
     function terima4($logSidang2Id='', $nim2='')
    {
            $this->log_dosen_model->acc4($logSidang2Id);
            redirect(site_url().'logDosen/pembimbing4/'. $nim2);
    }
    function unverified4($logSidang2Id='', $nim='')
    {
            $this->log_dosen_model->notAcc4($logSidang2Id);
            $this->session->set_flashdata('success', 'User Berhasil Diaktifkan'); 
            redirect(site_url().'logDosen/pembimbing4/'.$nim);
    }



    
     

    function editLogProses($logSeminarId= '')
    {
        
           
                $logSeminarId = $this->input->post('logSeminarId');
                $statusSeminar = $this->input->post('statusSeminar');
                $userInfo = array('statusSeminar'=>1);
                
                $result = $this->log_model->editLog($userInfo, $logSeminarId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('log');
            }
    function acc()
    {
           
            $logSeminarId = $this->input->post('logSeminarId');
            $userInfo = array('statusSeminar'=>1);
            
            $result = $this->log_dosen_model->deleteUser($logSeminarId, $userInfo);
            redirect('logDosen/pembimbing1');
    }
}