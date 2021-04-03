@extends('layouts.master.page')
@section('content')
<div>
    @if ($error = Session::get('error'))
        <div class="alert alert-danger">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    <h3 class="page-title" style="margin-top:40px"> Available vacancies</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif </br></br> </br>
</div>
<div style="margin-top:20px" class="input-group">
<form action="{{url('/search')}}" method="get">
<input type="search" name="query" class="search" placeholder="Search" />
<button type="submit" class="search-button mdi mdi-magnify"></button>
</form>
<?php $i=1; ?>
    <table style="margin-top:30px;margin-left:90px">
        <tr> 
        
    @foreach ($results as $result)
            <td>
                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
            </td><td></td><td></td>
            <td class="card px-xl-6" style="width:425px;align-items:center;margin-top:20px"></br>
                @foreach ($company as $com)
                    @if($com->id==$result->company_id) 
                        <div class="sub-text"><img src="{{asset('images/'.$com->logo)}}" width="120px" height="70px"></div>
                    @endif
                @endforeach
                @foreach ($vacancy as $vac)
                    @if($vac->id==$result->vacancy_id)
                        
                        <div><h4 class="sub-text">Designation : {{$vac->title}}</h4></div>
                    @endif
                @endforeach
                @foreach ($company as $com)
                    @if($com->id==$result->company_id) 
                        <div><h4 class="sub-text">Company Name : {{$com->name}}</h4></div>
                    @endif
                @endforeach
                <div><h4 class="sub-text">Closing Date : {{$result->closing_date}}</h4></div></br>
                <div>
                    <form action="" method="POST">
                        <a class="btn btn-primary" href="{{url('/vacancy/apply')}}">Apply</a>
                      @foreach($company as $com)
                      @foreach ($vacancy as $vac)
                      @if($data->vacancy_id==$vac->id and $data->company_id==$com->id)
                        <a class="btn btn-primary"  href="{{ url('/post/view',$result->id) }}">View</a>
                     @endif
                     @endforeach
                     @endforeach
                    
                        
                            @csrf
                            @method('DELETE')
                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    </form>
                </div>
                </br>
            </td>
      
        <?php 
            if($i%2==0){
                echo '</tr><tr>';
                $i++;}
            else
                $i++;
        ?>
    
@endforeach
</table>
    </div>
</div>
@stop