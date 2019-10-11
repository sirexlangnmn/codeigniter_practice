<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->view('dashboard/dashboard');
        //$this->load->view('include/aside');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

  
   
}
