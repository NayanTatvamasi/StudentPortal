<?php include('header.php'); ?>


<div class="container">
  <img src="<?= base_url() ?>Assets/image/school.jpg" class="img-fluid img-thumbnail">
  <!-- alt="" width="280" height="200" -->
</div>


<style>
  .myCharts {
    width: 50%;
    height: auto;
    margin: 50 150 auto;
  }

  .subEditChart {
    width: 350px;
    display: flex;
    column-gap: 5px;
    justify-content: space-around;
  }

  .subEditChart select {
    background-color: #e2ebf0;
    border: 1px solid black;
  }

  #classList option,
  #studentList option {
    text-align: center;
  }

  #btnShow {
    margin-bottom: 15px;
  }
</style>



<div class="myCharts">

  <form action="#" id="chartForm">
    <div class="subEditChart">
      <select name="classId" id="classList" class="form-select" onchange="allOverStudent()">
        <option value="">All Class</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
      <!-- <select name="studentId" id="studentList" class="form-select" onchange="allOverStudent()">
        <option value="">All Student</option>
        <option value="1">A1</option>
        <option value="2">A2</option>
        <option value="8">A8</option>
        <option value="28">A28</option>
        <option value="5">B5</option>
        <option value="6">B6</option>
        <option value="7">B7</option>
        <option value="25">B25</option>
        <option value="25">B25</option>
        <option value="60">C60</option>
        <option value="70">C70</option>
      </select> -->
      <?php $data=$this->chart_m->stdId();
      ?>
      <select name="studentId" id="studentList" class="form-select" onchange="allOverStudent()">
        <option value=''>All Student</option>
        <?php if (!($data == '')) { ?>
          <?php foreach ($data as $sid) : ?>
            <?php echo "<option value='" . $sid['studentid'] . "'>" . $sid['studentid'] . "</option>" ?>
        <?php endforeach;
        } ?>
      </select>
    </div>
  </form>
  <!-- <input type="submit" class="btn btn-info" id="btnShow" value="Show"> -->

  <div>
    <canvas id="myChart2" width="100" height="80" style="border:1px solid #000000;">
      Your browser does not support the HTML canvas tag.
    </canvas>
  </div>

</div>



<script>
  // $('#classList').on('change', function() {
  //   allOverStudent();
  // });
  $(function() {
    allOverStudent();
  });

  function allOverStudent() {

    var data = $('#chartForm').serialize();
    console.log(data);

    var chartLabelList = [];
    var chartSet1Data = [];
    var chartSet2Data = [];
    var chartSet3Data = [];


    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo base_url() ?>chart/showGradeChart',
      async: false,
      dataType: 'json',
      data: data,
      success: function(data) {

        if (!(data == '')) {
          $('.toast-success').html('Chart Show successfully').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
          var i;
          var j = 0,
            k = 0,
            l = 0,
            label = 0;

          for (i = 0; i < data.length; i++) {

            if ((i + 1) % 3 == 1) {
              chartLabelList[label] = [data[i].classroomid + data[i].studentid];
              label++;
            }

            if (data[i].subject === "History") {
              chartSet1Data[j] = data[i].percentage;
              j++;
            }
            if (data[i].subject === "Mathematics") {
              chartSet2Data[k] = data[i].percentage;
              k++;
            }
            if (data[i].subject === "Science") {
              chartSet3Data[l] = data[i].percentage;
              l++
            }

          }
          console.log(chartSet1Data);
          console.log(chartSet2Data);
          console.log(chartSet3Data);

          // var chartLabelList = [];
          // $.ajax({
          //   type: 'ajax',
          //   method: 'post',
          //   url: '',
          //   async: false,
          //   dataType: 'json',
          //   success: function(data) {
          //       var i;
          //       for(i=0;i<data.length;i++){
          //         chartLabelList[i]=data[i].studentid;
          //       }
          //   }

          // });

          var ctx = document.getElementById('myChart2').getContext('2d');
          myChart2.data.datasets[0].data = chartSet1Data;
          myChart2.data.datasets[1].data = chartSet2Data;
          myChart2.data.datasets[2].data = chartSet3Data;
          myChart2.data.labels = chartLabelList;
          myChart2.update();


        } else {
          $('.toast-error').html('Select Properly Or No Data Available').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
        }

      },
      error: function() {
        $('.toast-error').html('Chart Error').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
      }

    });

  }



  ////////////////////////////////////////////////////////////////////////////////////////////


  const labels = [1, 2, 3];

  const data = {
    labels: labels,
    datasets: [{
        label: 'History',
        data: [
          4, 5, 3
        ],
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 1)',
      },
      {
        label: 'Mathematics',
        data: [
          5, 1, 4
        ],
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 1)',
      },
      {
        label: 'Science',
        data: [
          3, 4, 2
        ],
        borderColor: 'rgba(255, 206, 86, 1)',
        backgroundColor: 'rgba(255, 206, 86, 1)',
      }
    ]
  };

  var ctx = document.getElementById('myChart2').getContext('2d');
  var myChart2 = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Subjectwise Chart'
        }
      },
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
          grid: {
            display: false
          }
        }
      }
    },

  });
</script>

<?php include('footer.php'); ?>