@extends('layouts.master.navbar')
@section('content')
    <a class="dropdown-item preview-item">
    <div class="preview-item-content flex-grow">
        <span class="badge badge-pill badge-success">Resume for {{}}</span>
        <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
    </div>
    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
    </a>
    <a class="dropdown-item preview-item">
    <div class="preview-item-content flex-grow">
        <span class="badge badge-pill badge-success">Invoices</span>
        <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
    </div>
    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
    </a>
    <a class="dropdown-item preview-item">
    <div class="preview-item-content flex-grow">
        <span class="badge badge-pill badge-success">Projects</span>
        <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
    </div>
    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
    </a>
              

@stop