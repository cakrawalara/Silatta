<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Log extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_model');
        $this->isLoggedIn();   

    }
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Log';
       $this->loadViews('log', $this->global, NULL);
  }
  
  public function index2()
    {
        $this->global['pageTitle'] = 'SILATTA : Log';
       $this->loadViews('log2', $this->global, NULL);
  }
  
  public function index3($userId='')
    {
         $this->load->model('log_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "log/index3/", $count, 500 );
            
            $data['userRecords'] = $this->log_model->listLog($userId);
            $data['userRecords2'] = $this->log_model->userListing2($userId);
            
        $this->global['pageTitle'] = 'SILATTA : Log';
       $this->loadViews('log3', $this->global, $data, NULL);
  }

//log pembimbing 1 SEMINAR

  function pembimbing1($nim='')
    {
        
            $this->load->model('log_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_model->logPembimbing1Count($searchText);

			$returns = $this->paginationCompress ( "log/pembimbing1/", $count, 200 );
            
            $data['userRecords'] = $this->log_model->logPembimbing1($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing1', $this->global, $data, NULL);
        
    }
     function addLog($userId='')
    {
       
            $data['userInfo'] = $this->log_model->getLogInfo($userId);
            $this->global['pageTitle'] = 'SILATTA : Add New Log';

            $this->loadViews("addLog", $this->global, $data,  NULL);
        
    }
    
    function addNewLog($userId='')
    {
       
                
                $nim = $this->input->post('nim');
                $logBimbinganSeminar = $this->input->post('logBimbinganSeminar');
                $dosenId = $this->input->post('dosenId');
                $tanggalBimbingan = $this->input->post('tanggalBimbingan');
                $userInfo = array('nim'=>$this->session->userdata ( 'userId' ), 'userId'=>$this->session->userdata ( 'userId' ), 'logBimbinganSeminar'=>$logBimbinganSeminar, 'dosenId'=>$dosenId,'tanggalBimbingan'=>$tanggalBimbingan );
                
                $this->load->model('log_model');
                $result = $this->log_model->addNewLog($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Log created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Log creation failed');
                }
                
                redirect(site_url().'log/pembimbing1/'. $userId);
            
        }
    
    function editLog($logSeminarId = NULL)
    {
        
            $data['userInfo'] = $this->log_model->getUserInfo($logSeminarId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing1Edit", $this->global, $data, NULL);
        
    }
    
    function editLogProses($logSeminarId= '', $userId='')
    {
        
           
                $logSeminarId = $this->input->post('logSeminarId');
                $logBimbinganSeminar = $this->input->post('logBimbinganSeminar');
                $tanggalBimbingan = $this->input->post('tanggalBimbingan');
                $userId = $this->input->post('userId');
                $userInfo = array('logBimbinganSeminar'=>$logBimbinganSeminar, 'tanggalBimbingan'=>$tanggalBimbingan);
                
                $result = $this->log_model->editLog($userInfo, $logSeminarId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect(site_url().'log/pembimbing1/'. $this->session->userdata ( 'userId' ));
            }
            
    function deleteLog($logSeminarId, $userId)
    {
		$where = array('logSeminarId' => $logSeminarId);
		$this->log_model->deleteLog($where,'tbl_log_seminar_pembimbing1');
		redirect('log/pembimbing1/'.$userId);
	}
    
// ______________________________________________________________________________

//log pembimbing 2 SEMINAR
    
    function pembimbing2($nim2='')
    {
        
            $this->load->model('log_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_model->logPembimbing2Count($searchText);

			$returns = $this->paginationCompress ( "log/pembimbing2/", $count, 200 );
            
            $data['userRecords'] = $this->log_model->logPembimbing2($nim2);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing2', $this->global, $data, NULL);
        
    }
     function addLog2($userId ='')
    {
       
            $data['userInfo'] = $this->log_model->getLogInfo($userId);
            $this->global['pageTitle'] = 'SILATTA : Add New Log';

            $this->loadViews("addLog2", $this->global, $data,  NULL);
        
    }
    
    function addNewLog2($userId='')
    {
       
                
                $logSeminar2Id = $this->input->post('logSeminar2Id');
                $logBimbingan2Seminar = $this->input->post('logBimbingan2Seminar');
                $dosenId2 = $this->input->post('dosenId2');
                $tanggalBimbingan2 = $this->input->post('tanggalBimbingan2');
                $userInfo = array('nim2'=>$this->session->userdata ( 'userId' ), 'userId2'=>$this->session->userdata ( 'userId' ), 'logBimbingan2Seminar'=>$logBimbingan2Seminar, 'dosenId2'=>$dosenId2, 'tanggalBimbingan2'=>$tanggalBimbingan2);
                
                $this->load->model('log_model');
                $result = $this->log_model->addNewLog2($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Log created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Log creation failed');
                }
                
                redirect('log/pembimbing2/'.$userId);
            
        }
    
    function editLog2($logSeminarId = NULL)
    {
        
            $data['userInfo'] = $this->log_model->getUserInfo2($logSeminarId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing2Edit", $this->global, $data, NULL);
        
    }
    
    function editLogProses2($logSeminar2Id= '')
    {
        
           
                $logSeminar2Id = $this->input->post('logSeminar2Id');
                $logBimbingan2Seminar = $this->input->post('logBimbingan2Seminar');
                $tanggalBimbingan2 = $this->input->post('tanggalBimbingan2');
                $userInfo = array('logBimbingan2Seminar'=>$logBimbingan2Seminar, 'tanggalBimbingan2'=>$tanggalBimbingan2);
                
                $result = $this->log_model->editLog2($userInfo, $logSeminar2Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                 redirect(site_url().'log/pembimbing2/'. $this->session->userdata ( 'userId' ));
            }
            
    function deleteLog2($logSeminar2Id, $userId2)
    {
		$where = array('logSeminar2Id' => $logSeminar2Id);
		$this->log_model->deleteLog2($where,'tbl_log_seminar_pembimbing2');
		redirect('log/pembimbing2/'.$userId2);
	}
	
// _____________________________________________________________________________
//Log pembimbing 1 SIDANG


        function pembimbing3($nim='')
    {
        
            $this->load->model('log_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_model->logPembimbing3Count($searchText);

			$returns = $this->paginationCompress ( "log/pembimbing3/", $count, 200 );
            
            $data['userRecords'] = $this->log_model->logPembimbing3($nim);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing3', $this->global, $data, NULL);
        
    }
     function addLog3($userId ='')
    {
       
            $data['userInfo'] = $this->log_model->getLogInfo($userId);
            $this->global['pageTitle'] = 'SILATTA : Add New Log';

            $this->loadViews("addLog3", $this->global, $data,  NULL);
        
    }
    
    function addNewLog3($userId='')
    {
       
                
                $logSidangId = $this->input->post('logSidangId');
                $logBimbinganSidang = $this->input->post('logBimbinganSidang');
                $dosenId = $this->input->post('dosenId');
                $tanggalBimbingan3 = $this->input->post('tanggalBimbingan3');
                $userInfo = array('nim'=>$this->session->userdata ( 'userId' ), 'userId'=>$this->session->userdata ( 'userId' ), 'tanggalBimbingan3'=>$tanggalBimbingan3, 'logBimbinganSidang'=>$logBimbinganSidang, 'dosenId'=>$dosenId);
                
                $this->load->model('log_model');
                $result = $this->log_model->addNewLog3($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Log created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Log creation failed');
                }
                
                redirect('log/pembimbing3/'. $userId);
            
        }
    
    function editLog3($logSidangId = NULL)
    {
        
            $data['userInfo'] = $this->log_model->getUserInfo3($logSidangId);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing3Edit", $this->global, $data, NULL);
        
    }
    
    function editLogProses3($logSidangId= '', $userId='')
    {
        
           
                $logSidangId = $this->input->post('logSidangId');
                $logBimbinganSidang = $this->input->post('logBimbinganSidang');
                $tanggalBimbingan3 = $this->input->post('tanggalBimbingan3');
                $userInfo = array('logBimbinganSidang'=>$logBimbinganSidang, 'tanggalBimbingan3'=>$tanggalBimbingan3);
                
                $result = $this->log_model->editLog3($userInfo, $logSidangId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                 redirect(site_url().'log/pembimbing3/'. $this->session->userdata ( 'userId' ));
            }
            
    function deleteLog3($logSidangId, $userId)
    {
		$where = array('logSidangId' => $logSidangId);
		$this->log_model->deleteLog3($where,'$tbl_log_sidang_pembimbing1');
		redirect('log/pembimbing3/'. $userId);
	}
// ________________________________________________________________________________
//Log Pembimbing 2 SIDANG



 function pembimbing4($nim2='')
    {
        
            $this->load->model('log_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->log_model->logPembimbing4Count($searchText);

			$returns = $this->paginationCompress ( "log/pembimbing4/", $count, 200 );
            
            $data['userRecords'] = $this->log_model->logPembimbing4($nim2);
             $this->global['pageTitle'] = 'SILATTA : User Log';
            
            
            $this->loadViews('logPembimbing4', $this->global, $data, NULL);
        
    }
     function addLog4($userId ='')
    {
       
            $data['userInfo'] = $this->log_model->getLogInfo($userId);
            $this->global['pageTitle'] = 'SILATTA : Add New Log';

            $this->loadViews("addLog4", $this->global, $data,  NULL);
        
    }
    
    function addNewLog4($userId='')
    {
       
                
                $logSidang2Id = $this->input->post('logSidang2Id');
                $logBimbingan2Sidang = $this->input->post('logBimbingan2Sidang');
                $dosenId2 = $this->input->post('dosenId2');
                $tanggalBimbingan4 = $this->input->post('tanggalBimbingan4');
                $userInfo = array('nim2'=>$this->session->userdata ( 'userId' ), 'tanggalBimbingan4'=>$tanggalBimbingan4, 'userId2'=>$this->session->userdata ( 'userId' ), 'logBimbingan2Sidang'=>$logBimbingan2Sidang, 'dosenId2'=>$dosenId2);
                
                $this->load->model('log_model');
                $result = $this->log_model->addNewLog4($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Log created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Log creation failed');
                }
                
                redirect('log/pembimbing4/'. $userId);
            
        }
    
    function editLog4($logSidang2Id = NULL)
    {
        
            $data['userInfo'] = $this->log_model->getUserInfo4($logSidang2Id);
            
            $this->global['pageTitle'] = 'SILATTA : Edit User';
            
            $this->loadViews("logPembimbing4Edit", $this->global, $data, NULL);
        
    }
    
    function editLogProses4($logSidang2Id= '', $userId='')
    {
        
           
                $logSidang2Id = $this->input->post('logSidang2Id');
                $logBimbingan2Sidang = $this->input->post('logBimbingan2Sidang');
                $tanggalBimbingan4 = $this->input->post('tanggalBimbingan4');
                $userInfo = array('logBimbingan2Sidang'=>$logBimbingan2Sidang , 'tanggalBimbingan4'=>$tanggalBimbingan4);
                
                $result = $this->log_model->editLog4($userInfo, $logSidang2Id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect(site_url().'log/pembimbing4/'. $this->session->userdata ( 'userId' ));
            }
            
    function deleteLog4($logSidang2Id, $userId2)
    {
		$where = array('logSidang2Id' => $logSidang2Id);
		$this->log_model->deleteLog4($where,'$tbl_log_sidang_pembimbing2');
		redirect('log/pembimbing4/'. $userId2);
	}



}