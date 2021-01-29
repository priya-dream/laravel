@extends('layouts.master.page')
@section('content')
<div class="main-panel">
    <form action="{{url('/vacancy/resume')}}" method="post" class="forms-sample">
        <div class="error">* required field</div></br>
        <div class="form-group">
            <label class=col><span class="error">*</span>First Name</label>
            <input type="text" placeholder="firstname" name="fname" class="form-control">
        </div>
        <div class="form-group">
            <label class=col><span class="error">*</span>Last Name</label>
            <input type="text" placeholder="lastname" name="lname" class="form-control">
        </div>
        <div class="form-group">
            <label class=col><span class="error">*</span>NIC Number</label>
            <input type="text" placeholder="nic number" name="nic" maxlength="12" class="form-control"> 
        </div>
        <?php
        //echo $_POST['nic'];
        ?>
        <div class="form-group">
            <label class=col><span class="error">*</span>Address</label>
            <textarea name="address" placeholder="address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label class=col><span class="error">*</span>Contact Number</label>
            <input type="text" name="contact number" placeholder="mobile" maxlength="10" class="form-control">
        </div>
        <div class="form-group">
            <label class=col><span class="error">*</span>Email Address</label>
            <input type="text" name="email" placeholder="abc@gmail.com" class="form-control">
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col><span class="error">*</span>A/L Qualification</label>
                <select class="form-control" id="exampleSelectGender" name="al">
                    <option>Select the status...</option>
                    <option>Qualified</option>
                    <option>Not Qualified</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Stream</label>
                <select class="form-control" id="exampleSelectGender" name="stream">
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
                <select class="form-control" id="exampleSelectGender" name="grad">
                    <option>Select your top graduation...</option>
                    <option>Diploma</option>
                    <option>Higher Diploma</option>
                    <option>Degree</option>
                    <option>Master Degree</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col><span class="error">*</span>Field</label>
                <select class="form-control" id="exampleSelectGender" name="subj">
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
                <select class="form-control" id="exampleSelectGender" name="stream">
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