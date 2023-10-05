<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms Design</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .div_center{

            text-align: center;
            padding-top:40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .img_deg{
            height: 100px;
            width:100px;
            border-radius: 10px
        }
     </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

          @if (session()->has('message'))

            <script>alert( '{{ session()->get('message') }}' )
            </script>

         @endif


      <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h2 class="h2_font">All Orders</h2>
                </div>

                <div class="container">
                    <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th >Product title</th>
                                    <th>Unit Price</th>
                                    <th >Product quantity</th>
                                    <th >Total Price</th>
                                    <th >Image</th>
                                    <th >Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                ?>
                                @foreach ($cart as $item)
                                <?php
                                    $unit = $item->price / $item->quantity;
                                    $total = $total +  $item->price;
                                ?>
                                <tr>
                                    <td> {{ $item->product_title }} </td>
                                    <td> ${{ $unit }} </td>
                                    <td> {{ $item->quantity }} </td>
                                    <td> ${{ $item->price }} </td>
                                    <td> <img src="/images/{{ $item->image}}" class="img_deg" alt=""> </td>

                                    <td><a onclick="return confirm('Are You Sure To Delete This ?')" href=" {{ url('delete_cart',$item->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>

                    </table>

                        <div class="div_center h2_font">
                            <h1>Total Price: ${{ $total }}</h1>

                            <div class="mt-3">

                                <h1 style="font-size:25px; padding-bottom:15px" >Proceed to Order</h1>
                                <a href="{{ url('cash_order') }}" class="btn btn-success" >Cash On Delivery</a>
                                <a href="" class="btn btn-success" >Pay With Card</a>
                            </div>

                        </div>
                </div>

            </div>
        </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
