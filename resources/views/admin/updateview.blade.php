<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
   @include('admin.admincss');
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar");
        <form action="{{url("/update",$data->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
           <div>
                <label> Title</label>
                <input type="text" name="title" value="{{$data->title}}" required>
            </div>
            <div>
                <label>Price</label>
                <input type="number"  name="price" value="{{$data->price}}" required>
            </div>
            <div>
                <label>Decription</label>
                <input type="text" name="description" value="{{$data->description}}" required>
            </div>
            <div>
                <label>Old image</label>
                <img src="{{$data->image}}" height="200" name="old_image" width="200" alt="NAN">
            </div>
            <div>
                <label>New image (leave this if no new image )</label>
                <input type="file" name="new_image">
            </div>
            <div>
                <input type="submit" value="save" style="black">
            </div>
        </form>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>
