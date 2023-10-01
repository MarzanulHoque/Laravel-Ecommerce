<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>

            <div class="row">

               @foreach ($product as $item)
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="" class="option1">
                                 {{ $item->title }}
                              </a>
                              <a href="" class="option2">
                              Buy Now
                              </a>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="images/{{ $item->image }}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              {{ $item->title }}
                           </h5>

                           @if($item->discount_price!=null)

                              <h6 style="color: red">
                                 Sale Price
                                 <br>
                                 ${{ $item->discount_price }}
                              </h6>
                                 <div>
                                    <h6 style="color: blue" >Price</h6>

                                    <h6 style="text-decoration:line-through;color:blue ">
                                       ${{ $item->price }}
                                    </h6>
                                 </div>

                           @else

                              <h6 style="color: blue">
                                 Price
                                 <br>
                                 ${{ $item->price }}
                              </h6>
                           @endif


                        </div>
                     </div>
                  </div>
                  @endforeach


                </div>
                <span>

                    {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}

                </span>
            </div>
      </section>
