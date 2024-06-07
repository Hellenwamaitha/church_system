@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-left">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Members Overview</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart" class="chart-container"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Members Attendance</h3>
                    </div>
                    <div class="card-body">
                        <!-- Use canvas element for chart -->
                        <canvas id="doughnutChart" class="chart-container"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .chart-container {
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>
<body>
 
  <script>
    // Line Chart
    const lineChartCanvas = document.getElementById('lineChart');
const lineChart = new Chart(lineChartCanvas, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(30, 113, 69, 0.6)", // Green background color
      borderColor: "rgba(0, 0, 0, 1.0)", // Black border color
      data: [700, 800, 800, 900, 900, 900, 1000, 1100, 1400, 1400, 1500]
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      yAxes: [{
        ticks: {
          min: 600,
          max: 1600,
          stepSize: 200
        }
      }]
    }
  }
});


   // Define a function to create the doughnut chart
   function createDoughnutChart() {
            // Get the canvas element
            var ctx = document.getElementById('doughnutChart').getContext('2d');

            // Define the data for your chart
            var data = {
                labels: ['female', 'male', 'youths'],
                datasets: [{
                    label: 'Attendance',
                    data: [40, 30, 30], // Sample data, you can replace this with your actual data
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Create the chart
            var doughnutChart = new Chart(ctx, {
                type: 'doughnut', // Set chart type to 'doughnut'
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // Call the function to create the doughnut chart
        createDoughnutChart();
  </script>

@endsection


