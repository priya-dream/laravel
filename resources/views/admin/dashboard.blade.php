@extends('admin')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@section('content')
<div class="main-panel">
        <table><tr>
        <td><div id="pie_chart1" style="width:600px; height:450px;margin-top:10px;margin-left:0px"></div></td>
        <td> <div id="pie_chart" style="width:650px; height:400px;"></div></td></tr></table>
        </tr></table>		
                        
            <div style="width:600px;height:400px" id="bar_chart"></div>
    				
             
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>

    <script type="text/javascript">
        var analytics = <?php echo $name; ?>

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title : 'Percentage of Vacancy Posts according to companies'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }  
    </script>
    <script type="text/javascript">
        var analytics1 = <?php echo $title; ?>

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChar);
        function drawChar()
        {
            var data = google.visualization.arrayToDataTable(analytics1);
            var options = {
                title : 'Percentage of Vacancy Posts according to job types'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
            chart.draw(data, options);
        }  
    </script>
    <script type="text/javascript">
    $(function(){
        var datas=<?php echo json_encode($datas); ?>
        var barCanvas=$(#bar_chart);
        var barChart=new Chart(barCanvas,{
            type:'bar',
            data:{
                labels:['DE','TI','E','D'],
                datasets:[
                    {
                        label:'test',
                        data:datas,
                        backgroundColor:['red','orange','blue','pink']
                    }
                ]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

    });
    </script>

</div>
    
@stop