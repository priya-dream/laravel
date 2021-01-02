@extends('layouts.master.page')
@section('content')
<div class="main-panel">
    <div><h1 class="page-title">Vacancy Details</h1></div><br/><br/>
    

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Company :
                {{ $request->company }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Title :
                {{ $request->title }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Closing Date :
                {{ $request->closing_date }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Gender Preference :
                {{ $request->gender}}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Age Limit :
                {{ $request->age }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="color:#4169E1">Needed Person :
                {{ $request->need }}</strong>
            </div>
        </div>
    </div>
    




</div>
@endsection