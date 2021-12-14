<?php include('header.php'); ?>
<!-- <style>
    #ihover:hover {
        position: relative;
        transform: scale(3);
    }
</style> -->
<style>
    .myCharts {
        width: 30%;
        height: auto;
        margin: 50 150 auto;
    }
</style>

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

    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;background-color: #BCD2E5;">
        <thead>
            <tr>

                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Class room</th>
                <th>STD</th>
                <th>Date of Birth</th>
                <th>Contact Number</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody id="innerstudentList">

        </tbody>
    </table>
    <div class="myCharts">
        <canvas id="StudentChart" width="80" height="80" style="border:1px solid #000000;">
            Your browser does not support the HTML canvas tag.
        </canvas>
    </div>


</div>
<script>
    $(function() {
        function showAllStudent() {
            // alert('click');

            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/showAllStudent',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var i, a = 0,
                        b = 0,
                        c = 0;

                    for (i = 0; i < data.length; i++) {

                        html += '<tr>' +

                            '<td>' + data[i].studentid + '</td>' +
                            '<td>' + data[i].firstname + '</td>' +
                            '<td>' + data[i].lastname + '</td>' +
                            '<td>' + data[i].classroomid + '</td>' +
                            '<td>' + data[i].standard + '</td>' +
                            '<td>' + data[i].dob + '</td>' +
                            '<td>' + data[i].contact_no + '</td>' +
                            '<td>' + '<a href="javascript:;" class="btn btn-info item-edit" title="Edit details" data="' + data[i].studentid + '">\
	                                <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" >\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#fff" opacity="0.6" x="5" y="20" width="15" height="2" rx="1"/>\
	                                     </g>\
	                                 </svg>\
	                                </span>\
	                            </a>' +
                            '</td>' +
                            '<td>' + '<a href="javascript:;" class="btn btn-danger item-delete" title="Delete" data="' + data[i].studentid + '">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>'
                        '</td>' +
                        '</tr>';


                        if (data[i].classroomid === 'A') {
                            a++;
                        }
                        if (data[i].classroomid === 'B') {
                            b++;
                        }
                        if (data[i].classroomid === 'C') {
                            c++;
                        }
                    }
                    $('#innerstudentList').html(html);
                    var ctx = document.getElementById('StudentChart').getContext('2d');
                    StudentChart.data.datasets[0].data = [a, b, c];
                    StudentChart.update();
                },
                error: function() {
                    $('#innerstudentList').html('No data Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }

        showAllStudent();
        // setInterval(function() {
        //     showAllStudent();
        // }, 1000);

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


    const labels = ['A', 'B', 'C'];
    const data = {
        labels: labels,
        datasets: [{
            data: [
                4, 5, 3
            ],
            borderColor: ['rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
        }]
    };

    var ctx = document.getElementById('StudentChart').getContext('2d');
    var StudentChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Class Chart'
                }
            }
        },

    });
</script>
<?php include("footer.php"); ?>