<?php include('header.php'); ?>


<div class="container">
  <img src="<?= base_url() ?>Assets/image/school.jpg" class="img-fluid img-thumbnail">
  <!-- alt="" width="280" height="200" -->
</div>


<style>
  .myCharts {
    width: 80%;
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
      <select name="classId" id="classList" class="form-select">
        <option value="">Select Class</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <!-- <option value="C">C</option> -->
      </select>
      <select name="studentId" id="studentList" class="form-select">
        <option value="">Select Student</option>
        <option value="1">A1</option>
        <option value="2">A2</option>
        <option value="8">A8</option>
        <option value="28">A28</option>
        <option value="5">B5</option>
        <option value="6">B6</option>
        <option value="7">B7</option>
        <option value="25">B25</option>
      </select>
    </div>
  </form>
  <input type="submit" class="btn btn-info" id="btnShow" value="Show">

  <div>
    <canvas id="myChart" width="100" height="80" style="border:1px solid #000000;">
      Your browser does not support the HTML canvas tag.
    </canvas>
  </div>

</div>



<script>
  $('#btnShow').on('click', function() {

    var data = $('#chartForm').serialize();
    console.log(data);

    var chartDataList = [];
    var chartLabelList = [];

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
          for (i = 0; i < data.length; i++) {

            chartLabelList[i] = [data[i].subject,data[i].event_date];

            chartDataList[i] = data[i].percentage;
          }

          var ctx = document.getElementById('myChart').getContext('2d');
          // myChart.destroy();
          // chartCall(chartLabelList,chartDataList);
          myChart.data.datasets[0].data = chartDataList;
          myChart.data.labels = chartLabelList;
          // myChart.type = 'pie';
          myChart.update();

        } else {
          $('.toast-error').html('Select Properly Or No Data Available').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
        }

      },
      error: function() {
        $('.toast-error').html('Chart Error').parent().addClass('show').fadeIn().delay(2000).fadeOut('slow');
      }

    });

  });


  // function chartCall(chartLabelList, chartDataList) {
  //   var ctx = document.getElementById('myChart').getContext('2d');
  //   var myChart = new Chart(ctx, {
  //     type: 'bar',
  //     data: {
  //       labels: chartLabelList,
  //       datasets: [{
  //         label: 'Percentage of Grades',
  //         data: chartDataList,
  //         backgroundColor: [
  //           'rgba(255, 99, 132, 1)',
  //           'rgba(54, 162, 235, 1)',
  //           'rgba(255, 206, 86, 1)',
  //           'rgba(75, 192, 192, 1)',
  //           'rgba(153, 102, 255, 1)',
  //           'rgba(255, 159, 64, 1)'
  //         ],
  //         borderColor: [
  //           'rgba(255, 99, 132, 1)',
  //           'rgba(54, 162, 235, 1)',
  //           'rgba(255, 206, 86, 1)',
  //           'rgba(75, 192, 192, 1)',
  //           'rgba(153, 102, 255, 1)',
  //           'rgba(255, 159, 64, 1)'
  //         ],
  //         borderWidth: 1
  //       }]
  //     },
  //     options: {
  //       scales: {
  //         y: {
  //           beginAtZero: true
  //         }
  //       }
  //     }
  //   });

  // }

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
            ['A'],
            ['B'],
            ['C']
          ],
          datasets: [{
            label: 'Subjectwise Marks',
            data: [
              4, 5, 3
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: 'Final Result-2021'
            },
          },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
</script>

<?php include('footer.php'); ?>