@extends('layouts.master.page')
<html>
<body>
@section('content')
<div class="main-panel">
<form action="{{url('ad/update',$result->id)}}" method="post" class="forms-sample">
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
                        <select class="form-control dropdown-selection2" name="advance_level" id="advance_level" required/>
                            @foreach ($advances as $advance => $key)
                        
                            <option value="{{ $key}}" {{old('advance_level',$key)?"selected" : ""}}>{{ $key }}</option>
                           
                            
                            
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="stream" id="stream" required/ >
                        @foreach($streams as $stream=>$key)
                            <option value="{{ $key}}" {{ old('stream',$key) ? "selected" : "" }}>{{$key}}</option>
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
                        <select required="required" class="form-control dropdown-selection2"  name="grad" required/>
                        @foreach ($graduations as $graduation => $key)
                        @if(old('graduate',$key)){
                        <option value="{{ $key}}" selected>{{$key}}</option>}
                        @else{
                        <option value="{{ $key}}">{{$key}}</option>}
                        @endif
                        @endforeach 
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
                <textarea class="form-control textarea1" name="other_quali" placeholder="Type here" required/>
                {{ old('other_quali',$result->other_quali) }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class=col>Gender preference</label>
                        <select class="form-control dropdown-selection2" name="gender" required/>
                            <option value="">Select gender</option>
                            <option value="{{ $result->gender }}" >Male</option>
                            <option value="{{ $result->gender }}">Female</option>
                            <option value="{{$result->gender }}">Any</option>
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
                        <input value="{{old('need', $result1->need)}}" type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control dropdown-selection2" required/>
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
                <input value="{{old('closing_date', $result1->closing_date)}}" type="date" placeholder="choose the closing date" name="closing_date" class="form-control dropdown-selection2" required/>
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
@stop
</body>
</html>