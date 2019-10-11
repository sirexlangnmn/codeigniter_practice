<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topic02 extends CI_Controller
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
        $this->load->view('topic02/topic02');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function save()
    {
        $inputTableData = $this->input->post('table_data');
        $status = $this->topic02->save($inputTableData);

        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status));
    }

   
}
