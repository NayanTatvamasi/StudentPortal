<?php include('header.php'); ?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h3 class="modal-title text-white">Teacher SignUp</h3>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('admin/teacherSignup'); ?>

            <div class="bs-docs-section">

                <div class="row">

                    <div class="col-lg-6" style="margin-left:25px;">
                        <div class="form-group">
                            <label for="teacherid" class="form-label mt-2">Teacher ID</label>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Teacher ID', 'name' => 'teacher_id', 'value' => set_value('teacher_id')]);  ?>
                        </div>
                        <div>
                            <?php echo form_error('teacher_id'); ?>
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

                    </div>



                    <div class="col-lg-5" style="margin-left:3%;">
                        <!--change-->


                        <div class="form-group">
                            <label for="contact" class="form-label mt-2">Contact Number</label>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
                        </div>
                        <div>
                            <?php echo form_error('contact_no'); ?>
                        </div>


                        <div class="form-group">
                            <label for="dob" class="form-label mt-2">Date of Birth</label>
                            <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
                        </div>
                        <div>
                            <?php echo form_error('dob'); ?>
                        </div>

                        <div class="form-group">
                            <label for="subjectid" class="form-label mt-2">Subject Teacher</label>
                            <?php $sub = array(
                                '' => 'Select Subject',
                                '1' => 'History',
                                '2' => 'Mathematics',
                                '3' => 'Science'
                            ); ?>
                            <?php echo form_dropdown('subjectid', $sub, '', 'class="form-select"');  ?>
                        </div>
                        <div>
                            <?php echo form_error('subjectid'); ?>
                        </div>

                        <div class="form-group">
                            <label for="classroom" class="form-label mt-2">Class Room</label>
                            <?php $class = array(
                                '' => 'Select Class',
                                'A' => 'A',
                                'B' => 'B',
                                'C' => 'C'
                            ); ?>
                            <?php echo form_dropdown('classroomid', $class, '', 'class="form-select"');  ?>
                        </div>
                        <div>
                            <?php echo form_error('classroomid'); ?>
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