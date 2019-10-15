<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{

	public function index()
	{
		$data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

		$this->load->view('include/header', $data);
		$this->load->view('auth/signup');
		///$this->load->view('include/footer');
		$this->load->view('include/script');
	}

	public function signup_process()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|is_unique[users.email_address]', array('is_unique' => 'This %s already exists.'));
		// $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[8]|matches[password]');

		// $first_name = $this->input->post('first_name');
        // $last_name = $this->input->post('last_name');
        // $email_address = $this->input->post('email_address');
		// $password= $email_address.$this->input->post('password');
		
		// $datas = [
		// 	'a' => $first_name,
		// 	'b'=> $last_name,
		// 	'c' => $email_address,
		// 	'd' => $password,
		// ]; 
		
		// echo json_encode($datas); exit;
		
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
				$result = $this->signup->create_user();
	
				if ($result == true) {
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('title' => 'Registered Successfully', 'type' => 'success')));
				} else {
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('title' => 'Something went wrong', 'text' => 'Please try again later', 'type' => 'error')));
				}
			}
		}













}
