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
            <button class="all-post" onclick="location.href='/post';">All Posts</button>
            <div class="search-box">
                    <form action="{{url('/post/type_search')}}" method="post" id="select-option">
                            @csrf
                        <label class="col">Location</label>
                        <select class="form-control" name="location" style="width:220px;margin-left:15px">
                            @foreach($location as $loc)
                                <option value="{{$loc->branch}}" @if($loc->branch == $location) selected @endif>{{$loc->branch}}</option>
                            @endforeach
                        </select></br>
                        <label class="col">Job Type</lable>
                        <select class="form-control" name="type" style="width:220px">
                            <option>Full time</option>
                            <option>Part time</option>
                            <option>Internship</option>
                        </select></br>
                        <button type="submit" class="search-arrow">Get</button>
                    </form>
                </div>
            </div>
        <div class="grid-margin stretch-card">
            <div class="card">
            @if($count!=0)
                <table>
                    @foreach ($posts as $post)
                        <tr>     
                            <td>
                                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
                            </td><td></td><td></td>
                            <td class="card px-xl-6"> 
                                <table><tr><td>
                                    <div style="padding-bottom:10px">
                                    <div style="margin-left:45px"><img src="{{asset('images/'.$post->logo)}}"></div>
                                    </td><td> 
                                        <?php $y=0; ?>
                                @foreach($apps as $app)
                                    @if($app->post_id==$post->id)
                                        <?php $y=$y+1; ?>
                                    @endif
                                @endforeach
                                @if($y>0)
                                    <div class="num-circle">
                                        <a class="badge circle"><?php echo $y; ?>
                                        <p class="description">Applications</p></a>
                                    </div>
                                @endif</br>
                                <div style="margin-left:60px">
                                    <div><h4 class="sub-text">Designation : {{$post->title}}</h4></div>
                                    <div><h4 class="sub-text">Company Name : {{$post->name}}</h4></div>
                                    <div><h4 class="sub-text">Closing Date : {{$post->closing_date}}</h4></div></br>
                                    <div>
                                        <form action="" method="POST">  
                                                {{csrf_field()}}                                                                                  
                                            <a class="btn btn-primary" href="{{url('/vacancy/apply',$post->id)}}">Apply</a>
                                            <a class="btn btn-primary"  href="{{ url('/post/view',$post->id) }}">View</a>
                                        </form>
                                    </div>
                                    @if( \Carbon\Carbon::parse($post->created_at)->diffInMinutes(\Carbon\Carbon::now()) <60)
                                        <div class="duration">{{\Carbon\Carbon::parse($post->created_at)->diffInMinutes(\Carbon\Carbon::now())}} minutes ago</div>
                                    @else
                                        @if( \Carbon\Carbon::parse($post->created_at)->diffInHours(\Carbon\Carbon::now()) <24)
                                            <div class="duration">{{\Carbon\Carbon::parse($post->created_at)->diffInHours(\Carbon\Carbon::now())}} hours ago</div>
                                        @else
                                            <div class="duration">{{\Carbon\Carbon::parse($post->created_at)->diffInDays(\Carbon\Carbon::now())}} days ago</div>
                                        @endif
                                    @endif
                            </div></div></td></tr></table>
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