<?php include('header.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
    .events {
        display: grid;
        /* grid-template-columns:3fr 3fr 3fr; */
        grid-template-columns: repeat(2, 1fr);
        /* Change repeat(3,1fr)  for 3 division tiles*/
        grid-gap: 2rem;
        /* grid-auto-rows: 13rem; */
        /* grid-auto-rows: minmax(2rem,13rem); */
    }

    #assSubmit {
        display: grid;
        grid-template-columns: 0.35fr 1fr;
        grid-gap: 1rem;
    }

    .btnfileUpload {

        background-color: white;
        color: black;
        align-items: center;
    }


    .evefooter {
        display: grid;
        /* grid-template-columns: repeat(1, 1fr); */
        /* grid-template-rows: repeat(2); */
        grid-gap: 0.5rem;
        /* position: absolute; */
    }

    #ihover:hover {
        position: relative;
        transform: scale(1.01);
    }

    .exevents {
        display: grid;
        grid-template-columns: 1fr 0.5fr 1fr 1fr;
        grid-gap: 0.5rem;
        margin-left: 2%;
        margin-bottom: 1%;

    }
</style>

<div class="container">
    <!-- <div class="alert alert-success" style="display: none;">
        Success
    </div> -->
    <div id="addAssignmentModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 40%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white">New Assignment</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">

                    <?php echo form_open_multipart('result/assignmentCreate', 'id="assignmentForm" class="form-horizontal"'); ?>
                    <!-- <form id="assignmentForm" action="" method="post" enctype="multipart/form-data" class="form-horizontal"> -->

                    <div class="bs-docs-section">
                        <?php echo form_input(['type' => 'hidden', 'name' => 'subject', 'value' => $s]);  ?>
                        <?php echo form_input(['type' => 'hidden', 'name' => 'classroomid', 'value' => $z]);  ?>
                        <?php echo form_input(['type' => 'hidden', 'name' => 'teacher_id', 'value' => $x]);  ?>
                        <?php echo form_input(['type' => 'hidden', 'name' => 'as_id', 'value' => '0']); ?>


                        <div class="form-group">
                            <label for="title" class="form-label mt-2">Title</label>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Title ', 'name' => 'as_Title', 'value' => set_value('as_Title')]);  ?>
                        </div>

                        <div class="form-group">
                            <label for="body" class="form-label mt-2">Description</label>
                            <?php echo form_textarea(['class' => 'form-control', 'placeholder' => 'Enter Description', 'name' => 'as_body', 'value' => set_value('as_body')]); ?>
                        </div>

                        <div class="form-group">
                            <label for="upload" class="form-label mt-2 ">Upload</label>
                            <input class="form-control" type="file" name="userfile" id="userfile" onchange="readURL(this);" />

                            <div align=center style="margin-top: 3%;">
                                <img id="imageShow" src="#" alt="Upload File" width="150" height="150">
                            </div>

                        </div>
                    </div>

                    <div style="border-top : 1px solid #dee2e6; margin-top:12px;">
                        <?php echo form_fieldset('Deadline Information'); ?>

                        <div class="form-group">
                            <label for="adate" class="form-label mt-2">Date</label>
                            <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'name' => 'as_date', 'value' => set_value('as_date')]);  ?>
                        </div>

                        <div class="form-group">
                            <label for="atime" class="form-label mt-2">Time</label>
                            <?php echo form_input(['type' => 'time', 'class' => 'form-control', 'name' => 'as_time', 'value' => set_value('as_time')]);  ?>
                        </div>

                        <?php echo form_fieldset_close(); ?>
                    </div>
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary" id="btnSave" value="Save" /> -->
                    <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSave', 'value' => 'Save']); ?>
                </div>
                <?php echo form_close(); ?>
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


    <div id="uploadModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Assignment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('result/uploadStudentAssignment', 'id="SAform" class="form-horizontal"'); ?>
                    <input id="as_id_set" name="as_id" type="hidden" value="">
                    <input name="studentid" type="hidden" value="<?= $x; ?>">
                    <div class="input-group mb-3">
                        <label for="SAfile" class="input-group-text"><i class="fas fa-upload">Upload</i></label>
                        <input type="text" id="show_name" class="form-control">
                        <input style="visibility:hidden;" type="file" name="SAfile" id="SAfile" class="form-control" />
                    </div>
                    <button type="submit" id="btnUpload" class="btn btn-primary">Upload</button>
                    <?php echo form_close(); ?>
                </div>



            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="innerAssignmentModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 90%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white ">Student Assignment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>

                <div class="exevents" style="margin-top: 10px;">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" id="exmyInput">

                </div>

                <table class="table table-bordered table-responsive" style="text-align:center;background-color: #BCD2E5;">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Student ID</th>
                            <th>Assignment</th>
                            <th>Add Time</th>
                        </tr>
                    </thead>
                    <tbody id="innerAssignmentList">

                    </tbody>
                </table>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div>
        <h3>Assignments</h3>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#allAssign">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" id="showIMP" href="#myIMP">Important</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="allAssign">
            <div style="display:flex;margin-top:30px; margin-bottom:20px;">
                <?php if (!($y == '1')) : ?>
                    <a href="#" id="addAssignment" class="btn btn-success">Create New Assignment</a>
                    <!--add button-->

                <?php endif; ?>
                <div class="text-danger">
                    <?php if (isset($upload_error)) {
                        echo $upload_error;
                    }  ?>
                </div>
            </div>
            <div class="container events " id="allAssignmentList" style="margin-top: 20px;">
                <!--All Assignment List-->
            </div>

        </div>
        <div class="tab-pane fade" id="myIMP">
            <div class="container events " id="ImpAssignmentList" style="margin-top: 20px;">
                <!--IMP List-->
            </div>
        </div>
    </div>

