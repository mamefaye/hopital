<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
    label{
        display: inline-block;
        width: 250px;
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
    <!-- container -->
    <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding-top: 100px;">

            @if(session()->has('message'))
             <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                {{ session()->get('message') }}
             </div>
            @endif

            <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px;">
                    <label for="">Doctor Name</label>
                    <input type="text" style="color: black" name="name" placeholder="write the name" required>
                </div>
                <div style="padding: 15px;">
                    <label for="">Phone</label>
                    <input type="number" style="color: black" name="phone" placeholder="write the number" required>
                </div>
                <div style="padding: 15px;">
                    <label for="">Speciality</label>
                    <select name="speciality" id="" style="color: black; width: 240px;" required>
                        <option>--Select--</option>
                        <option value="skin">skin</option>
                        <option value="heart">heart</option>
                        <option value="eye">eye</option>
                        <option value="nose">nose</option>
                    </select>
                </div>
                <div style="padding: 15px;">
                    <label for="">Room No:</label>
                    <input type="number" style="color: black" name="room" placeholder="write the room number" required>
                </div>
                <div style="padding: 15px;">
                    <label for="">Doctor Image</label>
                    <input type="file"  name="file"  required>
                </div>
                <div style="padding: 15px;">
                    <input type="submit" class="btn btn-success" >
                </div>
            </form>
        </div>
    </div>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
