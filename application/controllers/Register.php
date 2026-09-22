<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Register extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');

    }
    public function index()
    {
       $this->load->view('register', $this->global, NULL);
  }
  
  public function daftar()
  {
  	 $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');
            
            
            if($this->register_model->isDuplicate_nim($this->input->post('userId')))
        {
            $this->session->set_flashdata('error', 'NIM Sudah Terdaftar');
            redirect(site_url().'register');
        }else{
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $mobile = $this->input->post('mobile');
                 $userId = $this->input->post('userId');
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'name'=> $name,'mobile'=>$mobile, 'userId'=>$userId, 'nim'=>$userId);
                $userInfo2 = array('email'=>$email, 'name'=> $name,'mobile'=>$mobile, 'userId'=>$userId, 'nim'=>$userId);
                
                $this->load->model('register_model');
                $result = $this->register_model->addNewUser($userInfo);
                $result = $this->register_model->addNewUser2($userInfo2);
                $result = $this->register_model->addNewUser3($userInfo2);
                $result = $this->register_model->addNewUser4($userInfo2);
                $result = $this->register_model->addNewUser5($userInfo2);
                
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('login');
            }
        }
    }
 