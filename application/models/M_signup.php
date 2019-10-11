<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_signup extends CI_Model {

    function create_user() {
        
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email_address = $this->input->post('email_address');
        $password= $email_address.$this->input->post('password');
        
        // $datas = [
		// 	'a' => $first_name,
		// 	'b'=> $last_name,
		// 	'c' => $email_address,
		// 	'd' => $password,
		// ]; 
		
        // echo json_encode($datas); exit;
    
        $options = [
            'cost' => 10,
        ];
        $pass = password_hash($password, PASSWORD_BCRYPT, $options);

        $user = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email_address' => $email_address,
            'password' => $pass,
            'email_token' => sha1($email_address),
            'code_token' => rand(99999, 999999),
            'user_code' => $this->global->generateID('USER'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert("users", $user);

            if ($this->db->affected_rows() > 0) {
                $session_data = [
                    'email_address' => $email_address,
                    'user_code' => $this->global->ecdc('encrypt', $user['user_code']),
                ];

                $this->session->set_userdata($session_data);

               return true; 
            } else {
                return false;
            }

    }

}

/* End of file M_signup.php */
