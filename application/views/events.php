<?php include('header.php'); ?>
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

    .evefooter {
        display: grid;
        /* grid-template-columns: repeat(3); */
        /* grid-template-rows: repeat(2); */
        grid-gap: 0.5rem;
        /* position: absolute; */
    }

    #ihover:hover {
        position: relative;
        transform: scale(1.01);
    }
</style>

<div class="container">

    <div id="addEventModel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 40%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white">Add Event</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo form_input(['type' => 'hidden', 'class' => 'form-control', 'name' => 'eventid', 'value' => '0']);  ?>

                        <div class="bs-docs-section">

                            <div class="form-group">
                                <label for="title" class="form-label mt-2">Event Title</label>
                                <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Event Title ', 'name' => 'event_title', 'value' => set_value('event_title')]);  ?>
                            </div>

                            <div class="form-group">
                                <label for="body" class="form-label mt-2">Event Description</label>
                                <?php echo form_textarea(['class' => 'form-control', 'placeholder' => 'Enter Description', 'name' => 'event_body', 'value' => set_value('event_body')]); ?>
                            </div>
                        </div>

                        <div style="border-top : 1px solid #dee2e6;">
                        </div>

                        <div class="form-group">
                            <label for="body" class="form-label mt-2">Event Place</label>
                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Event Place', 'name' => 'place', 'value' => set_value('place')]); ?>
                        </div>
                        <div class="form-group">
                            <label for="eventdate" class="form-label mt-2">Date</label>
                            <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'name' => 'event_date', 'value' => set_value('event_date')]);  ?>
                        </div>

                        <div class="form-group">
                            <label for="eventtime" class="form-label mt-2">Time</label>
                            <?php echo form_input(['type' => 'time', 'class' => 'form-control', 'name' => 'event_time', 'value' => set_value('event_time')]);  ?>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php echo form_submit(['type' => 'submit', 'id' => 'btnSave', 'class' => 'btn btn-primary', 'value' => 'Save']); ?>
                    <!--input submit -->
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


    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#allEvents">All Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#classEvents">Class Events</a>
        </li>
        <?php if (!($y == '1')) : ?>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#myEvents">My Events</a>
            </li>
        <?php endif; ?>

    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="allEvents">
            <div class="container events " id="innereventList" style="margin-top: 20px;">
            </div>
        </div>
        <div class="tab-pane fade show active" id="classEvents">
            <div class="container events " id="onlyClassEvents" style="margin-top: 20px;">
            </div>
        </div>
        <div class="tab-pane fade" id="myEvents">
            <div style="display:flex;margin-top:30px; margin-bottom:30px;">

                <a href="#" id="addEvent" class="btn btn-success">Add Event</a>

            </div>
            <div class="container events " id="myeventList" style="margin-top: 20px;">
            </div>
        </div>
    </div>



</div>

