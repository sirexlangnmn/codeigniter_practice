<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

        $this->load->view('include/header', $data);
        $this->load->view('auth/login');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function signup_validation()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|is_unique[users.email_address]', array('is_unique' => 'This %s already exists.'));
		// $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[8]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'first_name' => form_error('first_name'),
                'last_name' => form_error('last_name'),
                'email_address' => form_error('email_address'),
                'password' => form_error('password'),
                'cpassword' => form_error('cpassword'),
            ];

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            $data = [
                'first_name' => null,
                'last_name' => null,
                'email_address' => null,
                'password' => null,
                'cpassword' => null,
            ];

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }

   
}
