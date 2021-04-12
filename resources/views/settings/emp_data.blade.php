<table class="table">
        <tr>
            <th>No</th>
            <th>Applied Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC Number</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Qualification</th>
            <th>Actions</th>
        </tr>
        <?php $n=1; ?>
        @foreach($apps as $app)
            <tr>
                <td><?php echo $n; ?></td>
                <td>{{$app->date}}</td>
                <td>{{$app->fname}}</td>
                <td>{{$app->lname}}</td>
                <td>{{$app->nic}}</td>
                <td>{{$app->mobile}}</td>
                <td>{{$app->address}}</td>
                <td><button class="view-button btn btn-primary">View</button></td>
                <td>
                <table><tr><td>
                    <a class="show-detail" href=""><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></a></td><td>
                    <a class="show-detail" href="{{url('myaccount/applications/remove')}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></a></td></tr></table>
                </td>
            </tr>
            <?php $n+=1; ?>
        @endforeach
    </table>