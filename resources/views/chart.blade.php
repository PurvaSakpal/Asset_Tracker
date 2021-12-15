@extends('master')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // For pie chart
            var data = google.visualization.arrayToDataTable([
            ['Assets', 'Assets according to asset type'],
            @php echo $chartData @endphp
            ]);

            var options = {
            title: 'List of Assets'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);

            // For Bar Chart
            var data1 = google.visualization.arrayToDataTable([
            ['Status', 'Active'],
            @php echo $chartDatabar @endphp
            ]);

            var options1 = {
            title: 'List of active Assets'
            };

            var chart1 = new google.visualization.BarChart(document.getElementById('barchart'));

            chart1.draw(data1, options1);
        }
    </script>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Pie Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <section id="piechart" style="width: 900px; height: 500px;"></section>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- BarChart -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <section id="barchart" style="width: 900px; height: 500px;"></section>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.content-wrapper -->
    </div>
<!-- ./wrapper -->
  @stop
