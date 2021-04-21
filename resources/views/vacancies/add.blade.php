@extends('layouts.master.page')
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
</head>
<body>
@section('content')
<div class="main-panel">
<h1 class="page-title" >Post New Vacancy</h1>
@foreach($data as $com)
@endforeach
<form action="{{url('/list')}}" method="post" class="forms-sample" id="form">
        {{csrf_field()}}
    <div class="row">
    <div class="col-lg-24 grid-margin">
    <div class="shadow card">
        <div class="form-group row" style="margin-top:30px"> 
        <table><tr><td>       
		    <div class="col-md-6">
                <label class="col">Company Name</label>
                <input type="text" class="form-control input1" name="company" value="{{$com->name}}" size="50px" />
            </div></td><td>
            <div class="col-md-6">
                <label class="col">Branch Name</label>
                <input type="text" class="form-control input1" name="branch" size="50px" placeholder="Eg: jaffna" />
            </div></td></tr></table>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="col">Title Of Job</label>
                <select class="js-example-basic-single form-control dropdown-selection1" name="title" required/>
                    <option value="" style="color:black;">Select vacancy type.... </option>
                        @foreach ($vacancies as $list) 
                            {
                                <option value="{{ $list->title }}">{{ $list->title }}</option>
                            }
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <h5>Required Educational Qualification</h5>
                <div class="col-md-9 grid-margin stretch-card">
                    <table><tr><td>
                    <label class=col onkeyup="stoppedTyping()">A/L Qualified</label>
                        <select class="form-control dropdown-selection2" name="advance_level" id="advance_level" required/>
                            <option value="">Select.. </option>
                            @foreach ($advances as $advance => $key)
                                    <option>{{ $key }}</option>
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="stream" id="stream" required/ >
                            <option value="">Select stream...</option>
                            @foreach ($streams as $stream => $key)
                                    <option>{{ $key }}</option>
                            @endforeach
                        </select></td></tr></table>
                        
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="col-md-9 grid-margin stretch-card">
                    <div class="form-group">
                        <table><tr><td>
                        <label class=col>Graduation</label>
                        <select class="form-control dropdown-selection2"  name="grad" required/>
                            <option value="" style="color:#000">Wanted graduation...</option>
                            @foreach ($graduations as $grad => $key)
                                    <option>{{ $key }}</option>
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                        <label class=col>Field</label>
                        <select class="form-control dropdown-selection2" name="field" required/>
                            <option value="">Select the subject/field...</option>
                            @foreach ($fields as $field => $key)
                                    <option>{{ $key }}</option>
                            @endforeach
                        </select></td></tr></table>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class=col>Required Other Qualification</label>
                <textarea class="form-control textarea1" name="other_quali" placeholder="Type here" required/></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class=col>Gender preference</label>
                        <select class="form-control dropdown-selection2" id="exampleSelectGender" name="gender" required/>
                            <option value="">Select gender</option>
                            @foreach ($gender as $sex => $key)
                                    <option>{{ $key }}</option>
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Age Limit</label>
                    <input type="text" class="form-control dropdown-selection2" name="age_limit" placeholder="Type age limit eg:22-30" required/>
                    </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class="col">Needed Employee</label>
                        <input type="number" min="1" placeholder="No of needed employee" name="need" class="form-control dropdown-selection2" required/>
                        </td><td></td><td></td><td></td><td></td><td>
                    <label class="col">Experience</label>
                        <input type="text" placeholder="experience" name="experience" class="form-control dropdown-selection2" required/>
                        </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Salary (monthly)</label>
                <input type="text" placeholder="Eg: 15000-20000" name="salary" class="form-control input1" required/>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Closing Date</label>
                <input type="date" placeholder="choose the closing date" name="closing_date" class="form-control dropdown-selection2" required/>
            </div>
        </div></br></br>
        <div class="form-group row">        
		    <div class="col-md-6">
                <input type="submit" value="Publish"  class="btn btn-primary"></br></br>
            </div>
        </div>
    </div>
    </div>
    </div>
 </form>
</div>

<script src="{{asset('js/app.js')}}"></script> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
<script>
document.querySelector('#form').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault();
    Swal.fire({
        icon: 'success',
        title: 'Your vacancy has been published',
        showConfirmButton:false,
        timer: 2000
            }).then((result) => {
                form.submit();
            
            });
}); 
</script>        
@stop
</body>
</html>