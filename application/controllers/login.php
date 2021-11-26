<?php
class login extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('userid'))                                    //session
      return redirect('admin/welcome');
  }

  public function index()
  {
    if ($this->form_validation->run('login_rules')) {

      $category = $this->input->post('category');
      $userid = $this->input->post('userid');
      $pass = $this->input->post('pass');

      $user_id = $this->student_m->isvalidate($category, $userid, $pass);

      if ($user_id) {

        if ($user_id == '1596' && $category == '2') {
          $category = '3';
        }
        $room = $this->student_m->classRoom($user_id, $category);
        if (!($category == '1')) {
          $subject = $this->student_m->subjects($user_id);
          $sub=$subject->subject;
        }else{
          $sub='NUll';
        }

        $sessionData = array(                                                              //session
          'userid'  => $user_id,
          'category' => $category,
          'classroom' => $room,
          'subject' => $sub
        );
        $this->session->set_userdata($sessionData);                              //set userdata //session
        // print_r($sessionData);
        // exit;                             
        $this->load->view('dashboard');
      } else {
        $this->session->set_flashdata('Login_failed', 'Invalid Username/Password');
        return redirect('login');
      }
    } else {
      $this->load->view('loginPage');
    }
  }
}
