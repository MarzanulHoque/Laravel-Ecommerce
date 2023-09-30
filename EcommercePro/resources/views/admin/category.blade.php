<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .div_center{

            text-align: center;
            padding-top:40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border:3px solid whitesmoke;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))

                        <script>alert('{{ session()->get('message') }}')
                        </script>


                @endif

                <div class="div_center">

                    <h2 class="h2_font"> Add Category </h2>
                    <form action="{{ url('add_category') }}" method="POST">
                        @csrf
                        <input class="text_color"  type="text" name="category" placeholder="Write Category Name">
                        <br>
                        <br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                    </form>
                </div>
                <div>
                    <table class="center">
                        <tr>
                            <td>Category Name</td>
                            <td> Action </td>

                        </tr>

                        @foreach ($data as $item)

                        <tr>
                            <td> {{ $item->category_name }}</td>
                            <td> <a onclick="return confirm('Are You Sure Wanna Delete ?')" href="{{ url('delete_category', $item->id) }}" class="btn btn-danger">Delete </a></td>
                        </tr>


                        @endforeach

                    </table>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
