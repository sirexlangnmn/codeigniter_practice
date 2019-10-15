<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic01 extends CI_Controller
{
    public function index()
    {
        
        $employees = $this->topic01->getEmployees();
        
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
            "employees" => $employees,
        ];

        $this->load->view('include/header', $data);
        $this->load->view('include/topnav');
        $this->load->view('include/sidenav');
        $this->load->view('topic01/topic01');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function message()
    {
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('employee_id[]', 'Recepient', 'required');

        if($this->form_validation->run()){
            $data = $this->input->post();
            $result = $this->topic01->saveMessage($data);

            if ($result == true) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => 'Submit Successfully', 'type' => 'success')));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => 'Something went wrong', 'text' => 'Please try again later', 'type' => 'error')));
            }
        }
        else{
            echo validation_errors();
        }
    }
   
}
