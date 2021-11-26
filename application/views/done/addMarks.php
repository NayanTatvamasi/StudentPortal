<?php include('header.php'); ?>


<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <h3 class="modal-title text-white">Add Marks</h3>
    </div>
    <div class="modal-body">
      <?php echo form_open_multipart('result/submitData'); ?>

      <div class="bs-docs-section">

        <div class="row">

          <div class="col-lg-6" style="margin-left:25px;">

            <div class="form-group">
              <label for="Enrollment" class="form-label mt-2">Enrollment Number</label>
              <select name="studentid" class="form-select" id="stdid">
                <option value=''>Select Student ID</option>
                <?php if (!($data == '')) { ?>
                  <?php foreach ($data as $sid) : ?>
                    <?php echo "<option value='" . $sid['studentid'] . "'>" . $sid['studentid'] . "
                   </option>" ?>
                <?php endforeach;
                } ?>
              </select>
            </div>
            <div>
              <?php echo form_error('studentid'); ?>
            </div>

            <div class="form-group">
              <label for="Exam Date" class="form-label mt-2">Exam Date</label>
              <select name="event_date" class="form-select">
                <option value=''>Select Date</option>
                <?php if (!($data == '')) { ?>
                  <?php foreach ($edate as $sid) : ?>
                    <?php echo "<option value='" . $sid['event_date'] . "'>" . date('d-m-Y', strtotime($sid['event_date'])) . "
                   </option>" ?>
                <?php endforeach;
                } ?>
              </select>
            </div>
            <div>
              <?php echo form_error('event_date'); ?>
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
            <div>
              <?php echo form_error('exam_category'); ?>
            </div>

            <div class="form-group">
              <label for="Subject" class="form-label mt-2">Subject</label>
              <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Subject', 'name' => 'subject', 'value' => set_value('subject', $data[0]['subject'])]);  ?>
            </div>
            <div>
              <?php echo form_error('subject'); ?>
            </div>


          </div>



          <div class="col-lg-5" style="margin-left:3%;">
            <!--change-->

            <div class="form-group">
              <label for="obtain" class="form-label mt-2">Obtained Marks</label>
              <?php echo form_input(['class' => 'form-control', 'id' => 'obtain', 'placeholder' => 'Enter Total Marks', 'name' => 'obtain_m', 'value' => set_value('obtain_m')]);  ?>

            </div>
            <div>
              <?php echo form_error('obtain_m'); ?>
            </div>


            <div class="form-group">

              <label for="total" class="form-label mt-2">Total Marks</label>
              <?php echo form_input(['class' => 'form-control', 'id' => 'total', 'placeholder' => 'Enter Total Marks', 'name' => 'total_m', 'value' => set_value('total_m')]);  ?>

            </div>
            <div>
              <?php echo form_error('total_m'); ?>
            </div>


            <div class="form-group">
              <label for="Percentage" class="form-label mt-2">Percentage</label>
              <div class="input-group mb">
                <?php echo form_input(['class' => 'form-control', 'id' => 'percentage', 'name' => 'percentage', 'value' => set_value('percentage')]);  ?>
                <span class="input-group-text">%</span>
              </div>
            </div>
            <div>
              <?php echo form_error('percentage'); ?>
            </div>

            <div class="form-group">
              <label for="batch" class="form-label mt-2">Class Room</label>
              <div>
                <?php echo form_input(['class' => 'form-control','id' => 'percentage', 'name' => 'classroomid', 'value' => set_value('classroomid',$z)]);  ?>
              </div>
            </div>
            <div>
              <?php echo form_error('classroomid'); ?>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="modal-footer">
      <?php echo form_submit(['type' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit']); ?>
      <?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']);  ?>
    </div>
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

  // $('#submit').on('click', function() {
  //  var post = $('#stdid').val();
  //  alert(post);
  //  $post['event_date']=$('#date').val();
  // });
</script>
<?php include("footer.php"); ?>