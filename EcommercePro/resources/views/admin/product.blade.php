<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

        .div_center{

            text-align: center;
            padding-top: 40px;
        }
        .font_size{

            font-size: 40px;
            padding-bottom: 40px;
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

                        <h1 class="font_size">Add Product</h1>
                        <div>

                            <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for=""> Product Title </label>
                                    <input class="text-dark py-2 mb-3" type="text" name="title" id="" placeholder="Add a title" required>
                                </div>
                                <div>
                                    <label for=""> Description </label>
                                    <input class="text-dark py-2 mb-3" type="text" name="description" id="" placeholder="Add a description" required>
                                </div>
                                <div>
                                    <label for=""> Price </label>
                                    <input class="text-dark py-2 mb-3" type="number" name="price" id="" placeholder="Add a Price" required>
                                </div>

                                <div>
                                    <label for=""> Discount Price </label>
                                    <input class="text-dark py-2 mb-3" type="number" name="disc_price" id="" placeholder="Add a Discount Price" >
                                </div>

                                <div>
                                    <label for=""> Product Quantity </label>
                                    <input class="text-dark py-2 mb-3" type="number" min="0" name="quantity" id="" placeholder="Add a Quantity" required>
                                </div>

                                <div>
                                    <label for=""> Product Category </label>
                                    <select class="text-dark py-2 mb-3" id="" name="categroy" required>
                                        <option value="" selected>Add a Category </option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->category_name }}"> {{ $item->category_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for=""> Product Image Here : </label>
                                    <input class="text-dark py-2 mb-3" type="file" name="image" id="" placeholder="Add Product Image Here" required>
                                </div>

                                <div>

                                    <input class="btn btn-primary py-2 mb-3" type="submit" value="Add Product">

                                </div>

                            </form>
                        </div>
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
