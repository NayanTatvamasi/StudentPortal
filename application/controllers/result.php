<?php
class result extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('userid'))                     //session
      return redirect('login');
  }

  public function index()
  {
    $x = $this->session->userdata('userid');
    $mdata['data'] = $this->result_m->formData($x);
    $mdata['edate'] = $this->result_m->eventData($x);
    // echo "<pre>";
    // print_r($mdata);
    // exit;
    $this->load->view('sResults', $mdata);
  }

  public function addGrade()
  {
    $post = $this->input->post();
    $msg['success'] = false;
    $result = $this->result_m->addMarks($post);
    $msg['type'] = 'add';
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function eGrade()
  {
    $result = $this->result_m->editGrade();
    echo json_encode($result);
  }

  public function upGrade()
  {
    $msg['success'] = false;
    $result = $this->result_m->updateGrade();
    $msg['type'] = 'update';
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function dGrade()
  {
    $result = $this->result_m->deleteGrade();
    $msg['success'] = false;
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function showAllGrades()
  {
    $y = $this->session->userdata('category');
    // $x = $this->session->userdata('userid');
    $z = $this->session->userdata('classroom');
    $s = $this->session->userdata('subject');
    $id= $this->input->post('sid');

     if ($y == '2') {
      $list = $this->result_m->tmarksList($z, $s,$id);
    } else {
      $list = $this->result_m->smarksList($id);
    }
    echo json_encode($list);
  }

  public function assignment()
  {
    // $x = $this->session->userdata('userid');
    // echo "<pre>";
    // print_r($mdata);
    // exit;
    $error['error'] = '';
    $this->load->view('assignment', $error);
  }

  public function assignmentList()
  {
    $y = $this->session->userdata('category');
    $x = $this->session->userdata('userid');
    $z = $this->session->userdata('classroom');
    // $s = $this->session->userdata('subject');

    if ($y == '2') {
      $list = $this->result_m->assignment_List($x);
    } else {
      $list = $this->result_m->assignment_sList($z);
    }
    echo json_encode($list);
  }

  // public function upload_files()
  //   {
  //       $config = [
  //           'upload_path' => './assignmentFile/',
  //           'allowed_types' => 'gif|jpg|png',
  //       ];
  //       $this->load->library('upload', $config);

  //       if ($this->upload->do_upload()) {

  //           $post = $this->input->post();
  //           $data = $this->upload->data();
  //           // echo '<pre>';
  //           // print_r($data);
  //           // exit;

  //           $image_path = base_url("assignmentFile/" . $data['raw_name'] . $data['file_ext']);
  //           $post['as_path'] = $image_path;
  //           $this->result_m->addAssignment($post);
  //           // echo '<pre>';
  //           // print_r($post['image_path']);
  //           // exit;
  //           return redirect('result/assignment');
  //       } else {

  //           $upload_error = $this->upload->display_errors();
  //           $this->load->view('assignment', compact('upload_error'));
  //           // print_r($upload_error);
  //           // exit;
  //       }
  //   }

  public function assignmentCreate()
  {

    if (isset($_FILES['userfile'])) {
      echo '<pre>';
      print_r($_FILES);
      exit;
    }
    $config = [
      'upload_path' => './assignmentFile/',
      'allowed_types' => 'gif|jpg|png|jpeg',
    ];
    $this->load->library('upload', $config);

    $post = $this->input->post();
    $data = $this->upload->data();

    // echo '<pre>';
    // print_r($data);
    // exit;

    $image_path = base_url("assignmentFile/" . $data['raw_name'] . $data['file_ext']);
    $post['as_path'] = $image_path;

    $msg['success'] = false;
    $result = $this->result_m->addAssignment($post);
    $msg['type'] = 'add';
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function eAssignment()
  {
    $id=$this->input->get('aid');
    $result = $this->result_m->editAssignment($id);
    echo json_encode($result);
  }

  public function checkImp()
  {
    $id = $this->input->post('aid');

    $result = $this->result_m->checkImportant($id);
    echo json_encode($result);
  }

  public function setCheckImp()
  {
    $id = $this->input->post();
    $msg['success'] = false;
    $result = $this->result_m->setCheckImportant($id);
    $msg['type'] = 'update';
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function upAsssignment()
  {
    $config = [
      'upload_path' => './assignmentFile/',
      'allowed_types' => 'gif|jpg|png|jpeg',
    ];
    $this->load->library('upload', $config);

    $post = $this->input->post();
    $data = $this->upload->data();
    $image_path = base_url("assignmentFile/" . $data['raw_name'] . $data['file_ext']);
    $post['as_path'] = $image_path;


    $msg['success'] = false;
    $result = $this->result_m->updateAsssignment($post);
    $msg['type'] = 'update';
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }

  public function dAssignment()
  {
    $result = $this->result_m->deleteAssignment();
    $msg['success'] = false;
    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($msg);
  }
}
