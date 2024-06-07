<?php $__env->startSection('content'); ?>
<style>
    .chart-container {
      width: 100%;
      height: 400px;
      margin: 0 auto;
    }
    .sidebar {
      background-color: #343a40;
      color: #fff;
      height: 100vh;
      padding: 20px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #ccc;
    }
  </style>
</head>
<body>
  <div class="row no-gutters">

    <div class="col-10">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-left">Finance Officer Dashboard</h1>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <h3>100<sup style="font-size: 20px">%</sup></h3>

                  <p>Total Income</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>56<sup style="font-size: 20px">%</sup></h3>

                  <p>Total Expense</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                    <h3>10<sup style="font-size: 20px">%</sup></h3>

                  <p>Cash on Hand</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                    <h3>34<sup style="font-size: 20px">%</sup></h3>

                  <p>Loans</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Income Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="myChart" style="width:500%;max-width:500px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Expense Breakdown</h3>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="width:500%;max-width:500px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script>

const xValues = ["Jan", "Feb", "March", "April", "May","June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
    const yValues = [40500, 50500, 50900, 50200, 60000, 60100, 50900, 60960, 60300, 60500, 60200, 60000];
     const barColors = [
      "#FF5733", // Red-Orange
      "#33FF57", // Green
      "#3357FF", // Blue
      "#FF33A6", // Pink
      "#FF8C33", // Orange
      "#FFFF33", // Yellow
      "#9D33FF", // Purple
      "#FF3333", // Bright Red
      "#FF5733", // Red
      "#FF33F6", // Fuchsia
      "#33FF8C", // Mint Green
      "#FF5733"  // Coral
    ];
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
    legend: {display: false},
    title: {
      display: true,
      text: ""
    },
    scales: {
      xAxes: [{ticks: {min: 10, max:60}}]
    }
  }
    });
    // Pie Chart
    function createPieChart() {
      // Get the canvas element
      var ctx = document.getElementById('pieChart').getContext('2d');

      // Define the data for your chart
      var data = {
        labels: ['Loan', 'Utilities', 'Supplies', 'Salaries'],
        datasets: [{
          label: 'Expenses',
          data: [43.75, 12.5, 18.75, 25 ], // Sample data, you can replace this with your actual data
          backgroundColor: [
            '#FF6384', // Vibrant Pink
            '#36A2EB', // Vibrant Blue
            '#FFCE56', // Vibrant Yellow
            '#4BC0C0', // Vibrant Cyan
            '#9966FF', // Vibrant Purple
            '#FF9F40'  // Vibrant Orange
          ],
          borderColor: [
            '#FF6384', // Vibrant Pink
            '#36A2EB', // Vibrant Blue
            '#FFCE56', // Vibrant Yellow
            '#4BC0C0', // Vibrant Cyan
            '#9966FF', // Vibrant Purple
            '#FF9F40'  // Vibrant Orange
          ],
          borderWidth: 1
        }]
      };

      // Create the pie chart
      new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
          plugins: {
            title: {
              display: true,
              text: 'Company Expenses'
            }
          }
        }
      });
    }

    // Call the function to create the chart
    createPieChart();

    // Call the function to create the doughnut chart
    createDoughnutChart();
  </script>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hellen/managementapp/resources/views/finance/dashboard.blade.php ENDPATH**/ ?>