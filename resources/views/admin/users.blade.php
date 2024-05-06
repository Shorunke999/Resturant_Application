<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss');
  </head>
  <body>
   @include("admin.navbar");
   <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>yamin</td>
                <td>yamin@gmail.com</td>
            </tr>
        </table>
   </div>
    @include("admin.adminscript");
  </body>
</html>
