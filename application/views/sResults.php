<?php include('header.php'); ?>
<style>
    .glow-on-hover {
        /* width: 220px; */
        height: 30px;
        border: none;
        text-align: center;
        outline: none;
        color: #000;
        background: #fff;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;

    }

    .glow-on-hover:before {
        content: '';
        background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }

    .glow-on-hover:active {
        color: #000
    }

    .glow-on-hover:active:after {
        background: transparent;
    }

    .glow-on-hover:hover:before {
        opacity: 1;
    }

    .glow-on-hover:after {
        z-index: -1;
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #fff;
        left: 0;
        top: 0;
        border-radius: 10px;
    }

    @keyframes glowing {
        0% {
            background-position: 0 0;
        }

        50% {
            background-position: 400% 0;
        }

        100% {
            background-position: 0 0;
        }
    }


    .events {
        display: grid;
        /* grid-template-columns:3fr 3fr 3fr; */
        grid-template-columns: repeat(3, 1fr);
        /* Change repeat(3,1fr)  for 3 division tiles*/
        grid-gap: 2rem;
        /* grid-auto-rows: 13rem; */
        /* grid-auto-rows: minmax(2rem,13rem); */
    }
</style>
<div class="container">

    <div id="addGradeModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white">Student Marks</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form id="GradeForm" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="m_id" value="0">
                        <div class="bs-docs-section">
                            <div class="row">

                                <div class="col-lg-6" style="margin-left:25px;">

                                    <div class="form-group">
                                        <label for="Enrollment" class="form-label mt-2">Enrollment Number</label>
                                        <select name="studentid" class="form-select" id="stdid">
                                            <option value=''>Select Student ID</option>
                                            <?php if (!($data == '')) { ?>
                                                <?php foreach ($data as $sid) : ?>
                                                    <?php echo "<option value='" . $sid['studentid'] . "'>" . $sid['studentid'] . " </option>" ?>
                                            <?php endforeach;
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Exam Date" class="form-label mt-2">Exam Date</label>
                                        <select name="event_date" class="form-select">
                                            <option value=''>Select Date</option>
                                            <?php if (!($data == '')) { ?>
                                                <?php foreach ($edate as $sid) : ?>
                                                    <?php echo "<option value='" . $sid['event_date'] . "'>" . date('d-m-Y', strtotime($sid['event_date'])) . "</option>" ?>
                                            <?php endforeach;
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <?php $ctg = array(
                                            '' => 'Select Category',
                                            'Internal' => 'Internal',
                                            'Main' => 'Main'
                                        ); ?>
                                        <label for="Category" class="form-label mt-2">Category</label>
                                        <?php echo form_dropdown('exam_category', $ctg, '', 'class="form-select"');  ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="Subject" class="form-label mt-2">Subject</label>
                                        <select name="subject" class="form-select">
                                            <?php echo "<option value='" . $s . "'>" . $s . "</option>" ?>
                                        </select>
                                    </div>

                                </div>
                                <!--change-->
                                <div class="col-lg-5" style="margin-left:3%;">

                                    <div class="form-group">
                                        <label for="obtain" class="form-label mt-2">Obtained Marks</label>
                                        <?php echo form_input(['class' => 'form-control', 'id' => 'obtain', 'placeholder' => 'Enter Total Marks', 'name' => 'obtain_m', 'value' => set_value('obtain_m')]);  ?>

                                    </div>

                                    <div class="form-group">

                                        <label for="total" class="form-label mt-2">Total Marks</label>
                                        <?php echo form_input(['class' => 'form-control', 'id' => 'total', 'placeholder' => 'Enter Total Marks', 'name' => 'total_m', 'value' => set_value('total_m')]);  ?>

                                    </div>

                                    <div class="form-group">
                                        <label for="Percentage" class="form-label mt-2">Percentage</label>
                                        <div class="input-group mb">
                                            <?php echo form_input(['class' => 'form-control', 'id' => 'percentage', 'name' => 'percentage', 'value' => set_value('percentage')]);  ?>
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="classroom" class="form-label mt-2">Class Room</label>
                                        <select name="classroomid" class="form-select">
                                            <?php echo "<option value='" . $z . "'>" . $z . "</option>" ?>
                                        </select>
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


    <div id="innerGradeModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 90%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white ">Student Grades</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>

                <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Exam Date</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Marks</th>
                            <th>Percentage</th>
                            <!-- <th>Rank In Class</th> -->
                            <?php if (($y == '2')) { ?>
                                <th colspan="2">Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody id="innerGradeList">

                    </tbody>
                </table>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div>
        <h3>Result Lists</h3>
    </div>
    <div style="display:flex;">
        <div>
            <?php if ($y == '2') : ?>
                <a href="#" id="addGrade" class="btn btn-success">Add Grades</a>
            <?php endif; ?>

        </div>
    </div>


    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center; border:1px;">
        <thead>
            <tr>
                <th>Student Grades Information</th>

            </tr>
        </thead>
    </table>
    <div  class="container events" id="studentGradesInfo" style="margin-top: 20px;">
    </div>


</div>
<script>
    $('#total').on('keyup', function percentage() {
        $x = $('#obtain').val();
        $y = $('#total').val();
        $('#percentage').val(($x / $y) * 100);

    });
    $('#obtain').on('keyup', function percentage() {
        $x = $('#obtain').val();
        $y = $('#total').val();
        $('#percentage').val(($x / $y) * 100);

    });

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
                    var i, c = 0;

                    for (i = 0; i < data.length; i++) {

                        html += '<div id="gradeSearch"><div class="studentInfo" data="' + data[i].studentid + '">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title">' + ++c + '</h5>' +
                            '<h6 class="modal-title">' + data[i].firstname + ' ' + data[i].lastname + '</h6>' +
                            '</div>' +
                            '<div class="glow-on-hover" >' +
                            'Class :- ' + data[i].classroomid + ' || ' +
                            'Enrollment :- ' + data[i].studentid +
                            '</div>' +
                            '</div>' +
                            '</div></div>';
                    }

                    $('#studentGradesInfo').html(html);
                },
                error: function() {
                    $('#studentGradesInfo').html('No data Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }
        showAllStudent();

        setInterval(function() {
            showAllStudent();
        }, 1000);



        $('#studentGradesInfo').on('click', '.studentInfo', function() {
            var id = $(this).attr('data');
            // console.log(id);
            $('#innerGradeModel').modal('show');

            function showAllGrades() {
                // alert('click');
                $count = 0;
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url() ?>result/showAllGrades',
                    dataType: 'json',
                    data: {
                        sid: id
                    },
                    success: function(data) {
                        // alert(data);
                        var html = '';
                        var i, c = 0;

                        for (i = 0; i < data.length; i++) {

                            html += '<tr>' +
                                '<td>' + ++c + '</td>' +
                                // '<td>' + '<img src ="' + data[i].Image_path + '" alt="Null" id="ihover" class="img-thumbnail" width="100" height="100"/>' + ' </td>' +
                                '<td>' + data[i].event_date + '</td>' +
                                '<td>' + data[i].subject + '</td>' +
                                '<td>' + data[i].exam_category + '</td>' +
                                '<td>' + data[i].obtain_m + ' | ' + data[i].total_m + '</td>' +
                                '<td>' + data[i].percentage + '%</td>' +
                                '<?php if (($y == '2')) : ?>' +
                                '<td>' + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].m_id + '">Edit</a>' + '</td>' +
                                '<td>' +
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].m_id + '">Delete</a>' +
                                '</td>' +
                                '<?php endif; ?>' +
                                '</tr>';
                        }

                        $('#innerGradeList').html(html);
                    },
                    error: function() {

                        $('#innerGradeList').html('No data Available');
                        // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                    }

                });
            }
            showAllGrades();

        });

        // Add Grade
        $('#addGrade').on('click', function() {

            $('#addGradeModel').modal('show');
            $('#addGradeModel').find('.modal-title').text('Add Grade');
            $('#GradeForm').attr('action', '<?php echo base_url() ?>result/addGrade');
            $('#GradeForm')[0].reset();
        });

        //save 
        $('#btnSave').click(function() {


            var url = $('#GradeForm').attr('action');
            var data = $('#GradeForm').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#addGradeModel').modal('hide');
                        $('#GradeForm')[0].reset();
                        if (response.type == 'add') {
                            var type = 'added'
                        } else if (response.type == 'update') {
                            var type = "updated"
                        }
                        // $('.alert-success').html('Event ' + type + ' successfully').fadeIn().delay(2000).fadeOut('slow');
                        $('.toast-success').html('Grades ' + type + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    
                    } else {
                        $('.toast-error').html('Error to Edit').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function() {
                    // alert('Could not add data');
                    $('.toast-error').html('Enter Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });
            $('#innerGradeModel').modal('show');


        });


        //edit
        $('#innerGradeList').on('click', '.item-edit', function() {

            var id = $(this).attr('data');
            $('#innerGradeModel').modal('hide');
            $('#addGradeModel').modal('show');
            $('#addGradeModel').find('.modal-title').text('Edit Student (' + id + ')');
            $('#GradeForm').attr('action', '<?php echo base_url() ?>result/upGrade');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>result/eGrade',
                data: {
                    mid: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#GradeForm')[0].reset();
                    $('input[name=m_id]').val(data.m_id);
                    $('select[name=studentid]').val(data.studentid);
                    $('select[name=event_date]').val(data.event_date);
                    $('select[name=subject]').val(data.subject);
                    $('select[name=exam_category]').val(data.exam_category);
                    $('input[name=obtain_m]').val(data.obtain_m);
                    $('input[name=total_m]').val(data.total_m);
                    $('input[name=percentage]').val(data.percentage);
                    $('select[name=classroomid]').val(data.classroomid);
                },
                error: function() {
                    // alert('Could not Edit Data');
                    $('.toast-error').html('Can not Fetch').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        //delete
        $('#innerGradeList').on('click', '.item-delete', function() {
            var id = $(this).attr('data');
            $('#innerGradeModel').modal('hide');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>result/dGrade',
                    data: {
                        mid: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            // $('.alert-danger').html('Student Deleted successfully').fadeIn().delay(2000).fadeOut('slow');
                            $('.toast-success').html('Grade Deleted successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        } else {
                            // alert('Error');
                            $('.toast-error').html('Grade cann\'t be Deleted ').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function() {
                        // alert('Error deleting');
                        $('.toast-error').html('Error deleting').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });

    });
</script>
<?php include('footer.php'); ?>