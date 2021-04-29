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
                <h3 style="margin-left:60px">Educational Qualifications</h3>
                <table>
                 <tr>
                    <td>
                    <table><tr><h4 style="margin-left:60px">Ordinary Level(O/L)</h4></tr>
				        <tr>
						  <th><label class="col" style="margin-left:30px">Grade</label></th>
                          <th><label class="col">Count</label></th></tr>
                        <tr><td>
							<select class="form-control dropdown-selection2" name="ol" id="ol" style="width:150px;height:35px" />
								<option value="">Select </option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>S</option>
							</select></td><td>
                            <input type="number" name="num" min=0 max=9 class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                        <tr><td>
							<select class="form-control dropdown-selection2" name="ol1" id="ol" style="width:150px;height:35px" />
								<option value="">Select </option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>S</option>
							</select></td><td>
                            <input type="number" min=0 max=9 name="num1" class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                        <tr><td>
							<select class="form-control dropdown-selection2" name="ol2" id="ol" style="width:150px;height:35px" />
								<option value="">Select </option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>S</option>
							</select></td><td>
                            <input type="number" min=0 max=9 name=num2 class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                        <tr><td>
							<select class="form-control dropdown-selection2" name="ol3" id="ol" style="width:150px;height:35px" />
								<option value="">Select </option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>S</option>
							</select></td><td>
                            <input type="number" min=0 max=9 name="num3" class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td>
                    </tr></table>
                    </td>
                    <td>			
						<table><tr><h4 style="margin-left:40px">Advance Level(A/L)</h4></tr>
                          <tr>
							<th><label class="col" style="margin-left:30px">Grade</label></th>
							<th><label>Count</label></th>
                          </tr>
                          <tr><td>
							  <table>
                                <tr><td>
                                    <select class="form-control dropdown-selection2" name="al" id="al" style="width:150px;height:35px" />
                                        <option value="">Select </option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>S</option>
                                    </select></td><td>
                                    <input type="number" min=0 max=3 name="no" class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                                <tr><td>
                                    <select class="form-control dropdown-selection2" name="al1" id="al" style="width:150px;height:35px" />
                                        <option value="">Select </option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>S</option>
                                    </select></td><td>
                                    <input type="number" min=0 max=3 name="no1" class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                                <tr><td>
                                    <select class="form-control dropdown-selection2" name="al2" id="al" style="width:150px;height:35px" />
                                        <option value="">Select </option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>S</option>
                                    </select></td><td>
                                    <input type="number" min=0 max=3 name="no2" class="form-control" style="width:100px;margin-left:10px;margin-top:10px"></td></tr>
                                <tr><td>
                                    <select class="form-control dropdown-selection2" name="al3" id="al" style="width:150px;height:35px" />
                                        <option value="">Select </option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>S</option>
                                    </select></td><td>
                                    <input type="number" min=0  max=3 name="no3" class="form-control" style="width:100px;margin-left:10px;margin-top:10px">
                                </td></tr>
							 </table>
                            </td></tr>
                        </table>
					</td><td>
                        <div style="margin-bottom:160px">
                        <h4><label  class="col">Stream(A/L)</label><h4>
                        <select class="form-control dropdown-selection2" name="stream" id="stream"  style="width:260px" required/ >
                            <option value="">Select...</option>
                            @foreach ($streams as $stream => $key)
                                <option>{{ $key }}</option>
                            @endforeach
                        </select>
                        </div>
                    </td>
                   </tr>
                </table>
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
                <label class=col>Field/Subject</label>
                <?php sort($fields); ?>
                <select class="form-control dropdown-selection" name="subj" style="height:40px;font-size:15px"">
                    <option value="">Select the subject/field...</option>
                    @foreach ($fields as $field => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Recognized University</label>
                <select class="form-control dropdown-selection" name="uni" style="height:40px;font-size:15px;width:350px">
                    <option value="">Select recognized university...</option>
                    @foreach ($uni as $uni => $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select></td></tr></table>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
			    <label class=col>Mention other skills/qualifications</label>
			    <div>
				    <textarea type="text" name="other_quali" placeholder="Type here" class="form-control textarea1"/></textarea>
			    </div>
		    </div>
        <div>
        </br></br>
        <div class="form-group row"> 
                <div class="col-md-6">
                    <div>
                    <input type="submit" id="btn" value="Apply" class="btn1 btn-primary" style="margin-left:40px">
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