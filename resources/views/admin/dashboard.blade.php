@extends('admin')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@section('content')
<div class="main-panel">   
    <div class="col-md-5 grid-margin stretch-card" style="margin-top:20px">
      <div class="col-xl-12 col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-xl-3">
        <div class="card bg-warning">
          <div class="card-body px-8 py-9">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Income (This Month)</p>
                  <h2 class="text-white1">{{$income_total}}.<span class="h5">00</span></h2>
              </div>
                  <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
            </div>
                <h6 class="text-white">Cash => {{$income_cash}}.<span class="h5">00</span> </h6>
                <h6 class="text-white">Card => {{$income_card}}.<span class="h5">00</span></h6>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-xl-3">
        <div class="card bg-danger">
          <div class="card-body px-8 py-9">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Income (Last Month)</p>
                <h2 class="text-white1"> {{$last_income}}.<span class="h5">00</span>
                </h2>
              </div>
              <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-danger"></i>
            </div>
                <h6 class="text-white">Cash => {{$last_income_cash}}.<span class="h5">00</span> </h6>
                <h6 class="text-white">Card => {{$last_income_card}}.<span class="h5">00</span></h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="col-xl-12 col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-primary">
          <div class="card-body px-8 py-9">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Posts (This Month)</p>
                </h2>
              </div>
              <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
            </div>
            <h6 class="text-white1" style="margin-left:90px">({{$post}})</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-3 stretch-card pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-success">
          <div class="card-body px-8 py-9">
            <div class="d-flex justify-content-between align-items-start">
              <div class="color-card">
                <p class="mb-0 color-card-head">Posts (Last Month)</p>
              </div>
              <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-success"></i>
            </div>
            <h6 class="text-white1" style="margin-left:90px">({{$last_post}})</h6>
          </div>
        </div>
      </div>
    </div>
      





        <table><tr>
        <td><div id="pie_chart1" style="width:600px; height:450px;margin-top:10px;margin-left:0px"></div></td>
        <td> <div id="pie_chart" style="width:650px; height:400px;"></div></td></tr></table>
        </tr></table>		
                        
            <div style="width:600px;height:400px" id="bar_chart"></div>
    				
             
    
</div>

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


    
@stop