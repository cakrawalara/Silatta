<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dosen extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'SILATTA : Dosen';
        
        $this->loadViews("bimbinganDosen", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing($userId='')
    {
        
            $this->load->model('dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->dosen_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "dosen/userListing/", $count, 500 );
            
            $data['userRecords'] = $this->dosen_model->userListing($userId);
            $data['userRecords2'] = $this->dosen_model->userListing2($userId);
            $data['userRecords3'] = $this->dosen_model->userListing3($userId);
            $data['userInfo'] = $this->dosen_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("bimbinganDosen", $this->global, $data, NULL);
        
    }


    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    
    function edit($userId = NULL)
    {
        if($this->isLoggedIn())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['sidang'] = $this->dosen_model->getSidang($userId);
            $data['dosens'] = $this->dosen_model->getDosen($userId);
            $data['userInfo'] = $this->dosen_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Penilaian';
            
            $this->loadViews("penilaian", $this->global, $data, NULL);
        }
    }


    function edit2($userId = NULL)
    {
        if($this->isLoggedIn())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            
            $data['dosens2'] = $this->dosen_model->getDosen2($userId);
            $data['userInfo'] = $this->dosen_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Penilaian';
            
            $this->loadViews("penilaian2", $this->global, $data, NULL);
        }
    }

    function edit3($userId = NULL)
    {
        if($this->isLoggedIn())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            
            $data['dosens3'] = $this->dosen_model->getPenguji2($userId);
            $data['userInfo'] = $this->dosen_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Penilaian';
            
            $this->loadViews("penilaian3", $this->global, $data, NULL);
        }
    }



    function penilaian()
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
                $this->penilaian($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $status = $this->input->post('status5');
                $nim = $this->input->post('nim');
                $judul = $this->input->post('judul');
                $a1 = $this->input->post('a1');
                $a2 = $this->input->post('a2');
                $a3 = $this->input->post('a3');
                $b1 = $this->input->post('b1');
                $b2 = $this->input->post('b2');
                $b3 = $this->input->post('b3');
                $c1 = $this->input->post('c1');
                $c2 = $this->input->post('c2');
                $c3 = $this->input->post('c3');
                $d1 = $this->input->post('d1');
                $d2 = $this->input->post('d2');
                $d3 = $this->input->post('d3');
                $d4 = $this->input->post('d4');
                $e1 = $this->input->post('e1');
                $e2 = $this->input->post('e2');
                $e3 = $this->input->post('e3');
                $f1 = $this->input->post('f1');
                $f2 = $this->input->post('f2');
                $g1 = $this->input->post('g1');
                $g2 = $this->input->post('g2');
                $i1 = $this->input->post('i1');
                $i2 = $this->input->post('i2');
                $i3 = $this->input->post('i3');
                $i4 = $this->input->post('i4');
                $i5 = $this->input->post('i5');
                $i6 = $this->input->post('i6');
                $i7 = $this->input->post('i7');
                $userInfo = array();
                
                 $userInfo = array('userId'=>$userId+$nim, 'dosenId'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,   'a1'=>$a1, 'a2'=>$a2, 'a3'=>$a3, 'b1'=>$b1, 'b2'=>$b2, 'b3'=>$b3, 'c1'=>$c1, 'c2'=>$c2, 'c3'=>$c3, 'd1'=>$d1, 'd2'=>$d2, 'd3'=>$d3, 'd4'=>$d4, 'e1'=>$e1, 'e2'=>$e2, 'e3'=>$e3, 'f1'=>$f1, 'f2'=>$f2, 'g1'=>$g1, 'g2'=>$g2, 'i1'=>$i1, 'i2'=>$i2, 'i3'=>$i3, 'i4'=>$i4, 'i5'=>$i5, 'i6'=>$i6, 'i7'=>$i7 );
                 
                 $userInfo2 = array('userId'=>$userId+$nim,  'ketuaId'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,  'a1'=>$a1 * 3, 'a2'=>$a2 * 3, 'a3'=>$a3 * 4, 'b1'=>$b1 * 5, 'b2'=>$b2 * 5, 'b3'=>$b3 * 5, 'c1'=>$c1 * 5, 'c2'=>$c2 * 5, 'c3'=>$c3 * 5, 'd1'=>$d1 * 3, 'd2'=>$d2 * 4, 'd3'=>$d3 * 4, 'd4'=>$d4 *4, 'e1'=>$e1 * 5, 'e2'=>$e2 * 5, 'e3'=>$e3 * 5, 'f1'=>$f1 * 5, 'f2'=>$f2 * 5, 'g1'=> $g1 * 10, 'g2'=>$g2 * 10, 'i1'=>$i1 * 20, 'i2'=>$i2 * 10, 'i3'=>$i3 * 10, 'i4'=>$i4 * 10, 'i5'=>$i5 * 20, 'i6'=>$i6 * 20, 'i7'=>$i7 * 10, 'totalKetua1'=>(($a1 * 3) + ($a2 * 3) + ($a3 * 4) + ($b1 * 5) + ($b2 * 5) + ($b3 * 5) + ($c1 * 5) + ($c2 * 5) + ($c3 * 5) + ($d1 * 3) + ($d2 * 4) + ($d3 * 4) + ($d4 *4) + ($e1 * 5) + ($e2 * 5) + ($e3 * 5) + ($f1 * 5) + ($f2 * 5) + ($g1 * 10) + ($g2 * 10)), 'totalKetua2'=> (($i1 * 20) + ($i2 * 10) + ($i3 * 10) + ($i4 * 10) + ($i5 * 20) + ($i6 * 20) + ($i7 * 10)) );
                 
                
                $result = $this->dosen_model->addNewUser($userInfo);
                $result = $this->dosen_model->addNewUser2($userInfo2);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("dosen/userListing/$userId");
            }
        }
    }

    function penilaian2()
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
                $this->penilaian($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $dosenId = $this->input->post('dosen2');
                $status = $this->input->post('status5');
                $nim = $this->input->post('nim');
                $judul = $this->input->post('judul');
                $a1 = $this->input->post('a1');
                $a2 = $this->input->post('a2');
                $a3 = $this->input->post('a3');
                $b1 = $this->input->post('b1');
                $b2 = $this->input->post('b2');
                $b3 = $this->input->post('b3');
                $c1 = $this->input->post('c1');
                $c2 = $this->input->post('c2');
                $c3 = $this->input->post('c3');
                $d1 = $this->input->post('d1');
                $d2 = $this->input->post('d2');
                $d3 = $this->input->post('d3');
                $d4 = $this->input->post('d4');
                $e1 = $this->input->post('e1');
                $e2 = $this->input->post('e2');
                $e3 = $this->input->post('e3');
                $f1 = $this->input->post('f1');
                $f2 = $this->input->post('f2');
                $g1 = $this->input->post('g1');
                $g2 = $this->input->post('g2');
                $i1 = $this->input->post('i1');
                $i2 = $this->input->post('i2');
                $i3 = $this->input->post('i3');
                $i4 = $this->input->post('i4');
                $i5 = $this->input->post('i5');
                $i6 = $this->input->post('i6');
                $i7 = $this->input->post('i7');
                $userInfo = array();
                
                 $userInfo = array('userId'=>$userId, 'dosenId'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,   'a1'=>$a1, 'a2'=>$a2, 'a3'=>$a3, 'b1'=>$b1, 'b2'=>$b2, 'b3'=>$b3, 'c1'=>$c1, 'c2'=>$c2, 'c3'=>$c3, 'd1'=>$d1, 'd2'=>$d2, 'd3'=>$d3, 'd4'=>$d4, 'e1'=>$e1, 'e2'=>$e2, 'e3'=>$e3, 'f1'=>$f1, 'f2'=>$f2, 'g1'=>$g1, 'g2'=>$g2, 'i1'=>$i1, 'i2'=>$i2, 'i3'=>$i3, 'i4'=>$i4, 'i5'=>$i5, 'i6'=>$i6, 'i7'=>$i7 );
                 
                 $userInfo2 = array('userId'=>$userId, 'penguji1Id'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,  'a1'=>$a1 * 3, 'a2'=>$a2 * 3, 'a3'=>$a3 * 4, 'b1'=>$b1 * 5, 'b2'=>$b2 * 5, 'b3'=>$b3 * 5, 'c1'=>$c1 * 5, 'c2'=>$c2 * 5, 'c3'=>$c3 * 5, 'd1'=>$d1 * 3, 'd2'=>$d2 * 4, 'd3'=>$d3 * 4, 'd4'=>$d4 *4, 'e1'=>$e1 * 5, 'e2'=>$e2 * 5, 'e3'=>$e3 * 5, 'f1'=>$f1 * 5, 'f2'=>$f2 * 5, 'g1'=> $g1 * 10, 'g2'=>$g2 * 10, 'i1'=>$i1 * 20, 'i2'=>$i2 * 10, 'i3'=>$i3 * 10, 'i4'=>$i4 * 10, 'i5'=>$i5 * 20, 'i6'=>$i6 * 20, 'i7'=>$i7 * 10, 'totalPenguji11'=>(($a1 * 3) + ($a2 * 3) + ($a3 * 4) + ($b1 * 5) + ($b2 * 5) + ($b3 * 5) + ($c1 * 5) + ($c2 * 5) + ($c3 * 5) + ($d1 * 3) + ($d2 * 4) + ($d3 * 4) + ($d4 *4) + ($e1 * 5) + ($e2 * 5) + ($e3 * 5) + ($f1 * 5) + ($f2 * 5) + ($g1 * 10) + ($g2 * 10)), 'totalPenguji12'=> (($i1 * 20) + ($i2 * 10) + ($i3 * 10) + ($i4 * 10) + ($i5 * 20) + ($i6 * 20) + ($i7 * 10)) );
                 
                
                $result = $this->dosen_model->addNewUser($userInfo);
                $result = $this->dosen_model->addNewUser3($userInfo2);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("dosen/userListing/$userId");
            }
        }
    }
    
    function penilaian3()
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
                $this->penilaian($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $dosenId = $this->input->post('dosen2');
                $status = $this->input->post('status5');
                $nim = $this->input->post('nim');
                $judul = $this->input->post('judul');
                $a1 = $this->input->post('a1');
                $a2 = $this->input->post('a2');
                $a3 = $this->input->post('a3');
                $b1 = $this->input->post('b1');
                $b2 = $this->input->post('b2');
                $b3 = $this->input->post('b3');
                $c1 = $this->input->post('c1');
                $c2 = $this->input->post('c2');
                $c3 = $this->input->post('c3');
                $d1 = $this->input->post('d1');
                $d2 = $this->input->post('d2');
                $d3 = $this->input->post('d3');
                $d4 = $this->input->post('d4');
                $e1 = $this->input->post('e1');
                $e2 = $this->input->post('e2');
                $e3 = $this->input->post('e3');
                $f1 = $this->input->post('f1');
                $f2 = $this->input->post('f2');
                $g1 = $this->input->post('g1');
                $g2 = $this->input->post('g2');
                $userInfo = array();
                
                 $userInfo = array('userId'=>$userId, 'dosenId'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,   'a1'=>$a1, 'a2'=>$a2, 'a3'=>$a3, 'b1'=>$b1, 'b2'=>$b2, 'b3'=>$b3, 'c1'=>$c1, 'c2'=>$c2, 'c3'=>$c3, 'd1'=>$d1, 'd2'=>$d2, 'd3'=>$d3, 'd4'=>$d4, 'e1'=>$e1, 'e2'=>$e2, 'e3'=>$e3, 'f1'=>$f1, 'f2'=>$f2, 'g1'=>$g1, 'g2'=>$g2 );
                 
                 $userInfo2 = array('userId'=>$userId, 'penguji2Id'=>$this->vendorId, 'name'=>$name, 'nim'=>$nim, 'judul'=>$judul,  'a1'=>$a1 * 3, 'a2'=>$a2 * 3, 'a3'=>$a3 * 4, 'b1'=>$b1 * 5, 'b2'=>$b2 * 5, 'b3'=>$b3 * 5, 'c1'=>$c1 * 5, 'c2'=>$c2 * 5, 'c3'=>$c3 * 5, 'd1'=>$d1 * 3, 'd2'=>$d2 * 4, 'd3'=>$d3 * 4, 'd4'=>$d4 *4, 'e1'=>$e1 * 5, 'e2'=>$e2 * 5, 'e3'=>$e3 * 5, 'f1'=>$f1 * 5, 'f2'=>$f2 * 5, 'g1'=> $g1 * 10, 'g2'=>$g2 * 10, 'totalPenguji21'=>(($a1 * 3) + ($a2 * 3) + ($a3 * 4) + ($b1 * 5) + ($b2 * 5) + ($b3 * 5) + ($c1 * 5) + ($c2 * 5) + ($c3 * 5) + ($d1 * 3) + ($d2 * 4) + ($d3 * 4) + ($d4 *4) + ($e1 * 5) + ($e2 * 5) + ($e3 * 5) + ($f1 * 5) + ($f2 * 5) + ($g1 * 10) + ($g2 * 10)), 'totalPenguji22'=> 0) ;
                 
                
                $result = $this->dosen_model->addNewUser($userInfo);
                $result = $this->dosen_model->addNewUser4($userInfo2);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("dosen/userListing/$userId");
            }
        }
    }
    function lihatNilai($userId=''){
         $this->load->model('dosen_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->dosen_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "dosen/lihatNilai/", $count, 500 );
            
            $data['userRecords'] = $this->dosen_model->listHistoriNilai($userId);
            
            $this->global['pageTitle'] = 'SILATTA : User Listing';
            
            $this->loadViews("listMahasiswa", $this->global, $data, NULL);
    }
        
        function viewNilai($userId = NULL)
    {
        if($this->isLoggedIn())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('dosen/lihatNilai');
            }
            
            $data['userInfo'] = $this->dosen_model->getNilai($userId);
            
            $this->global['pageTitle'] = 'SILATTA : Penilaian';
            
            $this->loadViews("listMahasiswaEdit", $this->global, $data, NULL);
        }
    }

    
}

?>