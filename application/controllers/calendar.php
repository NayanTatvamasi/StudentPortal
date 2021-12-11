<?php

class calendar extends MY_controller
{
    public function __construct()                                    //session
    {
        parent::__construct();
        if (!$this->session->userdata('userid'))                     //session
            return redirect('login');
    }

    public function index(){
        $this->load->view('mainCalendar');
    }

}
