<?php include("header.php"); ?>

<div class="bg-light">
  <div class="container">

    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h3 class="modal-title text-white">My Profile</h3>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('admin/profile'); ?>

        <div class="bs-docs-section">

          <div class="row">

            <div class="col-lg-6" style="margin-left:25px;">
              <div class="form-group">
                <label for="Enrollment" class="form-label mt-2">Enrollment Number</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Enrollment Number', 'name' => 'studentid', 'value' => set_value('studentid', $data->studentid)]);  ?>
              </div>




              <div class="form-group">
                <label for="First name" class="form-label mt-2">First Name</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname', $data->firstName)]);  ?>
              </div>



              <div class="form-group">
                <label for="last name" class="form-label mt-2">Last Name</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname', $data->lastName)]);  ?>
              </div>



              <div class="form-group">
                <label for="email" class="form-label mt-2">Email</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email', $data->email)]);  ?>
              </div>

              <div class="form-group">
                <label for="contact" class="form-label mt-2">Contact Number</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no', $data->contact_no)]);  ?>
              </div>

            </div>
            <div class="col-lg-5" style="margin-left:3%;">
              <!--change-->


              <div class="form-group">
                <label for="dob" class="form-label mt-2">Date of Birth</label>
                <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob', $data->dob)]);  ?>
              </div>

              <div class="form-group">
                <label for="standard" class="form-label mt-2">Standard</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Standard', 'standard' => 'dob', 'value' => set_value('dob', $data->standard)]);  ?>
              </div>

              <div class="form-group">
                <label for="classroom" class="form-label mt-2">Class Room</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Class Room', 'batch' => 'classroomid', 'value' => set_value('classroomid', $data->classroomid)]);  ?>
              </div>
              
              <div class="form-group">
                <label for="batch" class="form-label mt-2">Batch</label>
                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Batch', 'batch' => 'dob', 'value' => set_value('batch', $data->batch)]);  ?>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- <? //php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Update']);  
              ?> -->
      </div>
    </div>
  </div>
</div>
</div>
<!-- <? //php echo '<pre>'; print_r($data); echo '</pre>'; 
      ?> -->
<?php include('footer.php'); ?>