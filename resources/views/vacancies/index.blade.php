
@extends('layouts.master.page')
@section('content')
<h3 class="page-title" style="margin-top:90px"> Available vacancies</h3>
<div style="margin-top:30px" class="input-group">
    <input style="margin-left:250px; font-size:25px" type="text" class="form-control" placeholder="Search" />
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="mdi mdi-magnify"></i>
        </span>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif </br></br> </br>


        <?php $i=1; ?>
    <table style="margin-top:50px">
        <tr> 
    @foreach ($results as $result)
    
            <td>
                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
            </td><td></td><td></td>
            <td class="card px-xl-5" style="width:600px;font-align:center;"></br>
                @foreach ($company as $com)
                    @if($com->id==$result->company_id) 
                        <div><h4 class="sub-text"><img src="{{asset('images/'.$com->image)}}" width="120px" height="70px"></h4></div>
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
                        <a class="btn btn-primary" href="{{url('/vacancy/apply'),$result->id}}">Apply</a>
                        <a class="btn btn-primary"  href="{{ url('/post/view'),$result->id }}">View</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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