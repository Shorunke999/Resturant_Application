<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar")
        <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Name</label>
                <input  type="text" name="name" placeholder="Enter Name" required>
            </div>
            <div>
                <label for="">Speciality</label>
                <input  type="text" name="speciality" placeholder="Enter speciality" required>
            </div>
            <div>
                <input  type="file" name="image" required>
            </div>
            <div>
                <input type="submit" value="save">
            </div>
        </form>
        <table>
            <tr>
                <th style="padding: 30px">Chef Name</th>
                <th style="padding: 30px">Speciality</th>
                <th style="padding: 30px">Image</th>
                <th style="padding: 30px">Action</th>
                <th style="padding: 30px">Action</th>
            </tr>
            @foreach ($data as $data )
                <tr>
                    <td style="padding: 30px">{{$data->name}}</td>
                    <td style="padding: 30px">{{$data->speciality}}</td>
                    <td style="padding: 30px"><img width="100" height="100" src="{{asset($data->image)}}" alt="NAN"></td>
                    <td style="padding: 30px"><a href="{{url('/update_chef',$data->id)}}">Update</a></td>
                    <td style="padding: 30px"><a href="{{url('/delete_chef',$data->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>
