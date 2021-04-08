@extends('layouts.master.page')
<html>
<body>
@section('content')
<div class="main-panel">
@foreach($results as $result)
<form action="{{url('/update')}}" method="post" class="forms-sample">
        {{csrf_field()}}
    <div class="row">
    <div class="col-lg-24 grid-margin">
    <div class="shadow card"></br>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="col">Job Type</label>
                <select class="js-example-basic-single form-control dropdown-selection1" name="title" required/>
                    <option value="">Select vacancy type.... </option>
                        @foreach ($vacancies as $list) 
                            {
                                <option value="{{$list->title}}" {{$list->id==$result->vacancy_id ? 'selected' : ""}} >{{ $list->title }}</option>
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
                        <select class="form-control dropdown-selection2" name="advances[]" id="advance_level" required/>
                            @foreach ($advances as $advance => $key)
                            <option value="{{ $key}}" {{ (old("advances") == $key ? "selected":"") }}>{{ $key }}</option>
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="streams[]" id="stream" required/ >
                        @foreach ($streams as $stream => $key)
                            <option value="{{ $key}}" {{ (old("streams") == $key ? "selected":"") }}>{{ $key }}</option>
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
                        <select value="{{old('grad', $result->graduate)}}" class="form-control dropdown-selection2"  name="grad" required/>
                            <option value="">Wanted graduation...</option>
                            <option>Diploma</option>
                            <option>Higher Diploma</option>
                            <option>Degree</option>
                            <option>Master Degree</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                        <label class=col>Field</label>
                        <select value="{{old('field', $result->field)}}" class="form-control dropdown-selection2" name="field" required/>
                            <option value="">Select the subject/field...</option>
                            <option>Infomation Technology</option>
                            <option>Computer Science</option>
                            <option>English</option>
                            <option>Software Engineering</option>
                            <option>Physical Science</option>
                            <option>Bio Science</option>
                            <option>Agriculture</option>
                            <option>Any</option>
                        </select></td></tr></table>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class=col>Required Other Qualification</label>
                <textarea value="{{old('other_quali', $result->other_quali)}}" class="form-control textarea1" name="other_quali" placeholder="Type here" required/></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class=col>Gender preference</label>
                        <select class="form-control dropdown-selection2" name="gender" required/>
                            <option value="">Select gender</option>
                            @if (Input::old('gender') == $result->gender)
                            <option value="{{ $result->gender }}" selected>Male</option>
                            @else
                            <option value="{{ $result->gender }}">Female</option>
                            <option value="{{$result->gender }}">Any</option>
                            @endif
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Age Limit</label>
                    <input value="{{old('age', $result->age)}}" type="text" class="form-control dropdown-selection2" name="age_limit" placeholder="Type age limit eg:22-30" required/>
                    </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class="col">Needed Employee</label>
                        <input value="{{old('need', $result->need)}}" type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control dropdown-selection2" required/>
                        </td><td></td><td></td><td></td><td></td><td>
                    <label class="col">Experience</label>
                        <input value="{{old('experience', $result->experience)}}" type="text" placeholder="experience" name="experience" class="form-control dropdown-selection2" required/>
                        </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Salary (monthly)</label>
                <input value="{{old('salary', $result->salary)}}" type="text" placeholder="salary" name="salary" class="form-control input1" required/>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Closing Date</label>
                <input value="{{old('closing_date', $result->closing_date)}}" type="date" placeholder="choose the closing date" name="closing_date" class="form-control dropdown-selection2" required/>
            </div>
        </div></br></br>
        <div class="form-group row">        
		    <div class="col-md-6">
                <input type="submit" value="Update" class="btn btn-primary"></br></br>
            </div>
        </div>
    </div>
    </div>
    </div>
 </form>
</div>
<script src="{{asset('js/app.js')}}"></script> 
@endforeach
@stop
</body>
</html>