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
    </style>

  </head>
  <body>
    <div class="container-scroller">

        @if (session()->has('message'))

            <script>alert( '{{ session()->get('message') }}' )
            </script>

        @endif

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h2 class="h2_font">All Products</h2>
                </div>

                <div class="container">
                    <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th >Title</th>
                                    <th >Description</th>
                                    <th >Category</th>
                                    <th >Quantity</th>
                                    <th >Price</th>
                                    <th >Discount Price</th>
                                    <th >Image</th>
                                    <th >Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td> {{ $item->title }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td>{{ $item->category }}</td>
                                    <td> {{ $item->quantity }} </td>
                                    <td> {{ $item->price }} </td>
                                    <td> {{ $item->discount_price }} </td>
                                    <td> <img class="rounded" src="/images/{{ $item->image}}" alt=""> </td>

                                    <td><a onclick="return confirm('Are You Sure To Delete This ?')" href=" {{ url('delete_product',$item->id) }}" class="btn btn-danger">Delete</a></td>

                                    <td><a href="{{ url('edit_product',$item->id) }}" class="btn btn-warning">Update</a></td>
                                </tr>
                                @endforeach
                            </tbody>
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
