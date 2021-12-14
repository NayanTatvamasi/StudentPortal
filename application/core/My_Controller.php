<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_m');
        $this->load->model('result_m');
        $this->load->model('chart_m');
        // $this->load->view('header.php');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        
    }
}
