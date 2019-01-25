<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            if ($this->session->userdata('status') != "logged in")
        {
            
            redirect('Login');
            
        }
        }
    
        public function index()
        {
            $this->load->view('login_view');
            
        }

        public function Register()
        {
            $this->load->view('register_view');
            
        }

        public function Welcome()
        {
            $this->load->view('beranda');
            
        }
    
    }
    
    /* End of file Home.php */
    

?>