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
<div class="navigate">
    <button type="button" class="add-resume" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Resume
    </button>
    <a href="#about"style="text-decoration:none;" class="navigate">About Us</a>
    <a href="#contact" style="text-decoration:none;" class="navigate">Contact Us</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Resume</h5>
      </div>
      <form action="{{url('/add/resume')}}" method="POST" id="form" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="modal-body">   
            <div class="mb-3">
                <label  class="form-label">Wanted Job Designation</label>
                <input type="text" placeholder="Eg:Office Administrator" name="title" class="form-control" required/>
            </div>
            <div class="mb-3">
                <label  class="form-label">Upload Your CV (in PDF)</label>
                <input type="file" placeholder="choose" name="cv" class="form-control" required/>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary add">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
        </div>
       </form>
    </div>
  </div>
</div>
<div class="input-group">
    <form action="{{url('/search')}}" method="get">
        <div>
            <input type="search" name="query" class="search" placeholder="Search" />
            <button type="submit" class="search-button mdi mdi-magnify"></button>
        </div>
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
                                <div style="margin-left:45px"><img src="{{asset('images/'.$com->logo)}}" style="background-color:#fff"></div>
                                @endif
                            @endforeach </td><td>
                            <div>
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
                        <div style="margin-left:60px">
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
                        <div style="margin-top:15px">
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
    <h1 style="margin-left:450px;margin-top:90px">ABOUT - US</h1>
    <div id="about" class="about">
        <p>You will be charged from Rs.2500 to publish the employment details of your company,</p>
        <p>Also You can see Job seekers details(Excepts your specific applicants for the post)
        When Job seeker's qualification matching with your employment details</p>
        </p>To sign in your own account (Click MyAccount button on top bar.)</p>
    </div> </br></br>
    <h1 style="margin-left:450px;margin-top:90px">CONTACT - US</h1>
    <div id="contact" class="contact">
        <table><tr>
        <td><img src="{{asset('images/map.png')}}"></td>
        <td>
        <div><i class="mdi mdi-map-marker">No 273, Aadiyapatham Road,</span><span>Kokuvil,Jaffna</i></div></br>
        <div><i class="mdi mdi-email">dfcjobslk@gmail.com</i></div></br>
        <div><i class="mdi mdi-phone-in-talk"><p>077-649-5791</p><p>021-435-8078</p></i></div></br>
        </td>
        </tr></table>
   
    </div>        
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script>
document.querySelector('#form').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault();
    Swal.fire({
        title:'Done',
        text: 'Employer will contact you, If your qualification match their requirements.Thank You:)',
        textColor:'blue',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed){
            form.submit();
        }
    });
});     
</script>
@stop