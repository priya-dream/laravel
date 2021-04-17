@extends('admin')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@section('content')
        <div class="row">
        <table><tr>
           <td> <div id="pie_chart" style="width:750px; height:450px;"></div></td>
           <td><div id="pie_chart1" style="width:750px; height:450px;"></div></td></tr></table>
        </div>
             
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var analytics = <?php echo $title; ?>

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title : 'Percentage of Vacancy Posts according to job types'
            };
            var options1 = {
                title : 'Percentage of Vacancy Posts according to Companies'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById('pie_chart1'));
            chart.draw(data1, options1);
        }
        
    </script>


    
@stop