<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar")
        <form action="{{url('/updatedchefdata',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Chef Name: </label>
                <input type="text" value="{{$data->name}}" name="name">
            </div>
            <div>
                <label>Speciality: </label>
                <input type="text" value="{{$data->speciality}}" name="speciality">
            </div>
            <div>
                <label>Old image</label>
                <img width="120" height="120" src="{{asset($data->image)}}" alt="NAN">
            </div>
            <div>
                <label>New image: </label>
                <input type="file"  name="new_image">
            </div>
            <input type="submit" value="save">
        </form>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>
