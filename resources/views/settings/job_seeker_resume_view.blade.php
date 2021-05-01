<table class="table">
    <tr>
        <td>No</td>
        <td>Wanted position</td>
        <td>view</td>
        <td>download</td>
    </tr>
    @foreach($file as $key=>$data)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$data->title}}</td>
        <td><a href="/resume_view/{{$data->id}}">view</a></td>
        <td><a href="/resume/download/{{$data->cv}}">download</a></td>

    </tr>
    @endforeach
</table>