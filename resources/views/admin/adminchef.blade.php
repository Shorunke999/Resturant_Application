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
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>
