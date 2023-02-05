<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  @if(session()->has('message'))
       <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
        </button>
        {{ session()->get('message') }}
       </div>
   @endif
  <body>
    @if(session()->has('message'))
       <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
        </button>
        {{ session()->get('message') }}
       </div>
   @endif
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding-top: 100px;">
                <table>
                    <tr style="background-color: black;">
                        <th style="padding: 10px;">Doctor Name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Speciality</th>
                        <th style="padding: 10px;">Room</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Delete</th>
                        <th style="padding: 10px;">Update</th>
                    </tr>
                    @foreach ($data as $doctors)
                        <tr align="center" style="background-color: skyblue;color: black;">
                            <td>{{ $doctors->name }}</td>
                            <td>{{ $doctors->phone }}</td>
                            <td>{{ $doctors->speciality }}</td>
                            <td>{{ $doctors->room }}</td>
                            <td>
                                <img src="doctorimage/{{ $doctors->image }}" alt="" height="100" width="100">
                            </td>
                            <td>
                                <a href="{{ url('updatedoctor',$doctors->id) }}" class="btn btn-primary">Update</a>
                            </td>
                            <td>
                                <a
                                    href="{{ url('deletedoctor',$doctors->id) }}"
                                    onclick="return confirm('Are you sure to delete this?')"
                                    class="btn btn-danger">
                                    Delete
                                </a>
                            </td>

                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('admin.script')
  </body>
</html>
