@extends('layouts.master.page')
@section('content')
<div>
    @if ($error = Session::get('error'))
        <div class="alert alert-danger">
            <h4>{{ $error }}</h4>
        </div>
    @endif
    <h3 class="page-title" style="margin-top:40px"> Available vacancies</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif </br></br> </br>
</div>
<div style="margin-top:20px" class="input-group">
<form action="{{url('/search')}}" method="get">
<input type="search" name="query" class="search" placeholder="Search" />
<button type="submit" class="search-button mdi mdi-magnify"></button>
</form>
        <?php $i=1; ?>
    <table style="margin-top:30px;margin-left:90px">
        <tr> 
        
    @foreach ($posts as $post)
            <td>
                <span class="badge badge-danger text-white ml-3 rounded">{{$i}}</span>
            </td><td></td><td></td>
            <td class="card px-xl-6" style="width:425px;align-items:center;margin-top:20px"></br>
                
                        <div class="sub-text"><img src="{{asset('images/'.$post->image)}}" width="120px" height="70px"></div>
                    
                
                        
                        <div><h4 class="sub-text">Designation : {{$post->title}}</h4></div>

                        <div><h4 class="sub-text">Company Name : {{$post->name}}</h4></div>
                   
                <div><h4 class="sub-text">Closing Date : {{$post->closing_date}}</h4></div></br>
                <div>
                    <form action="" method="POST">
                        <a class="btn btn-primary" href="{{url('/vacancy/apply')}}">Apply</a>
                         
                        <a class="btn btn-primary"  href="{{ url('/post/view',$post->id) }}">View</a>
                        
                     
                        
                            @csrf
                            @method('DELETE')
                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    </form>
                </div>
                </br>
            </td>
      
        <?php 
            if($i%2==0){
                echo '</tr><tr>';
                $i++;}
            else
                $i++;
        ?>
    
@endforeach

</table>
    </div>
</div>
@stop