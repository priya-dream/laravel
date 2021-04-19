@extends('layouts.master.page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
@section('content')
<div class="main-panel">
<div><h2 class="page-title">Job Application Form</h2></div><br/>
    <form  action="{{ url('employee/resume')}}" method="post" class="forms-sample" id="form">
    {{csrf_field()}}
    @foreach($posts as $post)
      <div>
      <input type="hidden" name="post_id" value="{{$post->id}}">
      </div>
    @endforeach
    <div class="error">* required field</div></br>
        <div class="row" style="margin-left:70px">
        <div class="col-lg-24 grid-margin">
        <div class="shadow card">
            <div class="form-group row" style="margin-top:30px">        
		        <div class="col-md-6">
			        <label class="col"><span class="error">*</span>First Name</label>
			        <div>
				        <input type="text" name="fname" id="fname" placeholder="firstname" class="form-control input" required/>
			        </div>
		        </div>
		        <div class="col-md-4">
			        <label class="col"><span class="error">*</span>Last Name</label>
			        <div>
				        <input type="text" name="lname" id="lname" placeholder="lastname" class="form-control input" required/>
			        </div>
		        </div>
	        </div>
	        <div class="form-group row">        
		        <div class="col-md-6">
			        <label class="col"><span class="error">*</span>NIC Number</label>
			        <div>
				        <input type="text" name="nic" id="nic" placeholder="nic number" maxlength="12" class="form-control input" required/>
			        </div>
		        </div>
		        <div class="col-md-4">
			        <label class=col><span class="error">*</span>Address</label>
			        <div>
				        <textarea cols="20" name="address" id="address" placeholder="address" class="form-control input" style="width:350px;font-size:15px" required/></textarea>
			        </div>
		        </div>
	        </div>
	    <div class="form-group row">        
		    <div class="col-md-6">
			    <label class=col><span class="error">*</span>Contact Number</label>
			    <div>
				    <input type="text" name="mobile" id="mobile" placeholder="mobile" maxlength="10" class="form-control input" required/>
			    </div>
		    </div>
		    <div class="col-md-4">
			    <label class="col"><span class="error">*</span>Email Address</label>
			    <div>
				    <input type="text" name="email" id="email" placeholder="abc@gmail.com" class="form-control input" required/>
			    </div>
		    </div>
	    </div>
            
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col><span class="error">*</span>A/L Qualification</label>
                <select class="form-control dropdown-selection" name="al" id="advance_level" style="height:40px;font-size:15px" required/>
                    <option value="">Select the status...</option>
                    @foreach ($advances as $advance => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                    
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Stream</label>
                <select class="form-control dropdown-selection" name="stream" id="stream" style="height:40px;font-size:15px" required/>
                    <option value="">Select stream...</option>
                    @foreach ($streams as $stream => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select></td></tr></table>
            </div>
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col>Graduation</label>
                <select class="form-control dropdown-selection" name="grad" style="height:40px;font-size:15px"">
                    <option value="">Select your top graduation...</option>
                    @foreach ($graduations as $graduation => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Field</label>
                <select class="form-control dropdown-selection" name="subj" style="height:40px;font-size:15px"">
                    <option value="">Select the subject/field...</option>
                    @foreach ($fields as $field => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Recognized University</label>
                <select class="form-control dropdown-selection" placeholder="hi" name="uni" style="height:40px;font-size:15px"">
                    <option value="">Select recognized university...</option>
                    <option>University Of Jaffna</option>
                    <option>University Of Colombo</option>
                    <option>University Of Moratuwa</option>
                    <option>University Of kelaniya</option>
                    <option>University Of Peradeniya</option>
                </select></td></tr></table>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
			    <label class=col>Mention other skills/qualifications</label>
			    <div>
				    <textarea type="text" name="other_quali" placeholder="qualifications" class="form-control input"/></textarea>
			    </div>
		    </div>
        <div>
        </br></br>
        <div class="form-group row"> 
                <div class="col-md-6">
                    <div>
                    <input type="submit" id="btn" value="Apply" class="btn btn-primary" style="margin-left:40px">
                    </div>
                </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
<script>
document.querySelector('#form').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault();
    Swal.fire({
                title:'Good Job',
                text: 'Application is submitted successfully',
                icon: 'success'
            }).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
            });
});         
</script>
@stop