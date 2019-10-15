<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

        $this->load->view('include/header', $data);
        $this->load->view('auth/login');
        $this->load->view('include/script');
    }

    public function loginUser(){
        $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        
        if($this->form_validation->run() == FALSE) {
            $data = [
                'email_address' => form_error('email_address'),
                'password' => form_error('password'),
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }else{
            $result = $this->login->loginProcess();

            if ($result == true) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => 'Login Successful', 'type' => 'success')));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => "You have entered an invalid credentials", 'type' => 'error')));
            }
        }
    }

    public function logout()
    { 
        $user_code = $this->session->userdata('user_code');
        $user_code = $this->global->ecdc('decrypt', $user_code);

        $this->global->addLoginHistory($user_code, 'logout');
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }
   
}
