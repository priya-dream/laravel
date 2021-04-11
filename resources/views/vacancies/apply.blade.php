@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h2 class="page-title">Job Application Form</h2></div><br/>
    <form action="{{url('/employee/resume')}}" method="post" class="forms-sample">
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
				        <input type="text" name="fname" placeholder="firstname" class="form-control input" required/>
			        </div>
		        </div>
		        <div class="col-md-4">
			        <label class="col"><span class="error">*</span>Last Name</label>
			        <div>
				        <input type="text" name="lname" placeholder="lastname" class="form-control input" required/>
			        </div>
		        </div>
	        </div>
	        <div class="form-group row">        
		        <div class="col-md-6">
			        <label class="col"><span class="error">*</span>NIC Number</label>
			        <div>
				        <input type="text" name="nic" placeholder="nic number" maxlength="12" class="form-control input" required/>
			        </div>
		        </div>
		        <div class="col-md-4">
			        <label class=col><span class="error">*</span>Address</label>
			        <div>
				        <textarea cols="20" name="address" placeholder="address" class="form-control input" style="width:350px;font-size:15px" required/></textarea>
			        </div>
		        </div>
	        </div>
	    <div class="form-group row">        
		    <div class="col-md-6">
			    <label class=col><span class="error">*</span>Contact Number</label>
			    <div>
				    <input type="text" name="mobile" placeholder="mobile" maxlength="10" class="form-control input" required/>
			    </div>
		    </div>
		    <div class="col-md-4">
			    <label class="col"><span class="error">*</span>Email Address</label>
			    <div>
				    <input type="text" name="email" placeholder="abc@gmail.com" class="form-control input" required/>
			    </div>
		    </div>
	    </div>
            
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col><span class="error">*</span>A/L Qualification</label>
                <select class="form-control dropdown-selection" name="al" style="height:40px;font-size:15px" required/>
                    <option value="">Select the status...</option>
                    <option>Qualified</option>
                    <option>Not Qualified</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Stream</label>
                <select class="form-control dropdown-selection" name="stream" style="height:40px;font-size:15px" required/>
                    <option value="">Select stream...</option>
                    <option>Physical Science(Maths)</option>
                    <option>Biological Science</option>
                    <option>Commerce</option>
                    <option>Arts</option>
                    <option>Technology</option>
                </select></td></tr></table>
            </div>
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col>Graduation</label>
                <select class="form-control dropdown-selection" name="grad" style="height:40px;font-size:15px"">
                    <option value="">Select your top graduation...</option>
                    <option>Diploma</option>
                    <option>Higher Diploma</option>
                    <option>Degree</option>
                    <option>Master Degree</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Field</label>
                <select class="form-control dropdown-selection" name="subj" style="height:40px;font-size:15px"">
                    <option value="">Select the subject/field...</option>
                    <option>Infomation Technology</option>
                    <option>Computer Science</option>
                    <option>English</option>
                    <option>Software Engineering</option>
                    <option>Physical Science</option>
                    <option>Bio Science</option>
                    <option>Agreeculture</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Recognized University</label>
                <select class="form-control dropdown-selection" name="uni" style="height:40px;font-size:15px"">
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
			    <label class=col>Mention other skills/qualificatons</label>
			    <div>
				    <textarea type="text" name="other_quali" placeholder="qualifications" class="form-control input"/></textarea>
			    </div>
		    </div>
        <div>
        </br></br>
        <div class="form-group row"> 
                <div class="col-md-6">
                    <div>
                    <input type="submit" value="Apply" class="btn btn-primary" style="margin-left:40px">
                    </div>
                </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    
    </form>
   
</div>

@stop