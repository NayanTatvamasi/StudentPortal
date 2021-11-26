<?php include('header.php'); ?>


<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <h3 class="modal-title text-white">Student SignUp</h3>
    </div>
    <div class="modal-body">
      <?php echo form_open_multipart('admin/signup'); ?>

      <div class="bs-docs-section">

        <div class="row">

          <div class="col-lg-6" style="margin-left:25px;">
            <div class="form-group">
              <label for="Enrollment" class="form-label mt-2">Enrollment Number</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Enrollment Number', 'name' => 'studentid', 'value' => set_value('studentid')]);  ?>
            </div>
            <div>
              <?php echo form_error('studentid');  ?>
            </div>

            <div class="form-group">
              <label for="pwd" class="form-label mt-2">Password</label>
              <?php echo form_password(['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Enter Password', 'name' => 'password', 'value' => set_value('password')]); ?>
            </div>
            <div>
              <?php echo form_error('password'); ?>
            </div>


            <div class="form-group">
              <label for="First name" class="form-label mt-2">First Name</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname')]);  ?>
            </div>
            <div>
              <?php echo form_error('firstname'); ?>
            </div>


            <div class="form-group">
              <label for="last name" class="form-label mt-2">Last Name</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname')]);  ?>
            </div>
            <div>
              <?php echo form_error('lastname'); ?>
            </div>


            <div class="form-group">
              <label for="email" class="form-label mt-2">Email</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email')]);  ?>
            </div>
            <div>
              <?php echo form_error('email'); ?>
            </div>



            <div class="form-group">
              <label for="contact" class="form-label mt-2">Contact Number</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
            </div>
            <div>
              <?php echo form_error('contact_no'); ?>
            </div>
          </div>



          <div class="col-lg-5" style="margin-left:3%;">
            <!--change-->

            <div class="form-group">
              <label for="gender" class="form-label mt-2">Gender </label>
            </div>
            <div class="form-group">
              <label for="gender" class="form-label mt-2">
                <?php echo form_radio(['class' => 'form-check-input', 'name' => 'gender', 'value' => 'male']);  ?>
                Male
              </label>
              <label for="gender" class="form-label mt-2">
                <?php echo form_radio(['class' => 'form-check-input', 'name' => 'gender', 'value' => 'female']);  ?>
                Female
              </label>
            </div>
            <div>
              <?php echo form_error('gender'); ?>
            </div>


            <div class="form-group">
              <label for="dob" class="form-label mt-2">Date of Birth</label>
              <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
            </div>
            <div>
              <?php echo form_error('dob'); ?>
            </div>


            <div class="form-group">
              <label for="standard" class="form-label mt-2">Standard</label>
              <?php $options = array(
                '' => 'Select Standard',
                '5' => '5'
              ); ?>
              <div>
                <?php echo form_dropdown('standard', $options, '', 'class="form-select"'); ?>
              </div>
            </div>
            <div>
              <?php echo form_error('standard'); ?>
            </div>

            <div class="form-group">
              <label for="batch" class="form-label mt-2">Class Room</label>
              <?php $class = array(
                '' => 'Select ClassRoom',
                $z=>$z
              ); ?>
              <div>
                <?php echo form_dropdown('classroomid', $class, '', 'class="form-select"'); ?>
              </div>
            </div>
            <div>
              <?php echo form_error('classroomid'); ?>
            </div>


            <div class="form-group">
              <label for="batch" class="form-label mt-2">Batch</label>
              <?php $years = array(
                '' => 'Select Batch',
                '2021' => '2021'
              ); ?>
              <div>
                <?php echo form_dropdown('batch', $years, '', 'class="form-select"'); ?>
              </div>
            </div>
            <div>
              <?php echo form_error('batch'); ?>
            </div>


            <div class="form-group">
              <label for="image" class="form-label mt-2">Profile Picture</label>
              <?php echo form_upload(['name' => 'userfile']); ?>
            </div>
            <div class="text-danger">
              <?php if (isset($upload_error)) {
                echo $upload_error;
              }  ?>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
      <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']);  ?>
    </div>
  </div>
</div>


<?php include("footer.php"); ?>