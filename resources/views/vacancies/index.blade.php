@extends('layouts.master.page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
@section('content')
<div>
    @if ($error = Session::get('error'))
        <div class="alert alert-danger1">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    @if ($message = Session::get('suggestion'))
        <div class="alert alert-danger1">
            <p>{{ $message }}</p>
        </div>
    @endif </br>
    @if ($error = Session::get('alert'))
        <div class="alert alert-danger1">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    <h3 class="page-title" style="margin-top:50px;font-family:Broadway"> Available vacancies</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
</div>
<div class="input-group">
    <form action="{{url('/search')}}" method="get">
        <div>
            <input type="search" name="query" class="search" placeholder="Search" />
            <button type="submit" class="search-button mdi mdi-magnify"></button>
        </div>
    </form>
            <?php $i=1; ?>
            <!-- <div class="col-md-6 form-group">
                <select class="form-control dropdown-selection" style="width:150px">
                <option value="">Job Type</option>
                <option>Full Time</option>
                <option>Part Time</option>
                </select>
            </div></br></br>
            <div class="col-md-6 form-group">
                <select class="form-control dropdown-selection" style="width:150px">
                <option value="">Location</option>
                <option>Jaffna</option>
                <option>Colombo</option>
                </select>
            </div> -->
    <div class="row" style="margin-top:30px"> 
        <div class="col-md-4 grid-margin stretch-card" >
            <div class="card" style="padding-top:30px">
                <label class="col">Location</lable>
                <input type="text" class="form-control" name="Location" placeholder="Type here"></br>
                <form action="{{url('/post/type_search')}}" method="post">
                @csrf
                <label class="col">Job Type</lable>
                <table><tr><td>
                <select class="form-control" name="type" style="width:220px">
                    <option>All</option>
                    <option>Full time</option>
                    <option>Part time</option>
                    <option>Internship</option>
                </select></td>
                <td><button type="submit" class="mdi mdi-arrow-right-bold btn-secondary" style="border:none;font-size:30px;color:blue"></button></td></tr></table>
                </form>
            </div>
        <div class="grid-margin stretch-card">
            <div class="card">
            <table>
                @foreach ($results as $result)
                <tr> 
                    <td>
                        <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
                    </td><td></td><td></td>
                    <td class="card px-xl-6"> 
                        <table><tr><td>
                        <div style="padding-bottom:10px">
                            @foreach ($company as $com)
                                @if($com->id==$result->company_id)
                                <div style="margin-left:5px"><img src="{{asset('images/'.$com->logo)}}" width="170px" height="120px"></div>
                                @endif
                            @endforeach </td><td>
                            <div style="margin-left:5px;">
                                <?php $y=0; ?>
                            @foreach($emps as $emp)
                                @if($emp->post_id==$result->id)
                                    <?php $y=$y+1; ?>
                                @endif
                            @endforeach
                            @if($y>0)
                                <div class="num-circle">
                                    <a class="badge circle"><span style="color:#fff"><?php echo $y; ?> </span>
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
                        <div><h4 class="sub-text">Closing Date : {{$result->closing_date}}</h4></div>
                        <div>
                            <form action="" method="POST">  
                                    {{csrf_field()}} 
                            <a class="btn btn-primary" style="margin-left:60px"  href="{{url('/vacancy/apply',$result->id)}}">Apply</a>
                            <a class="btn btn-primary" style="margin-left:10px"  href="{{ url('/post/view',$result->id) }}">View</a>
                        </form>
                        </div>
                            @if( \Carbon\Carbon::parse($result->updated_at)->diffInMinutes(\Carbon\Carbon::now()) <60)
                                <div class="duration">{{\Carbon\Carbon::parse($result->updated_at)->diffInMinutes(\Carbon\Carbon::now())}} minutes ago</div>
                            @else
                                @if( \Carbon\Carbon::parse($result->updated_at)->diffInHours(\Carbon\Carbon::now()) <24)
                                    <div class="duration">{{\Carbon\Carbon::parse($result->updated_at)->diffInHours(\Carbon\Carbon::now())}} hours ago</div>
                                @else
                                    <div class="duration">{{\Carbon\Carbon::parse($result->updated_at)->diffInDays(\Carbon\Carbon::now())}} days ago</div>
                                @endif
                            @endif
                        </div></div></td></tr></table>
                    </td>
                        <?php $i++; ?>    
                </tr>
                @endforeach
            </table>
            </div>
        </div>
        </div>
    </div>
           
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>


@stop