<script>
    $(function() {
        function showAllEvent() {
            // alert('click');
            $count = 0;
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/eventList',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var htmlclass = '';
                    var i;

                    for (i = 0; i < data.length; i++) {

                        html += '<div id="ihover">' +
                            '<div class="card text-white bg-primary mb-1" >' +
                            '<div class="card-header">' +
                            data[i].event_date +
                            '(For:' + data[i].classroomid + ')' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<h4 class="card-title">' + data[i].event_title + '</h4>' +
                            '<p class="card-text">' + data[i].event_body + '</p>' +
                            '<div style="font-size:10px;" class="evefooter">' +
                            '<figcaption class="modal-footer" style=" font-size:15px; padding:0;">' +
                            '-<cite title="Source Title">' + data[i].firstname + ' ' + data[i].lastname + '</cite>' +
                            '</figcaption>' +
                            '<div> Posted On :-' + data[i].posted_on + '</div>' +
                            '<div>Last Updated :-' + data[i].last_updated + '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div></div>';
                        if(data[i].classroomid=='<?= $z;?>') {
                            htmlclass += '<div id="ihover">' +
                                '<div class="card text-white bg-primary mb-1" >' +
                                '<div class="card-header">' +
                                data[i].event_date +
                                '(For:' + data[i].classroomid + ')' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<h4 class="card-title">' + data[i].event_title + '</h4>' +
                                '<p class="card-text">' + data[i].event_body + '</p>' +
                                '<div style="font-size:10px;" class="evefooter">' +
                                '<figcaption class="modal-footer" style=" font-size:15px; padding:0;">' +
                                '-<cite title="Source Title">' + data[i].firstname + ' ' + data[i].lastname + '</cite>' +
                                '</figcaption>' +
                                '<div> Posted On :-' + data[i].posted_on + '</div>' +
                                '<div>Last Updated :-' + data[i].last_updated + '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div></div>';
                        }
                    }

                    $('#innereventList').html(html);
                    $('#onlyClassEvents').html(htmlclass);

                },
                error: function() {
                    $('#innereventList').html('No Events Available');
                    $('#onlyClassEvents').html('No Events Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }

        showAllEvent();
        setInterval(function() {
            showAllEvent();
        }, 1000);

        function myAllEvent() {
            // alert('click');
            $count = 0;
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/myeventList',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var i;
                    if (!(data == "")) {
                        for (i = 0; i < data.length; i++) {

                            html += '<div id="ihover">' +
                                '<div class="card text-white bg-primary mb-1" >' +
                                '<div class="card-header">' +
                                data[i].event_date +
                                '</div>' +
                                '<div class="card-body">' +
                                '<h4 class="card-title">' + data[i].event_title + '</h4>' +
                                '<p class="card-text">' + data[i].event_body + '</p>' +

                                '<div style="font-size:10px;" class="evefooter">' +
                                '<figcaption class="modal-footer" style=" font-size:15px; padding:0;">' +
                                '<a href="javascript:;" class="btn btn-warning item-edit" data="' + data[i].eventid + '">Edit</a>' +
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].eventid + '">Delete</a>' +
                                '</figcaption>' +
                                '<div> Posted On :-' + data[i].posted_on + '</div>' +
                                '<div>Last Updated :-' + data[i].last_updated + '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div></div>';
                        }
                        $('#myeventList').html(html);
                    } else {
                        $('#myeventList').html("You Are Not Allow To My Section./ Data Is Empty");
                    }
                },
                error: function() {
                    $('#myeventList').html('No Events Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }
        myAllEvent();


        // Add Student
        $('#addEvent').on('click', function() {

            $('#addEventModel').modal('show');
            $('#addEventModel').find('.modal-title').text('Add Event');
            $('#eventForm').attr('action', '<?php echo base_url() ?>admin/eventCreate');
            $('#eventForm')[0].reset();
        });

        //save 
        $('#btnSave').click(function() {


            var url = $('#eventForm').attr('action');
            var data = $('#eventForm').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#addEventModel').modal('hide');
                        $('#eventForm')[0].reset();
                        if (response.type == 'add') {
                            var type = 'added'
                        } else if (response.type == 'update') {
                            var type = "updated"
                        }
                        // $('.alert-success').html('Event ' + type + ' successfully').fadeIn().delay(2000).fadeOut('slow');
                        $('.toast-success').html('Event ' + type + ' successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                        showAllEvent();
                        myAllEvent();
                    } else {
                        $('.toast-error').html('Add Some Proper Data').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function() {
                    // alert('Could not add data');
                    $('.toast-error').html('Error to Edit').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });

        });

        //edit
        $('#myeventList').on('click', '.item-edit', function() {

            var id = $(this).attr('data');
            $('#addEventModel').modal('show');
            $('#addEventModel').find('.modal-title').text('Edit Event (' + id + ')');
            $('#eventForm').attr('action', '<?php echo base_url() ?>admin/upEvent');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>admin/eEvent',
                data: {
                    eid: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    // $('#addEventModel').modal('hide');
                    $('#eventForm')[0].reset();
                    $('input[name=eventid]').val(data.eventid);
                    $('input[name=event_title]').val(data.event_title);
                    $('textarea[name=event_body]').val(data.event_body);
                    $('input[name=place]').val(data.place);
                    $('input[name=event_date]').val(data.event_date);
                    $('input[name=event_time]').val(data.event_time);
                    // $('input[name=last_updated]').val(data.last_updated);
                },
                error: function() {
                    // alert('Could not Edit Data');
                    $('.toast-error').html('Can not Fetch').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        //delete
        $('#myeventList').on('click', '.item-delete', function() {
            var id = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>admin/dEvent',
                    data: {
                        eid: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            // $('.alert-danger').html('Event Deleted successfully').fadeIn().delay(2000).fadeOut('slow');
                            $('.toast-success').html('Event Deleted successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');

                            showAllEvent();
                            myAllEvent();
                        } else {
                            $('.toast-error').html('Event cann\'t be Deleted ').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
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
<?php include('footer.php'); ?>