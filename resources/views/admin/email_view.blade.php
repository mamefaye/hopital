<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

            <form action="{{ url('sendemail',$data->id) }}" method="POST">
                @csrf
                <div style="padding: 15px;">
                    <label for="">Greeting</label>
                    <input type="text" style="color: black" name="greeting" required>
                </div>
                <div style="padding: 15px;">
                    <label for="">Body</label>
                    <input type="text" style="color: black" name="body" required>
                </div>

                <div style="padding: 15px;">
                    <label for="">Action text</label>
                    <input type="text" style="color: black" name="actiontext" required>
                </div>

                <div style="padding: 15px;">
                    <label for="">Action URL</label>
                    <input type="text" style="color: black" name="actionurl" required>
                </div>

                <div style="padding: 15px;">
                    <label for="">End part</label>
                    <input type="text" style="color: black" name="endpart" required>
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
