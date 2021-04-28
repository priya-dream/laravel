@extends('layouts.master.page')
@section('content')
<div>
    @if ($error = Session::get('error'))
        <div class="alert alert-danger">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    <h3 class="page-title" style="margin-top:40px"> Available vacancies</h3>
    @if ($message = Session::get('nothing'))
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
                    <option value="{{url('/post')}}">All</option>
                    <option value="{{url('/post/type_search')}}" selected>Full time</option>
                    <option>Part time</option>
                    <option>Internship</option>
                </select></td>
                <td><button type="submit"class="mdi mdi-arrow-right-bold " style="border:none;font-size:20px;background-color:#fff;color:blue"></button></td></tr></table>
                </form>
            </div>
        <div class="grid-margin stretch-card">
            <div class="card">
            @if($count!=0)
                <table>
                    @foreach ($result as $res)
                        <tr>     
                            <td>
                                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
                            </td><td></td><td></td>
                            <td class="card px-xl-6"> 
                                <table><tr><td>
                                    <div style="padding-bottom:10px">
                                    <div style="margin-left:5px"><img src="{{asset('images/'.$res->logo)}}" width="170px" height="120px"></div>
                                    </td><td> 
                                        <?php $y=0; ?>
                                @foreach($apps as $app)
                                    @if($app->post_id==$res->id)
                                        <?php $y=$y+1; ?>
                                    @endif
                                @endforeach
                                @if($y>0)
                                    <div class="num-circle">
                                        <a class="badge circle"><?php echo $y; ?>
                                        <p class="description">Applications</p></a>
                                    </div>
                                @endif</br>
                                    <div><h4 class="sub-text">Designation : {{$res->title}}</h4></div>
                                    <div><h4 class="sub-text">Company Name : {{$res->name}}</h4></div>
                                    <div><h4 class="sub-text">Closing Date : {{$res->closing_date}}</h4></div></br>
                                    <div>
                                        <form action="" method="POST">  
                                                {{csrf_field()}}                                                                                  
                                            <a class="btn btn-primary" href="{{url('/vacancy/apply',$res->id)}}">Apply</a>
                                            <a class="btn btn-primary"  href="{{ url('/post/view',$res->id) }}">View</a>
                                        </form>
                                    </div>
                                    @if( \Carbon\Carbon::parse($res->created_at)->diffInMinutes(\Carbon\Carbon::now()) <60)
                                        <div class="duration">{{\Carbon\Carbon::parse($post->created_at)->diffInMinutes(\Carbon\Carbon::now())}} minutes ago</div>
                                    @else
                                        @if( \Carbon\Carbon::parse($res->created_at)->diffInHours(\Carbon\Carbon::now()) <24)
                                            <div class="duration">{{\Carbon\Carbon::parse($res->created_at)->diffInHours(\Carbon\Carbon::now())}} hours ago</div>
                                        @else
                                            <div class="duration">{{\Carbon\Carbon::parse($res->created_at)->diffInDays(\Carbon\Carbon::now())}} days ago</div>
                                        @endif
                                    @endif
                            </div></td></tr></table>
                            </td>
                                <?php $i++; ?> 
                        </tr>
                    @endforeach
                </table>
            @else
            <div class="no-result">No Results !!.</div>
            @endif
            </div>
        </div>
        </div>
    </div>
</div>
@stop