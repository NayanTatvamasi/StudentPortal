<body>

    <div id="" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Student_Name Enroll{X}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    Student Grades
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;">
        <thead>
            <tr>
                <?php if (!($y == '1')) { ?>
                    <th>Student ID</th>
                <?php } else { ?><th>Number</th> <?php  } ?>
                <th>Exam Date</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Marks</th>
                <th>Percentage</th>
                <!-- <th>Rank In Class</th> -->
                <?php if (!($y == '1')) { ?>
                    <th colspan="2">Actions</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody id="innerGradeList">

        </tbody>
    </table>
</body>

<script>
    function showAllGrades() {
        // alert('click');
        $count = 0;
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>result/showAllGrades',
            dataType: 'json',
            success: function(data) {
                // alert('hello');
                var html = '';
                var i, c = 0;

                for (i = 0; i < data.length; i++) {

                    html += '<tr>' +
                        '<td><?php if (!($y == '1')) { ?>' + data[i].studentid + '<?php } else { ?>' + ++c + '<?php } ?></td>' +
                        // '<td>' + '<img src ="' + data[i].Image_path + '" alt="Null" id="ihover" class="img-thumbnail" width="100" height="100"/>' + ' </td>' +
                        '<td>' + data[i].event_date + '</td>' +
                        '<td>' + data[i].subject + '</td>' +
                        '<td>' + data[i].exam_category + '</td>' +
                        '<td>' + data[i].obtain_m + ' | ' + data[i].total_m + '</td>' +
                        '<td>' + data[i].percentage + '</td>' +
                        '<?php if (!($y == '1')) : ?>' +
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
</script>