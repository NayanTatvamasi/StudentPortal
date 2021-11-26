<?php include('header.php'); ?>

<div class="container">

    <div class="modal-dialog" role="document" id="eventModel">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white">Add Event</h3>
            </div>
            <?php echo form_open_multipart('admin/eventCreate'); ?>

            <div class="modal-body">
                <div class="bs-docs-section">

                    <div class="form-group">
                        <label for="title" class="form-label mt-2">Event Title</label>
                        <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Event Title ', 'name' => 'event_title', 'value' => set_value('event_title')]);  ?>
                        <?php echo form_error('event_title'); ?>
                    </div>

                    <div class="form-group">
                        <label for="body" class="form-label mt-2">Event Description</label>
                        <?php echo form_textarea(['class' => 'form-control', 'placeholder' => 'Enter Description', 'name' => 'event_body', 'value' => set_value('event_body')]); ?>
                        <?php echo form_error('event_body'); ?>
                    </div>

                </div>
            </div>

            <div style="border-top : 1px solid #dee2e6;">
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="body" class="form-label mt-2">Event Place</label>
                    <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Event Place', 'name' => 'place', 'value' => set_value('place')]); ?>
                    <?php echo form_error('place'); ?>
                </div>
                <div class="form-group">
                    <label for="eventdate" class="form-label mt-2">Date</label>
                    <?php echo form_input(['type' => 'date', 'class' => 'form-control', 'name' => 'event_date', 'value' => set_value('event_date')]);  ?>
                    <?php echo form_error('event_date'); ?>
                </div>

                <div class="form-group">
                    <label for="eventtime" class="form-label mt-2">Time</label>
                    <?php echo form_input(['type' => 'time', 'class' => 'form-control', 'name' => 'event_time', 'value' => set_value('event_time')]);  ?>
                    <?php echo form_error('event_time'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
                <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']);  ?>
            </div>
        </div>
    </div>


</div>
<?php include('footer.php'); ?>