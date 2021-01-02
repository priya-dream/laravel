@extends('layouts.master.page')

@section('content')

<h3 class="mb-0"> Available vacancies</h3>
            <a  href="{{ url('/join') }}" class="btn btn-success"> POST JOB </a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
           @endif
           </br></br>
           
        <table margin-top="20px" class="table table-bordered"  style="align:center">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Company</th>
            <th>Closing Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vacancies as $vacancy)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $vacancy->title }}</td>
            <td>{{ $vacancy->company }}</td>
            <td>{{ $vacancy->closing_date }}</td>
            <td>
                <form action="{{ route('vacancy.destroy',$vacancy->id) }}" method="POST">
                    <a class="btn btn-primary" href="">Apply</a>
                    <a class="btn btn-primary" href="{{url('/vacancy/view',$vacancy->id) }}">View</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                   
                </form>
            </td>
        </tr>
        @endforeach
        </table>
        {!! $vacancies->links() !!}    
        </div>

@stop