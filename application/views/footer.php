<div class="footer-copyright">
  <div class="container">
    © 2018 Copyright: <a href="https://www.linkedin.com/in/nayankumar-sorathiya-367916143"> MrEye </a>
  </div>
</div>
</body>
<style>
  table tbody tr:nth-child(odd) {
    background-color: #F3FAFF;
  }

  table tbody tr:nth-child(even) {
    background-color: #FFFFFF;
  }

  table tbody tr:hover {
    background-color: #BCD2E5;
  }
</style>
<script>
  $(function() {

    $('#userProfile').on('click', function() {
      // var id = $(this).attr('data');
      if (<?= $y ?> == '1') {
        $('#studentModal').modal('show');
        // $('#myModal').find('.modal-title').text('Add New Employee');
      } else {
        $('#teacherModal').modal('show');
      }

      // $('#teacherForm').attr('action', 'admin/profile');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>admin/profile',
        dataType: 'json',
        success: function(data) {

          if (<?= $y ?> == '1') {
            $('#studentModal').modal('show');
            // $('#myModal').find('.modal-title').text('Student Info');

            $('input[name=studentid]').val(data.studentid);
            $('input[name=standard]').val(data.standard);
            $('input[name=batch]').val(data.batch);
          } else {
            $('#teacherModal').modal('show');
            // $('#myModal').find('.modal-title').text('Teacher Info');

            $('input[name=teacher_id]').val(data.teacher_id);
            $('input[name=subject]').val(data.subject);
          }
          $('input[name=firstname]').val(data.firstname);
          $('input[name=lastname]').val(data.lastname);
          $('input[name=email]').val(data.email);
          $('input[name=contact_no]').val(data.contact_no);
          $('input[name=dob]').val(data.dob);
          $('input[name=classroomid]').val(data.classroomid);

        },
        error: function() {
          alert('Could not Edit Data');
        }
      });
    });

  });

  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#innerstudentList tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#studentGradesInfo #gradeSearch").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#innerteacherList tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#innereventList #ihover").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#myeventList #ihover").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#allAssignmentList #ihover").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      $("#ImpAssignmentList #ihover").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    })
  });


  // $('.toast-danger').fadeIn().delay(2000).fadeOut('slow');
  // $('.toast-success').fadeIn().delay(2000).fadeOut('slow');
  $('.text-danger').fadeIn().delay(4000).fadeOut('slow');
</script>

</html>