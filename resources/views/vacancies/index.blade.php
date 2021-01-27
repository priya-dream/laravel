@extends('layouts.master.page')
@section('content')
<h3 class="mb-0"> Available vacancies</h3>
    <a  href="{{ url('/join') }}" class="btn btn-success"> POST JOB </a>
      </div>    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif </br></br>       
       
        <div class="table-responsive">
        <?php $i=1; ?>
            <table>
            <tr>
            @foreach ($results as $result)
            <div class="col-md-6">
            <td class="badge badge-danger text-white ml-3 rounded">{{$i}}</td>
            </div>
            <div class="col-md-6">
            <td>
            <div> {{$result->title}}</div>
            <div>{{$result->name}}</div>
            <div>{{$result->closing_date}}</div>
            <div>
                <form action="" method="POST">
                    <a class="btn btn-primary" href="{{url('/vacancy/apply')}}">Apply</a>
                    <a class="btn btn-primary"  href="{{ url('/post') }}">View</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>  
                </form><hr>
            </div></td></div>
            <?php 
            if($i%2==0){
                echo '</tr>';
                $i++;}
            else
                $i++;
            ?>
        </div>
        @endforeach
        </table>  
        </div>
@stop