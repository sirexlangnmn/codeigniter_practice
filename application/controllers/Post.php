<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
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
        $this->load->view('post/categories');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function categories()
    {
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

        $this->load->view('include/header', $data);
        $this->load->view('include/topnav');
        $this->load->view('include/sidenav');
        $this->load->view('post/categories');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

    public function subCategory()
    {
        $data = [
            "seo_description" => "PHP Codeigniter Practice",
            "seo_author" => "Federex Potolin",
            "seo_title" => "PHP Codeigniter Practice",
        ];

        $this->load->view('include/header', $data);
        $this->load->view('include/topnav');
        $this->load->view('include/sidenav');
        $this->load->view('post/subCategory');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }

  
   
}
