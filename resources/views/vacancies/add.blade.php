@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Post New Vacancy</h1></div><br/><br/>
  <form action="{{url('')}}" method="post" class="forms-sample">
          {{csrf_field()}}

    <div class="form-group row">    
        <div class="col-sm-8">
            <select class="form-control" id="selectUser" name="user_selected" required focus>
                <option value="" disabled selected>select vacancy type</option>        
                
            </select>
        </div>
        <label class="col-sm-4 col-form-label"  id="displayUser">Show selected User here</label>
    </div>
 <input type="submit" value="Save">
 </form>
</div>
</div>
@stop