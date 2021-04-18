@extends('layouts.master.page')
@section('content')
<div>
    @if ($error = Session::get('error'))
        <div class="alert alert-danger">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    @if ($error = Session::get('alert'))
        <div class="alert alert-danger">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    <h3 class="page-title" style="margin-top:50px;font-family:Broadway"> Available vacancies</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('suggestion'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif </br>
</div>
<div class="input-group">
    <form action="{{url('/search')}}" method="get">
        <div>
            <input type="search" name="query" class="search" placeholder="Search" />
            <button type="submit" class="search-button mdi mdi-magnify"></button>
        </div>
    </form>
            <?php $i=1; ?>
    <table style="margin-top:30px;margin-left:50px">  
        @foreach ($results as $result)
        <tr> 
            <td>
                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
            </td><td></td><td></td>
            <td class="card px-xl-6"> 
                <table><tr><td>
                <div style="padding-top:50px;padding-bottom:50px">
                    @foreach ($company as $com)
                        @if($com->id==$result->company_id)
                        <div style="margin-left:40px"><img src="{{asset('images/'.$com->logo)}}" width="200px" height="120px"></div>
                        @endif
                    @endforeach </td><td>
                        <?php $y=0; ?>
                    @foreach($emps as $emp)
                        @if($emp->post_id==$result->id)
                            <?php $y=$y+1; ?>
                        @endif
                    @endforeach
                    @if($y>0)
                        <div class="num-circle">
                            <a class="badge circle"><?php echo $y; ?>
                            <p class="description">Applications</p></a>
                        </div>
                    @endif</br>
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
                            {{csrf_field()}}                                                                                  
                        <!-- @foreach($company as $com)
                      @foreach ($vacancy as $vac)
                      @if($data->vacancy_id==$vac->id and $data->company_id==$com->id) -->
                      <a class="btn btn-primary" href="{{url('/vacancy/apply',$result->id)}}">Apply</a>
                      
                      <a class="btn btn-primary"  href="{{ url('/post/view',$result->id) }}">View</a>
                   <!-- @endif
                   @endforeach
                   @endforeach --></form>
                </div>
                    @if( \Carbon\Carbon::parse($result->created_at)->diffInMinutes(\Carbon\Carbon::now()) <60)
                        <div class="duration">{{\Carbon\Carbon::parse($result->created_at)->diffInMinutes(\Carbon\Carbon::now())}} minutes ago</div>
                    @else
                        @if( \Carbon\Carbon::parse($result->created_at)->diffInHours(\Carbon\Carbon::now()) <24)
                            <div class="duration">{{\Carbon\Carbon::parse($result->created_at)->diffInHours(\Carbon\Carbon::now())}} hours ago</div>
                        @else
                            <div class="duration">{{\Carbon\Carbon::parse($result->created_at)->diffInDays(\Carbon\Carbon::now())}} days ago</div>
                        @endif
                    @endif
                </div></td></tr></table>
            </td>
                <?php $i++; ?>    
        </tr>
        @endforeach
    </table>
</div>

@stop