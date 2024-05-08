<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.admincss');
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar")
        <div style=" top:60px; right:-150px">

            <form action="{{url("/uploadfood")}}" method="post" enctype="multipart/form-data" >
                @csrf
               <div>
                    <label> Title</label>
                    <input type="text" name="title" placeholder="" required>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number"  name="price" placeholder="" required>
                </div>
                <div>
                    <label>Decription</label>
                    <input type="text" name="description" required>
                </div>
                <div>
                    <label>image</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <input type="submit" value="save" style="black">
                </div>
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th style="padding:30px">
                        Food Name
                    </th>
                    <th style="padding:30px">
                        Price
                    </th>
                    <th style="padding:30px">
                        Description
                    </th>
                    <th style="padding:30px">
                        Image
                    </th>
                </tr>
                @foreach ($data as $data )
                    <tr align="center">
                        <td>
                            {{$data->title}}
                        </td>
                        <td>
                            {{$data->price}}
                        </td>
                        <td>
                            {{$data->description}}
                        </td>
                        <td>
                            <img height="200" width="200" src="/foodmenu/images/{{$data->image}}" alt="NAN">
                        </td>
                        <td>
                            <a href="{{url('/delete_menu',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript");
  </body>
</html>
