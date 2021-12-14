<?php include("header.php"); ?>

<div class="bg-light">
    <div class="container">

        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white">My Profile</h3>
            </div>
            <div class="modal-body">


                <div class="bs-docs-section">

                    <div class="row">

                        <div class="col-lg-6" style="margin-left:25px;">
                            <div class="form-group">
                                <label for="teacherid" class="form-label mt-2">Teacher ID</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Teacher ID', 'name' => 'teacher_id', 'value' => set_value('teacher_id', $subjectData[0]['teacher_id'])]);  ?>
                            </div>




                            <div class="form-group">
                                <label for="First name" class="form-label mt-2">First Name</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname', $subjectData[0]['firstname'])]);  ?>
                            </div>



                            <div class="form-group">
                                <label for="last name" class="form-label mt-2">Last Name</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname', $subjectData[0]['lastname'])]);  ?>
                            </div>



                            <div class="form-group">
                                <label for="email" class="form-label mt-2">Email</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email', $subjectData[0]['email'])]);  ?>
                            </div>


                        </div>



                        <div class="col-lg-5" style="margin-left:3%;">
                            <!--change-->


                            <div class="form-group">
                                <label for="contact" class="form-label mt-2">Contact Number</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no',$subjectData[0]['contact_no'])]);  ?>
                            </div>



                            <div class="form-group">
                                <label for="dob" class="form-label mt-2">Date of Birth</label>
                                <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob', $subjectData[0]['dob'])]);  ?>
                            </div>


                            <div class="form-group">
                                <label for="subject" class="form-label mt-2">Subject Teacher</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Subject', 'name' => 'subject', 'value' => set_value('subject', $subjectData[0]['subject'])]);  ?>
                            </div>

                            <div class="form-group">
                                <label for="classroomid" class="form-label mt-2">Class Room</label>
                                <?php echo form_input(['class' => 'form-control', 'disabled' => "", 'placeholder' => 'Enter Class Room', 'name' => 'classroomid', 'value' => set_value('classroomid', $subjectData[0]['classroomid'])]); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <!-- <?//php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Update']);  ?> -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- <? //php echo '<pre>'; print_r($data); echo '</pre>'; 
        ?> -->
<?php include('footer.php'); ?>