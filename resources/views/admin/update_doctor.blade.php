<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
  </head>



  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding: 150px;" >
                @if(session()->has('message'))
       <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
        </button>
        {{ session()->get('message') }}
       </div>
       @endif
                <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input style="color: black" type="text" name="name" id="" value="{{ $data->name }}">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Doctor Phone</label>
                        <input style="color: black" type="number" name="phone" id="" value="{{ $data->phone }}">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Doctor Speciality</label>
                        <input style="color: black" type="text" name="speciality" id="" value="{{ $data->speciality }}">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Doctor Room</label>
                        <input style="color: black" type="number" name="room" id="" value="{{ $data->room }}">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Old Image</label>
                        <img height="150px" width="150px" src="doctorimage/{{ $data->image }}" alt="image">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Change Image</label>
                        <input type="file" name="file">
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>


      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>
