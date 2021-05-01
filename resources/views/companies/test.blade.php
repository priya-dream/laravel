<form action="{{url('/add/resume')}}" method="POST" id="form" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="modal-body">   
            <div class="mb-3">
                <label  class="form-label">Wanted Job Designation</label>
                <input type="text" placeholder="Eg:Office Administrator" name="title" class="form-control" required/>
            </div>
            <div class="mb-3">
                <label  class="form-label">Upload Your CV (in PDF)</label>
                <input type="file" placeholder="choose" name="file" class="form-control" required/>
            </div>
            <input type="submit" value="Add" class="btn btn-primary add">
        </div>
    </form>
    