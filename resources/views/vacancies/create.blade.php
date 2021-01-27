@extends('layouts.master.page')
@section('content')
        <div class="main-panel">  
              <div><h3 class="mb-0">Publish New Job</h3></div><br/>         
            <form action="{{ route('vacancy.store') }}" method="POST" class="forms-sample">
              @csrf
                      <div class="form-group">
                        <label class=col>Title</label>
                        <input type="text" class="form-control" name="title"placeholder="Title" />
                      </div>
                      <div class="form-group">
                        <label class=col>Company</label>
                        <input type="text" class="form-control" name="company"placeholder="company" />
                      </div>
                      <div class="form-group">
                        <label>Closing Date</label>
                        <input type="date" class="form-control"  name="closing_date" placeholder="Closing date" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button class="btn btn-light">Cancel</button>
            </form> 
          </div>
          
          
@stop