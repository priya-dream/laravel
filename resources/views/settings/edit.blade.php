@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<form action="{{url('ad/update',$result->id)}}" method="post" class="forms-sample" id="form">
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
                            @foreach ($advances as $advance => $val)
                            @if (old('advance_level', $result->advance_level) == $val)
                                <option value="{{ $val }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endif
                                
                            @endforeach
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="stream" required/ >
                            @foreach($streams as $key=>$val)
                            @if (old('stream', $result->stream) == $val)
                                <option value="{{ $val }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endif
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
                        @foreach ($graduations as $graduation => $val)
                            @if (old('grad', $result->graduate) == $val)
                                <option value="{{ $val }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endif
                        @endforeach 
                        </select></td><td></td><td></td><td></td><td></td><td>
                        <label class=col>Field</label>
                        <select class="form-control dropdown-selection2" name="field" required/>
                        @foreach ($fields as $field => $val)
                            @if (old('field', $result->field) == $val)
                                <option value="{{ $val }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endif
                        @endforeach 
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
                        @foreach ($gender as $sex => $val)
                            @if (old('gender', $result->gender) == $val)
                                <option value="{{ $val }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $val }}">{{ $val }}</option>
                            @endif
                        @endforeach 
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
		    <div class="col-md-6" style="margin-left:200px">
                <input type="submit" value="Update" class="btn1 btn-primary">
                <a href="{{ url('myaccount/posts',$data->company_id)}}" style="margin-left:20px"><input type="button" value="Back" class="btn1 button"></a>
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
                title:'Changes are updated',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then((result) => {
                form.submit();
            });
});         
</script>
@stop
