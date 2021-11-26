<?php include('header.php'); ?>
<!-- <style>
    #ihover:hover {
        position: relative;
        transform: scale(3);
    }
</style> -->

<div class="container">
    <div id="addStudentModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white">Student SignUp</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="studentid" value="0">
                        <div class="bs-docs-section">
                            <div class="row">

                                <div class="col-lg-6" style="margin-left:25px;">

                                    <div class="form-group">
                                        <label for="Enrollment" id="lenroll" class="form-label mt-2">Enrollment Number</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Enrollment Number', 'name' => 'studentid', 'value' => set_value('studentid')]);  ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="pwd" class="form-label mt-2">Password</label>
                                        <?php echo form_password(['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Enter Password', 'name' => 'password', 'value' => set_value('password')]); ?>
                                    </div>



                                    <div class="form-group">
                                        <label for="First name" class="form-label mt-2">First Name</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter First Name', 'name' => 'firstname', 'value' => set_value('firstname')]);  ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="last name" class="form-label mt-2">Last Name</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'name' => 'lastname', 'value' => set_value('lastname')]);  ?>
                                    </div>



                                    <div class="form-group">
                                        <label for="email" class="form-label mt-2">Email</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Email', 'name' => 'email', 'value' => set_value('email')]);  ?>
                                    </div>



                                    <div class="form-group">
                                        <label for="contact" class="form-label mt-2">Contact Number</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
                                    </div>


                                </div>
                                <!--change-->
                                <div class="col-lg-5" style="margin-left:3%;">

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



                                    <div class="form-group">
                                        <label for="dob" class="form-label mt-2">Date of Birth</label>
                                        <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
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

                                    <div class="form-group">
                                        <label for="batch" class="form-label mt-2">Class Room</label>
                                        <?php if ($x == "1596") {
                                            $class = ['' => 'Select ClassRoom', 'A' => 'A', 'B' => 'B', 'C' => 'C'];
                                        } else {
                                            $class = array(
                                                '' => 'Select ClassRoom',
                                                $z => $z
                                            );
                                        } ?>
                                        <div>
                                            <?php echo form_dropdown('classroomid', $class, '', 'class="form-select"'); ?>
                                        </div>
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


                                    <!-- <div class="form-group">
                                        <label for="image" class="form-label mt-2">Profile Picture</label>
                                        <input id="uploadImage" name="userfile" type="file" accept="image/*" />
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php echo form_submit(['type' => 'submit', 'id' => 'btnSave', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div>
        <h3>Student List</h3>
    </div>
    <div style="display:flex;">
        <div>
            <a href="#" id="addStudent" class="btn btn-success">Add Student</a>
        </div>
    </div>

    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;">
        <thead>
            <tr>
                <th>Number</th>
                <th>Student ID</th>
                <th>Register Date</th>
                <th>First Name</th>
                <th>Class Room</th>
                <th>Standard</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody id="innerstudentList">

        </tbody>
    </table>



</div>
<script>

    $(function() {
        function showAllStudent() {
            // alert('click');
            $count = 0;
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/showAllStudent',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {

                        html += '<tr>' +
                            '<td>' + ++$count + '</td>' +
                            '<td>' + data[i].studentid + '</td>' +
                            // '<td>' + '<img src ="' + data[i].Image_path + '" alt="Null" id="ihover" class="img-thumbnail" width="100" height="100"/>' + ' </td>' +
                            '<td>' + data[i].register_date + '</td>' +
                            '<td>' + data[i].firstname + '</td>' +
                            '<td>' + data[i].classroomid + '</td>' +
                            '<td>' + data[i].standard + '</td>' +
                            '<td>' + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].studentid + '">Edit</a>' + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].studentid + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }

                    $('#innerstudentList').html(html);
                },
                error: function() {
                    $('#innerstudentList').html('No data Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }

        showAllStudent();
        setInterval(function(){
            showAllStudent();
        },1000);

        // Add Student
        $('#addStudent').on('click', function() {

            $('#addStudentModel').modal('show');
            $('#addStudentModel').find('.modal-title').text('Student SignUp');
            $('#studentForm').attr('action', '<?php echo base_url() ?>admin/signup');
            $('label[for="Enrollment"]').show();
            $('input[name=studentid]').show();
            $('#studentForm')[0].reset();
        });

        //save 
        $('#btnSave').click(function() {


            var url = $('#studentForm').attr('action');
            var data = $('#studentForm').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#addStudentModel').modal('hide');
                        $('#studentForm')[0].reset();
                        if (response.type == 'add') {
                            var type = 'added'
                        } else if (response.type == 'update') {
                            var type = "updated"
                        }
                        // $('.alert-success').html('Student ' + type + ' successfully').fadeIn().delay(2000).fadeOut('slow');
                        $('.toast-success').html('Student ' + type + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');

                        showAllStudent();
                    } else {
                        // $('#addStudentModel').modal('show');
                        // alert('Enter Proper Data');
                        $('.toast-error').html('Enter Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');

                    }
                },
                error: function() {
                    // alert('Could not add data');
                    // $('#addStudentModel').modal('show');
                    $('.toast-error').html('Enter Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });

        });



        //edit
        $('#innerstudentList').on('click', '.item-edit', function() {

            var id = $(this).attr('data');
            $('#addStudentModel').modal('show');
            $('#addStudentModel').find('.modal-title').text('Edit Student (' + id + ')');
            $('#studentForm').attr('action', '<?php echo base_url() ?>admin/upStudent');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>admin/eStudent',
                data: {
                    sid: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#studentForm')[0].reset();
                    $('label[for="Enrollment"]').hide();
                    $('input[name=studentid]').val(data.studentid).hide();
                    $('input[name=password]').val(data.password);
                    $('input[name=firstname]').val(data.firstname);
                    $('input[name=lastname]').val(data.lastname);
                    $('input[name=email]').val(data.email);
                    $('input[name=contact_no]').val(data.contact_no);
                    if (data.gender == 'male') {
                        $('input[type=radio]').filter('[value=male]').attr('checked', true);
                    } else {
                        $('input[type="radio"]').filter('[value=female]').attr('checked', true);
                    }
                    $('input[name=dob]').val(data.dob);
                    $('select[name=classroomid]').val(data.classroomid);
                    $('select[name=standard]').val(data.standard);
                    $('select[name=batch]').val(data.batch);
                },
                error: function() {
                    // alert('Could not Edit Data');
                    $('.toast-error').html('Can not Fetch').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        //delete
        $('#innerstudentList').on('click', '.item-delete', function() {
            var id = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>admin/dStudent',
                    data: {
                        sid: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            // $('.alert-danger').html('Student Deleted successfully').fadeIn().delay(2000).fadeOut('slow');
                            $('.toast-success').html('Student Deleted successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                            showAllStudent();
                        } else {
                            // alert('Error');
                            $('.toast-error').html('Student cann\'t be Deleted ').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function() {
                        alert('Error deleting');
                    }
                });
            });
        });
    });
</script>
<?php include("footer.php"); ?>