@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h2>Job Application Form</h2></div><br/>
    <form action="{{url('/vacancy/resume')}}" method="post" class="forms-sample">
        <div class="error">* required field</div></br>
        
            <div class="form-group row">
                <div class="col">
                    <label class="col-sm-3 col-form-label"><span class="error">*</span>First Name</label>
                    <div>
                        <input type="text" placeholder="firstname" name="fname" class="form-control input"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="col-sm-3 col-form-label"><span class="error">*</span>Last Name</label>
                    <div>      
                        <input type="text" placeholder="lastname" name="lname" class="form-control input" />      
                    </div>
                </div>
            </div>
            <div class="form-group row"> 
                <div class="col-md-6">
                    <label class=col><span class="error">*</span>NIC Number</label>
                    <div>
                        <input type="text" placeholder="nic number" name="nic" maxlength="12" class="form-control input"> 
                    </div>
                </div>
                <div class="col-md-6">
                    <label class=col><span class="error">*</span>Address</label>
                    <div>
                        <textarea name="address" placeholder="address" class="form-control textarea"></textarea>
                    </div>
                </div>
            </div>
                <div class="form-group row">        
                    <div class="col-md-6">
                        <label class=col><span class="error">*</span>Contact Number</label>
                        <div>
                            <input type="text" name="contact number" placeholder="mobile" maxlength="10" class="form-control input">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label class=col><span class="error">*</span>Email Address</label>
                        <div>
                            <input type="text" name="email" placeholder="abc@gmail.com" class="form-control input">
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col><span class="error">*</span>A/L Qualification</label>
                <select class="form-control dropdown-selection" id="exampleSelectGender" name="al" style="height:40px">
                    <option>Select the status...</option>
                    <option>Qualified</option>
                    <option>Not Qualified</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Stream</label>
                <select class="form-control dropdown-selection" id="exampleSelectGender" name="stream" style="height:40px">
                    <option>Select stream...</option>
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
                <select class="form-control dropdown-selection" id="exampleSelectGender" name="grad" style="height:40px">
                    <option>Select your top graduation...</option>
                    <option>Diploma</option>
                    <option>Higher Diploma</option>
                    <option>Degree</option>
                    <option>Master Degree</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Field</label>
                <select class="form-control dropdown-selection" id="exampleSelectGender" name="subj" style="height:40px">
                    <option>Select the subject/field...</option>
                    <option>Infomation Technology</option>
                    <option>Computer Science</option>
                    <option>English</option>
                    <option>Software Engineering</option>
                    <option>Physical Science</option>
                    <option>Bio Science</option>
                    <option>Agreeculture</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Recognized University</label>
                <select class="form-control dropdown-selection" id="exampleSelectGender" name="stream" style="height:40px">
                    <option>Select recognized university...</option>
                    <option>University Of Jaffna</option>
                    <option>University Of Colombo</option>
                    <option>University Of Moratuwa</option>
                    <option>University Of kelaniya</option>
                    <option>University Of Peradeniya</option>
                </select></td></tr></table>
            </div>
        </div>
        </br></br>
        <input type="submit" value="Apply" class="btn btn-primary">
    </form>
</div>

@stop