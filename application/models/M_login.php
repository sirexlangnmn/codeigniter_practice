<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    function loginProcess() {
        $email_address = $this->input->post('email_address');
        $password = $email_address.$this->input->post('password');

        $user = $this->db->where('email_address', $email_address)->get('users');

        if ($user->num_rows() > 0) {
            $user = $user->row_array();
            if (password_verify($password, $user['password'])) {
                //$company = $this->db->where('user_code', $user['user_code'])->get('user_company')->row_array();
                $session_data = [
                    'user_code' => $this->global->ecdc('encrypt', $user['user_code']),
                    'email_address' => $user['email_address'],
                    //'company_code' => $company['company_code'],
                ];

                $this->updateLastLogin($email_address);
                $this->session->set_userdata($session_data);

                return true;
            } else {
                return false;
            }
            
        } else {
            return false;
        }
        
    }

    function updateLastLogin($email_address) {
        $this->db->where('email_address', $email_address)
            ->set('last_login', date('Y-m-d H:i:s'))
            ->update('users');
    }

}

/* End of file M_login.php */
