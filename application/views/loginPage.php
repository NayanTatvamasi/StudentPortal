<?php include('header.php'); ?>

</div>
<div class="modal-dialog" style="width: 35%;" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h3 class="modal-title text-white">Login Page</h3>
        </div>
        <div class="modal-body">

            <div align="center">
                <?php if ($error = $this->session->flashdata('Login_failed')) :  ?>

                    <div class="alert alert-danger" style="width: 100%;">
                        <?= $error; ?>
                    </div>

                <?php endif; ?>
            </div>

            <div id="myModal">
                <?php echo form_open('login'); ?>
                <!-- <form action="#" method="post" id="loginform"> -->
                <div class="form-group">

                    <label for="Category" class="form-label mt-2">Category</label>
                    <?php $options = array(
                        '' => 'Select Category',
                        '1' => 'Student',
                        '2' => 'Teacher'
                    ); ?>
                    <div>
                        <?php echo form_dropdown('category', $options, '', 'id="ctg" class="form-select"'); ?>
                        <?php echo form_error('category'); ?>
                    </div>


                    <label for="Enrollment" class="form-label mt-2 user-title">User ID</label>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
                    <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter ID', 'name' => 'userid', 'value' => set_value('userid')]); ?>
                    <?php echo form_error('userid');  ?>

                    <label for="pwd" class="form-label mt-2">Password</label>
                    <?php echo form_password(['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Enter Password', 'name' => 'pass']); ?>
                    <?php echo form_error('pass'); ?>
                </div>
                <!-- </form> -->
            </div>
        </div>

        <div class="modal-footer">
            <?php echo form_submit(['type' => 'submit', 'id' => 'loginsubmit', 'class' => 'btn btn-primary', 'value' => 'Submit']);  ?>
            <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']);  ?>
            <!-- <? //php echo anchor('login/register', 'Sign up?', 'class="link-class"') 
                    ?> -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#ctg').change(function() {
            var categoty_id = $('#ctg').val();
            if (categoty_id == '1') {
                $('#myModal').find('.user-title').text('Enrollment Number');
            } else if (categoty_id == '2') {
                $('#myModal').find('.user-title').text('Teacher ID');
            }
            // else if (categoty_id == '3') {
            //     $('#myModal').find('.user-title').text('Admin ID');
            // } 
            else {
                $('#myModal').find('.user-title').text('User ID');
            }
        });
    });
</script>
<?php include('footer.php'); ?>