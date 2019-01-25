<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Model_user extends CI_Model {
    
        public function insertUser()
        {
            //insert data
            $data =  array (
                'username' => $this->input->post('username'),
                'fname' => $this->input->post('fname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'contact' => $this->input->post('contact'),
                'nis' => $this->input->post('nis'),
                'password' => sha1($this->input->post('password')),
            );

            //insert data to database
            $this->db->insert('users', $data);
            
        }

        public function checkLogin($where)
        {
            $query = $this->db->get_where('users', $where)->num_rows();
            return $query;
        }
    
    }
    
    /* End of file Model_user.php */
?>