<?php

class admin extends MY_controller
{
    public function __construct()                                    //session
    {
        parent::__construct();
        if (!$this->session->userdata('userid'))                     //session
            return redirect('login');
    }

    public function index(){
        $this->laod->view('calender');
    }

}
