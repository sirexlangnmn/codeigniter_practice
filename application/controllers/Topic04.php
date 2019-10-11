<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic04 extends CI_Controller
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
        $this->load->view('topic04/topic04');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function save()
    {
        $abc = $this->input->post('input_employee_name');
        $xyz = $this->input->post('input_address');
        $result = $this->topic04->save($abc, $xyz);
        //$result = $this->topic04->save();

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

   
}
