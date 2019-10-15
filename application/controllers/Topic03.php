<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic03 extends CI_Controller
{
    public function index()
    {   
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

        $this->load->view('include/header', $data);
        $this->load->view('include/topnav');
        $this->load->view('include/sidenav');
        $this->load->view('topic03/topic03');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function save()
    {
        $abc = $this->input->post('input_employee_name');
        $xyz = $this->input->post('input_address');

        $result = $this->topic03->save($abc, $xyz);


            if ($result == true) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => 'Submit Successfully', 'type' => 'success')));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('title' => 'Something went wrong', 'text' => 'Please try again later', 'type' => 'error')));
            }

        // $this->form_validation->set_rules('employee_name[]', 'Employee', 'required');
        // $this->form_validation->set_rules('address[]', 'Address', 'required');

        // if($this->form_validation->run()){
        //     $inputData = $this->input->post();
        //     $result = $this->topic03->save($inputData);

        //     if ($result == true) {
        //         $this->output
        //             ->set_content_type('application/json')
        //             ->set_output(json_encode(array('title' => 'Submit Successfully', 'type' => 'success')));
        //     } else {
        //         $this->output
        //             ->set_content_type('application/json')
        //             ->set_output(json_encode(array('title' => 'Something went wrong', 'text' => 'Please try again later', 'type' => 'error')));
        //     }
        // }
        // else{
        //     echo validation_errors();
        // }

        
    }

   
}
