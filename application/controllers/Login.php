<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Model_user');
        }
    
        public function index()
        {
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view');
                
            } else {
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));

            $where = array('username' => $username, 'password' => $password);
    
            $cek = $this->Model_user->checkLogin($where);
              if ($cek > 0) {

                $data_session = array(
                    'status' => 'logged in'
                );
                
                $this->session->set_userdata( $data_session );
                
                    redirect('Home/welcome');
             
                 } else {

                    $this->session->set_flashdata('pesan', 'Username atau password salah');
                
                    redirect('Home/index');
                    
                }   
            }
            
            
        }
        public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home/index');

    }
    
    }
    
    /* End of file Login.php */
    
?>