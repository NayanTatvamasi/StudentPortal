<?php include('header.php'); ?>
<div class="container">

    <div id="addTeacherModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white">Teacher SignUp</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form id="teacherForm" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="teacher_id" value="0">
                        <div class="bs-docs-section">
                            <div class="row">

                                <div class="col-lg-6" style="margin-left:25px;">
                                    <div class="form-group">
                                        <label for="teacherid" class="form-label mt-2">Teacher ID</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Teacher ID', 'name' => 'teacher_id', 'value' => set_value('teacher_id')]);  ?>
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




                                </div>
                                <!--change-->
                                <div class="col-lg-5" style="margin-left:3%;">

                                    <div class="form-group">
                                        <label for="contact" class="form-label mt-2">Contact Number</label>
                                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Phone number', 'name' => 'contact_no', 'value' => set_value('contact_no')]);  ?>
                                    </div>



                                    <div class="form-group">
                                        <label for="dob" class="form-label mt-2">Date of Birth</label>
                                        <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Enter Birth Date', 'name' => 'dob', 'value' => set_value('dob')]);  ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="subjectid" class="form-label mt-2">Subject Teacher</label>
                                        <?php $sub = array(
                                            '1' => 'History',
                                            '2' => 'Mathematics',
                                            '3' => 'Science'
                                        ); ?>
                                        <?php echo form_dropdown('subjectid', $sub, '1', 'class="form-select"');  ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="classroom" class="form-label mt-2">Class Room</label>
                                        <?php $class = array(
                                            '' => 'Select Class',
                                            'A' => 'A',
                                            'B' => 'B',
                                            'C' => 'C',
                                            'ALL'=>'ALL'
                                        ); ?>
                                        <?php echo form_dropdown('classroomid', $class, '', 'class="form-select"');  ?>
                                    </div>



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
        <h3>Teacher List</h3>
    </div>
    <div style="display:flex;">
        <div>
            <a href="#" id="addTeacher" class="btn btn-success">Add Teacher</a>
        </div>
    </div>
    <!-- <div class="alert alert-success" style="position:absolute; text-align:center; margin-top:-100px; margin-left:0; margin-right:0;margin-bottom:0; display: none;">
    </div>
    <div class="alert alert-danger" style="position:absolute; text-align:center; margin-top:-100px; margin-left:0; margin-right:0;margin-bottom:0; display: none;">
    </div> -->


    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;background-color: #BCD2E5;">
        <thead>
            <tr>
                <th>Number</th>
                <th>Teacher ID</th>
                <th>First Name</th>
                <th>Subject</th>
                <th>Class Room</th>
                <th>Created At</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody id="innerteacherList">
        </tbody>
    </table>
</div>
<script>
    $(function() {
        function showAllTeacher() {
            // alert('click');
            $count = 0;
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/showAllTeacher',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {

                        html += '<tr>' +
                            '<td>' + ++$count + '</td>' +
                            '<td>' + data[i].teacher_id + '</td>' +
                            // '<td>' + '<img src ="' + data[i].Image_path + '" alt="Null" id="ihover" class="img-thumbnail" width="100" height="100"/>' + ' </td>' +
                            '<td>' + data[i].firstname + '</td>' +
                            '<td>' + data[i].subject + '</td>' +
                            '<td>' + data[i].classroomid + '</td>' +
                            '<td>' + data[i].created_at + '</td>' +
                            '<td>' + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].teacher_id + '">Edit</a>' + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].teacher_id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }

                    $('#innerteacherList').html(html);
                },
                error: function() {
                    $('#innerteacherList').html('No data Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }

        showAllTeacher();
        // setInterval(function(){
        //     showAllTeacher();
        // },1000);

        // Add Teacher
        $('#addTeacher').on('click', function() {

            $('#addTeacherModel').modal('show');
            $('#addTeacherModel').find('.modal-title').text('Teacher SignUp');
            $('#teacherForm').attr('action', '<?php echo base_url() ?>admin/teacherSignup');
            $('label[for="teacherid"]').show();
            $('input[name=teacher_id]').show();
            $('#teacherForm')[0].reset();
        });

        //save 
        $('#btnSave').click(function() {


            var url = $('#teacherForm').attr('action');
            var data = $('#teacherForm').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    if (response.success) {
                        $('#addTeacherModel').modal('hide');
                        $('#teacherForm')[0].reset();
                        if (response.type == 'add') {
                            var type = 'added'
                        } else if (response.type == 'update') {
                            var type = "updated"
                        }
                        // $('.alert-success').html('Teacher ' + type + ' successfully').fadeIn().delay(2000).fadeOut('slow');
                        $('.toast-success').html('Teacher ' + type + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');

                        showAllTeacher();
                    } else {
                        // $('#addTeacherModel').modal('show');
                        // alert('Enter Proper Data');
                        $('.toast-error').html('Enter Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function() {
                    // alert('Could not add data');
                    $('.toast-error').html('Enter Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');

                }
            });

        });



        //edit
        $('#innerteacherList').on('click', '.item-edit', function() {

            var id = $(this).attr('data');
            $('#addTeacherModel').modal('show');
            $('#addTeacherModel').find('.modal-title').text('Edit Teacher Profile (' + id + ')');
            $('#teacherForm').attr('action', '<?php echo base_url() ?>admin/upTeacher');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>admin/eTeacher',
                data: {
                    tid: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    // $('#addTeacherModel').modal('hide');
                    $('#teacherForm')[0].reset();
                    $('label[for="teacherid"]').hide();
                    $('input[name=teacher_id]').val(data.teacher_id).hide();
                    $('input[name=password]').val(data.password);
                    $('input[name=firstname]').val(data.firstname);
                    $('input[name=lastname]').val(data.lastname);
                    $('input[name=email]').val(data.email);
                    $('input[name=contact_no]').val(data.contact_no);
                    $('input[name=dob]').val(data.dob);
                    $('select[name=classroomid]').val(data.classroomid);
                    $('select[name=subjectid]').val(data.subjectid);

                },
                error: function() {
                    // alert('Could not Edit Data');
                    $('.toast-error').html('Can not Fetch').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        //delete
        $('#innerteacherList').on('click', '.item-delete', function() {
            var id = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>admin/dTeacher',
                    data: {
                        tid: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            // $('.alert-danger').html('Teacher Deleted successfully').fadeIn().delay(2000).fadeOut('slow');
                            $('.toast-success').html('Teacher Deleted successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                            showAllTeacher();
                        } else {
                            // alert('Error');
                            $('.toast-error').html('Teacher cann\'t be Deleted ').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
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