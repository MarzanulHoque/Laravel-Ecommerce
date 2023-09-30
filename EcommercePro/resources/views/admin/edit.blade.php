<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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

                        <script>alert( '{{ session()->get('message') }}' )
                        </script>


                    @endif


                    <div class="div_center">

                        <h1 class="font_size">Edit Product</h1>
                        <div>

                            <form action="{{ url('/update_product', $product->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for=""> Product Title </label>
                                    <input class="text-dark py-2 mb-3" type="text" name="title" id=""  value="{{ $product->title }}" required>
                                </div>
                                <div>
                                    <label for=""> Description </label>
                                    <input class="text-dark py-2 mb-3" type="text" name="description" id="" value="{{ $product->description }}" required>
                                </div>
                                <div>
                                    <label for=""> Price </label>
                                    <input class="text-dark py-2 mb-3" type="number" name="price" id="" value="{{ $product->price }}" required>
                                </div>

                                <div>
                                    <label for=""> Discount Price </label>
                                    <input class="text-dark py-2 mb-3" type="number" name="disc_price" id="" value="{{ $product->discount_price }}" >
                                </div>

                                <div>
                                    <label for=""> Product Quantity </label>
                                    <input class="text-dark py-2 mb-3" type="number" min="0" name="quantity" id="" value="{{ $product->quantity }}" required>
                                </div>

                                <div>
                                    <label for=""> Product Category </label>
                                    <select class="text-dark py-2 mb-3" id="" name="category" required>
                                        <option value="{{ $product->category }}" selected>{{ $product->category }} </option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->category_name }}"> {{ $item->category_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for=""> Product Current Image : </label>
                                    <img class="mt-3 mb-3" height="100" width="100" style="margin: auto" src="/images/{{ $product->image }}" alt="">
                                </div>

                                <div>
                                    <label for=""> Product Image Here : </label>
                                    <input class="text-dark py-2 mb-3" type="file" name="image" id="" placeholder="Add Product Image Here" >
                                </div>

                                <div>

                                    <input class="btn btn-primary py-2 mb-3" type="submit" value="Update Product">

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
