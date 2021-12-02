<html>

<head>
  <title>Student Portal</title>
  <?= link_tag("Assets/css/bootstrap.min.css") ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="shortcut icon" href="<?= base_url('Assets/image/class.jpg'); ?>" />
</head>
<style>
  #navbarH li:hover {
    box-shadow: 1px 10px 100px #777777;
    border-radius: 10px;
    border: 2px black;
  }


  .progress-bar {
    animation: mybar 3s infinite;
    animation-play-state: running;
  }

  .progress-bar:hover {
    animation-play-state: paused;
  }


  @keyframes mybar {
    from {
      width: 0%;
    }

    to {
      width: 100%;
    }

  }


  .bk-image {
    /* background-image: url('<? //= base_url("Assets/dist/assets/media/bg/bg-3.jpg");
                              ?>'); */
    /* background-color: #a1c4fd ; */
    background-color: #e2ebf0;
  }
</style>
<script>
  var anyChange = '0';
</script>

<body class="bk-image">
  <div style="z-index:9999999999; left: 77%; position: fixed; margin-top:100px; ; margin-bottom:0;" id="toast">
    <div class="toast card text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
      <div class="card-header">
        <strong class="me-auto">Success</strong>
      </div>
      <div class="toast-body toast-success">
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
      </div>
    </div>
    <div class="toast card text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
      <div class="card-header">
        <strong class="me-auto">Error</strong>
      </div>
      <div class="toast-body toast-error">
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
      </div>
    </div>
  </div>
  <?php

  $x = $this->session->userdata('userid');      //session
  $y = $this->session->userdata('category');      //session
  $z = $this->session->userdata('classroom');      //session
  $s = $this->session->userdata('subject');          //session



  if ($x) {
  ?>
    <nav class=" navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url("admin/welcome") ?>">Academy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto" id="navbarH">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("admin/welcome") ?>">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("admin/events") ?>">Events</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="#" id="userProfile">Profile</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Other</a>
              <div class="dropdown-menu">
                <?php if (!($y == '3')) { ?>
                  <a class="dropdown-item" href="<?= base_url("result/assignment") ?>">Assignments</a>
                <?php } ?>
                <a class="dropdown-item" href="<?= base_url("result") ?>">Grades</a>
                <a class="dropdown-item" href="<?= base_url("admin/welcome") ?>">fees</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url("admin/welcome") ?>">Drop Doubts</a>
              </div>
            </li>
            <?php if (!($y == '1')) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">CRUD</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url('admin/allStudent'); ?>" id="studentList">Student List</a>

                  <?php if ($y == '3') : ?>
                    <a class="dropdown-item" href="<?= base_url('admin/allTeacher'); ?>" id="teacherList">Teacher List</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php } ?>
          </ul>
          <form class="d-flex">
            <input class="form-control me-sm-2" type="text" placeholder="Search" id="myInput">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>
          <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger me-sm-2" style="margin-left:0.5%;">Logout</a>
        </div>
      </div>
    </nav>
    <div>
      <marquee>
        <h5> <i class='fas'>&#xf06a; </i> Admission open now.....</h5>
      </marquee>
    </div>




    <div class="container">


      <div id="studentModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h3 class="modal-title text-white">My Profile</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">

              <div class="bs-docs-section">

                <div class="row">
                  <input type="hidden" name="studentid" value="0">

                  <div class="col-lg-6" style="margin-left:25px;">
                    <div class="form-group">
                      <label for="Enrollment" class="form-label mt-2">Enrollment Number</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Enrollment Number', 'name' => 'studentid', 'value' => set_value('studentid')]);  ?>
                    </div>


                    <div class="form-group">
                      <label for="First name" class="form-label mt-2">First Name</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname')]);  ?>
                    </div>


                    <div class="form-group">
                      <label for="last name" class="form-label mt-2">Last Name</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname')]);  ?>
                    </div>


                    <div class="form-group">
                      <label for="email" class="form-label mt-2">Email</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email')]);  ?>
                    </div>

                    <div class="form-group">
                      <label for="contact" class="form-label mt-2">Contact Number</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
                    </div>

                  </div>
                  <!--change-->
                  <div class="col-lg-5" style="margin-left:3%;">



                    <div class="form-group">
                      <label for="dob" class="form-label mt-2">Date of Birth</label>
                      <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
                    </div>

                    <div class="form-group">
                      <label for="standard" class="form-label mt-2">Standard</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Standard', 'name' => 'standard', 'value' => set_value('standard')]);  ?>
                    </div>

                    <div class="form-group">
                      <label for="classroom" class="form-label mt-2">Class Room</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Class Room', 'name' => 'classroomid', 'value' => set_value('classroomid')]);  ?>
                    </div>

                    <div class="form-group">
                      <label for="batch" class="form-label mt-2">Batch</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Batch', 'name' => 'batch', 'value' => set_value('batch')]);  ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="button" id="btnSave" class="btn btn-primary">Save changes</button> -->
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->


      <div id="teacherModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h3 class="modal-title text-white">My Profile</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
              <div class="bs-docs-section">

                <div class="row">
                  <input type="hidden" name="txtId" value="0">

                  <div class="col-lg-6" style="margin-left:25px;">

                    <div class="form-group">
                      <label for="teacherid" class="form-label mt-2">Teacher ID</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Teacher ID', 'name' => 'teacher_id', 'value' => set_value('teacher_id')]);  ?>
                    </div>




                    <div class="form-group">
                      <label for="First name" class="form-label mt-2">First Name</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname')]);  ?>
                    </div>



                    <div class="form-group">
                      <label for="last name" class="form-label mt-2">Last Name</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname')]);  ?>
                    </div>



                    <div class="form-group">
                      <label for="email" class="form-label mt-2">Email</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email')]);  ?>
                    </div>


                  </div>



                  <div class="col-lg-5" style="margin-left:3%;">
                    <!--change-->


                    <div class="form-group">
                      <label for="contact" class="form-label mt-2">Contact Number</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
                    </div>



                    <div class="form-group">
                      <label for="dob" class="form-label mt-2">Date of Birth</label>
                      <?php echo form_input(['type' => 'date', 'disabled' => "", 'class' => 'form-control', 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
                    </div>


                    <div class="form-group">
                      <label for="subject" class="form-label mt-2">Subject Teacher</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Subject', 'name' => 'subject', 'value' => set_value('subject')]);  ?>
                    </div>

                    <div class="form-group">
                      <label for="classroomid" class="form-label mt-2">Class Room</label>
                      <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Class Room', 'name' => 'classroomid', 'value' => set_value('classroomid')]); ?>
                    </div>

                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="button" id="btnSave" class="btn btn-primary">Save changes</button> -->
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </div>



  <?php
  }
  ?>