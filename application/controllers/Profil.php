<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Profil extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index($userId = NULL)
    {
         
          $data['roles'] = $this->profil_model->getUserRoles();
           $data['dosens'] = $this->profil_model->getDosen();
           $data['dosens2'] = $this->profil_model->getDosen2();
          $data['userInfo'] = $this->profil_model->getUserInfo($userId);
          $data['user'] = $this->db->get_where('tbl_mahasiswa', ['userId' => $this->session->userdata('userId')])->row_array();
          $this->global['pageTitle'] = 'SILATTA : My Profil';
            
            $this->loadViews("profil", $this->global, $data, NULL);
        
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
                $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '300';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                     $old_image = $data['tbl_users']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->session->set_flashdata('error', 'User updation failed');
                }
            }
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $nim = $this->input->post('nim');
                $jenisKelamin = $this->input->post('jenisKelamin');
                $alamat = $this->input->post('alamat');
                $tanggalLahir = $this->input->post('tanggalLahir');
                $agama = $this->input->post('agama');
                $alamatOrtu = $this->input->post('alamatOrtu');
                $namaIbu = $this->input->post('namaIbu');
                $namaBapak = $this->input->post('namaBapak');
                $mobileOrtu = $this->input->post('mobileOrtu');

                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('jenisKelamin'=>$jenisKelamin, 'alamat'=>$alamat, 'tanggalLahir'=>$tanggalLahir, 'agama'=>$agama, 'alamatOrtu'=>$alamatOrtu, 'namaIbu'=>$namaIbu, 'namaBapak'=>$namaBapak, 'mobileOrtu'=>$mobileOrtu, 
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('jenisKelamin'=>$jenisKelamin, 'alamat'=>$alamat, 'tanggalLahir'=>$tanggalLahir, 'agama'=>$agama, 'alamatOrtu'=>$alamatOrtu,  'namaIbu'=>$namaIbu, 'namaBapak'=>$namaBapak, 'mobileOrtu'=>$mobileOrtu, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                $userInfo2 = array('email' => $email, 'nim'=>$nim, 'name'=>$name);
                $userInfo3 = array('image' => $upload_image);
                $result = $this->profil_model->editUser($userInfo, $userId);
                $result = $this->profil_model->editUser2($userInfo2, $userId);
                $result = $this->profil_model->editUser3($userInfo2, $userId);
                $result = $this->profil_model->editUser4($userInfo2, $userId);
                $result = $this->profil_model->editUser5($userInfo2, $userId);
                $result = $this->profil_model->editUser6($userInfo2, $userId);
                $result = $this->profil_model->editUser7($userInfo3, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect("profil/index/$userId");
            }
        }
    }


}

?>