<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.admincss');
  </head>
  <body>
    <div class="container-scroller">
        @include("admin.navbar");
        <div>
            <form action="">
                <div>
                    <label> Title</label>
                    <input type="text" name="title" placeholder="" required>
                </div>
                <div>
                    <label>Price</label>
                    <input type="num" name="price" placeholder="" required>
                </div>
                <div>
                    <label>image</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <label>image</label>
                    <input type="file" name="image" required>
                </div>

            </form>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript");
  </body>
</html>