</div>

<script>
    //show file uploaded name
    $("#SAfile").change(function() {

        filename = this.files[0].name;
        $('#show_name').val(filename);
        // console.log(filename);
    });

    // Image Show Section 
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageShow').attr('src', e.target.result).width(150).height(150);
                // x=$('#imageShow').attr('src');
                // console.log(x);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // student assignment List
    $('#allAssignmentList').on('click', '#clickList', function() {

        $('#innerAssignmentModel').modal('show');
        var id = $(this).attr('data');
        // alert(id);

        // alert('click');
        $count = 0;
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url() ?>result/studentAssignmentList',
            dataType: 'json',
            data: {
                aid: id
            },
            success: function(data) {
                // alert(data);
                var html = '';
                var i, c = 0;

                for (i = 0; i < data.length; i++) {

                    html += '<tr>' +
                        '<td>' + ++c + '</td>' +
                        '<td>' + data[i].studentid + '</td>' +
                        '<td>' +
                        '<img id="imageView" src="' + data[i].as_path + '" width="100px" height="100px">' +
                        // '<a  href="' + data[i].as_path + '">' +data[i].as_path +'</a>'+
                        // '<iframe src="'+data[i].as_path+'" width="100px" height="100px"/>'+
                        '</td>' +
                        '<td>' + data[i].add_time + '</td>' +
                        '</tr>';
                }

                $('#innerAssignmentList').html(html);
            },
            error: function() {

                $('#innerAssignmentList').html('<tr><td colspan=5>' + 'No data Available' + '</td></tr>');
                // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
            }

        });


    });

    //on click file view in new page................................................
    $('#innerAssignmentList').on('click','#imageView', function() {
        // alert('hello');
        var url=$(this).attr('src');
        window.open(url, '_blank');
    });

    // inner search box for assignmentList of Student
    $("#exmyInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#innerAssignmentList tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });




    function showAllAssignment() {
        // alert('click');
        // $count = 0;
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>result/assignmentList',
            dataType: 'json',
            success: function(data) {
                // alert('hello');
                var html = '';

                var i;

                for (i = 0; i < data.length; i++) {

                    html += '<div id="ihover"><div class="card text-white bg-primary mb-1" >' +
                        '<div class="card-header ">' +
                        '<?php if (!($y == '1')) { ?>' +
                        '<div>' +
                        '<a href="javascript:;"  class="item-check" data="' + data[i].as_id + '"><input type="checkbox"' + data[i].as_check + '/></a>' +
                        '</div>' +
                        '<?php } ?>' +
                        '</div>' +
                        '<div class="card-body">' +
                        '<div class="evefooter">' +
                        '<div style="font-size:12px; text-align: right;"> Dead Line:-' + data[i].as_date + ' || ' + data[i].as_time + '</div>' +
                        '</div>' +

                        '<?php if ($y == '2') { ?>' +
                        '<div id="clickList" data="' + data[i].as_id + '">' +
                        '<?php } ?>' +

                        '<h4 class="card-title">' + data[i].as_Title + '</h4>' +
                        '<p class="card-text">' + data[i].as_body + '</p>' +

                        '<?php if ($y == '2') { ?>' +
                        '</div>' +
                        '<?php } ?>' +

                        '<div id="assSubmit">' +
                        '<?php if (($y == '1')) { ?>' +
                        '<a href="javascript:;" class="btn btnfileUpload" value="' + data[i].as_id + '" data="' + data[i].as_Title + '"><i class="fas fa-upload">&nbsp&nbspUpload</i></a>' +
                        '<?php } ?>' +


                        '<div align="right"><a href="' + data[i].as_path + '" download>Download</a></div>' +
                        '</div>' +


                        '<div style="font-size:10px; text-align: right; ">' +
                        // '<figcaption class="modal-footer" style=" font-size:10px; padding:0;">' +
                        // '-<cite title="Source Title">' + data[i].firstname + ' ' + data[i].lastname + '</cite>' +
                        // '</figcaption>' +
                        '<cite title="Source Title">' + 'Posted On :-' + data[i].posted_on + '</cite>' +
                        // 'Posted On :-' + data[i].posted_on +
                        '</div>' +

                        '<div style="font-size:10px;">' +

                        '<figcaption class="modal-footer" style=" font-size:15px; padding:0;">' +
                        '<?php if (!($y == '1')) { ?>' +
                        '<a href="javascript:;" class="btn btn-warning item-edit" data="' + data[i].as_id + '">Edit</a>' +
                        '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].as_id + '">Delete</a>' +
                        '<?php } ?>' +
                        '</figcaption>' +
                        '<cite title="Source Title">' + 'Last Updated :-' + data[i].last_updated + '</cite>' +
                        '</div>' +
                        '</div>' +
                        '</div></div>';
                }

                $('#allAssignmentList').html(html);


            },
            error: function() {
                $('#allAssignmentList').html('No Assignment Available');

                // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
            }
        });
    }
    showAllAssignment();
    // setInterval(function() {
    //     showAllAssignment();
    // }, 1000);

    function showAllImps() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>result/assignmentList',
            dataType: 'json',
            success: function(data) {
                // alert('hello');
                var htmlIMP = '';
                var i;

                for (i = 0; i < data.length; i++) {

                    if (!(data[i].as_check == "")) {

                        htmlIMP += '<div id="ihover"><div class="card text-white bg-primary mb-1" >' +
                            '<div class="card-header ">' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<div class="evefooter">' +
                            '<div style="font-size:12px; text-align: right;"> Dead Line:-' + data[i].as_date + ' || ' + data[i].as_time + '</div>' +
                            '</div>' +

                            '<h4 class="card-title">' + data[i].as_Title + '</h4>' +
                            '<p class="card-text">' + data[i].as_body + '</p>' +
                            //'<input href="'+ data[i].as_path+'"type="button" value="Download">' +
                            '<a href="' + data[i].as_path + '" type="button" download>Download</a>' +
                            '<div style="font-size:10px; text-align: right; ">' +
                            // '<figcaption class="modal-footer" style=" font-size:10px; padding:0;">' +
                            // '-<cite title="Source Title">' + data[i].firstname + ' ' + data[i].lastname + '</cite>' +
                            // '</figcaption>' +
                            '<cite title="Source Title">' + 'Posted On :-' + data[i].posted_on + '</cite>' +
                            '</div>' +

                            '<div style="font-size:10px;">' +

                            // '<figcaption class="modal-footer" >' +

                            // '<a href="javascript:;" class="btn btn-warning item-edit" data="' + data[i].as_id + '">Edit</a>' +
                            // '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].as_id + '">Delete</a>' +

                            // '</figcaption>' +
                            '<cite title="Source Title">' + 'Last Updated :-' + data[i].last_updated + '</cite>' +
                            '</div>' +
                            '</div>' +
                            '</div></div>';
                    }
                }

                $('#ImpAssignmentList').html(htmlIMP);

            },
            error: function() {
                $('#ImpAssignmentList').html('No Assignment Available');
                // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
            }
        });
    }

    $('#showIMP').on('click', function() {

        showAllImps();
    });

    //check uncheck
    $('#allAssignmentList').on('click', '.item-check', function() {
        var id = $(this).attr('data');
        // alert(id);
        $.ajax({
            type: 'ajax',
            dataType: 'json',
            method: 'post',
            async: false,
            url: '<?php echo base_url() ?>result/checkImp',
            data: {
                aid: id
            },
            success: function(data) {
                // console.log(data);
                if (data.as_check == '') {
                    var checkid = 'checked';
                    var set = "Set";
                } else {
                    var checkid = '';
                    var set = "Unset";
                }
                $.ajax({
                    type: 'ajax',
                    dataType: 'json',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url() ?>result/setCheckImp',
                    data: {
                        ascheck: checkid,
                        as_id: data.as_id,

                    },
                    success: function(data) {

                        $('.toast-success').html(set + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        showAllAssignment();
                    }
                });


            },
            error: function() {
                alert('Error Set IMP');
            }
        });

    });


    // Add 
    $('#addAssignment').on('click', function() {

        $('#addAssignmentModel').modal('show');
        $('#addAssignmentModel').find('.modal-title').text('Create Assignment');
        // $('#assignmentForm').attr('action', '<//?php echo base_url() ?>result/assignmentCreate');
        $('#assignmentForm')[0].reset();
    });

    //on Upload click
    $('#allAssignmentList').on('click', '.btnfileUpload', function() {
        var id = $(this).attr('value');
        var title = $(this).attr('data');
        $('#as_id_set').attr('value', id)
        $('#uploadModel').find('.modal-title').text(title);
        $('#uploadModel').modal('show');
    });

    //save 
    // $('#btnSave').on('click', function() {


    //     var url = $('#assignmentForm').attr('action');
    //     var data = $('#assignmentForm').serialize();

    //     $.ajax({
    //         type: 'ajax',
    //         method: 'post',
    //         url: url,
    //         data: data,
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.success) {
    //                 $('#addAssignmentModel').modal('hide');
    //                 $('#assignmentForm')[0].reset();
    //                 if (response.type == 'add') {
    //                     var type = 'added'
    //                 } else if (response.type == 'update') {
    //                     var type = "updated"
    //                 }
    //                 // $('.alert-success').html('Event ' + type + ' successfully').fadeIn().delay(2000).fadeOut('slow');
    //                 $('.toast-success').html('Assignment ' + type + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
    //                 showAllAssignment();
    //             } else {
    //                 $('.toast-error').html('Add Some Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
    //             }
    //         },
    //         error: function() {
    //             // alert('Could not add data');
    //             $('.toast-error').html('Error').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
    //         }
    //     });
    // });

    //edit
    $('#allAssignmentList').on('click', '.item-edit', function() {

        var id = $(this).attr('data');
        $('#addAssignmentModel').modal('show');
        $('#addAssignmentModel').find('.modal-title').text('Edit Assignment (' + id + ')');
        $('#assignmentForm').attr('action', '<?php echo base_url() ?>result/upAsssignment');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>result/eAssignment',
            data: {
                aid: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('#assignmentForm')[0].reset();
                $('input[name=as_id]').val(data.as_id);
                $('input[name=as_Title]').val(data.as_Title);
                $('textarea[name=as_body]').val(data.as_body);
                // $('input[name=userfile]').fileupload({url : data.as_path});
                // $('#userfile').fileupload({url : data.as_path});
                $('input[name=as_date]').val(data.as_date);
                $('input[name=as_time]').val(data.as_time);
            },
            error: function() {
                // alert('Could not Edit Data');
                $('.toast-error').html('Can not Fetch').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    });

    //delete
    $('#allAssignmentList').on('click', '.item-delete', function() {
        var id = $(this).attr('data');
        $('#deleteModal').modal('show');
        //prevent previous handler - unbind()
        $('#btnDelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>result/dAssignment',
                data: {
                    aid: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        $('.toast-success').html('Assignment Deleted successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        showAllAssignment();

                    } else {
                        $('.toast-error').html('Assignment cann\'t be Deleted ').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function() {
                    alert('Error deleting');
                }
            });
        });
    });
</script>
<?php include('footer.php'); ?>