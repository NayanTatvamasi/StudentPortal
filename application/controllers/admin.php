<?php

class admin extends MY_controller
{
    public function __construct()                                    //session
    {
        parent::__construct();
        if (!$this->session->userdata('userid'))                     //session
            return redirect('login');
    }

    public function logout()                                         //session
    {
        $this->session->unset_userdata('userid', 'category', 'classroom','subject');         //session
        redirect('login');
    }

    public function profile()
    {
        $y = $this->session->userdata('category');
        $x = $this->session->userdata('userid');

        if ($y == '1') {
            $details = $this->student_m->pdetails($x);
            // $this->load->view('studentProfile', $details);
        } else {
            $details = $this->student_m->subjects($x);
            // $this->load->view('teacherProfile', $sData);
        }
        echo json_encode($details);
    }

    public function welcome()
    {
        $this->load->view('dashboard');
    }

    public function index()
    {
        $this->load->view('dashboard');
    }

    public function events()
    {
        $this->load->view('events');
    }

    public function eventList()
    {
        $eList = $this->student_m->eventDetails();
        echo json_encode($eList);
    }
    public function myeventList()
    {
        $x = $this->session->userdata('userid');
        $y = $this->session->userdata('category');
        if (!($y == '1')) {
            $eList = $this->student_m->myeventDetails($x);
            echo json_encode($eList);
        } else {
            echo json_encode("");
        }
    }

    public function eventCreate()
    {
        $x = $this->session->userdata('userid');
        // $post = $this->input->post();
        $post = $this->security->xss_clean($this->input->post());
        $msg['success'] = false;
        $result = $this->student_m->addEvent($post, $x);
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }

        echo json_encode($msg);
    }

    public function eEvent()
    {
        $result = $this->student_m->editEvent();
        echo json_encode($result);
    }

    public function upEvent()
    {
        $msg['success'] = false;
        $result = $this->student_m->updateEvent();
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function dEvent()
    {
        $result = $this->student_m->deleteEvent();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // public function eRegister()
    // {
    //     $this->load->view('eventRegistration');
    // }

    // public function sRegister()
    // {
    //     $this->load->view('studentRegistration');
    // }

    // public function tRegister()
    // {
    //     $this->load->view('teacherRegistration');
    // }



    public function signup()
    {
        // $config = [
        //     'upload_path' => './upload/',
        //     'allowed_types' => 'gif|jpg|png|jpeg',
        // ];
        // $this->load->library('upload');
        // $this->upload->do_upload();

        // $image_path = base_url("upload/");
        // $post['image_path'] = $image_path;
        // echo '<pre>';
        // print_r($post['image_path']);
        //  print_r($post);
        //  exit;
        $post = $this->input->post();
        $msg['success'] = false;
        $result = $this->student_m->addStudent($post);
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }

        echo json_encode($msg);
    }

    public function eStudent()
    {
        $result = $this->student_m->editStudent();
        echo json_encode($result);
    }

    public function upStudent()
    {
        $msg['success'] = false;
        $result = $this->student_m->updateStudent();
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function dStudent()
    {
        $result = $this->student_m->deleteStudent();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    public function teacherSignup()
    {

        $post = $this->input->post();
        $msg['success'] = false;
        $result = $this->student_m->addTeacher($post);
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }

        echo json_encode($msg);
    }

    public function eTeacher()
    {
        $result = $this->student_m->editTeacher();
        echo json_encode($result);
    }

    public function upTeacher()
    {
        $msg['success'] = false;
        $result = $this->student_m->updateTeacher();
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function dTeacher()
    {
        $result = $this->student_m->deleteTeacher();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function allStudent()
    {
        $this->load->view('studentList');
    }
    public function showAllStudent()
    {
        $session = $this->session->userdata();
        // echo "<pre>";
        // print_r($sesion['classroom']);
        // exit;
        $sList = $this->student_m->allStudent($session);
        echo json_encode($sList);
    }


    public function allTeacher()
    {
        $this->load->view('teacherList');
    }

    public function showAllTeacher()
    {
        $tList = $this->student_m->allTeacher();
        echo json_encode($tList);
    }
}
