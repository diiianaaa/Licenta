@extends('frontend.main_master')
@section('content')
@section('title')
Coffee Shop Home
@endsection

<header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Welcome!</h1>
                    <h2 class="masthead-subheading mb-0">Let's discover our sweets</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">About Us</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

<div class="body-content outer-top-xs" id="top-banner-and-menu">


  <div class="container">
    
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->

     




      <!-- === == TOP NAVIGATION == ==== -->

      <!-- ===== ==== TOP NAVIGATION : END ==== ===== -->








      <!-- == ==== Testimonials=== ===== -->


      <!-- === ======== Testimonials: END ==== =========== -->

      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

          


          </div>
          <!-- /.owl-carousel -->
        </div>







        <!-- === ========= SECTION – HERO ==== ======= -->



        <!-- ==== ===== SECTION – HERO : END === ============== -->















        <!-- = ===== SCROLL TABS =============== ========== -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

              @foreach($categories as $category)
              <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name_en }}</a></li>
              @endforeach
              <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">



            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img src="{{ asset($product->product_small) }}" alt=""></a> </div>
                          <!-- /.image -->


                        </div>

                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en  ) }}">
                              @if(session()->get('language') == 'german') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                            </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if ($product->discount_price == NULL)
                          <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                          @endif


                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">


                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>



                              <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  @endforeach
                  <!--  // end all optionproduct foreach  -->




                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->




            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @php
                  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                  @endphp


                  @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en  ) }}"><img src="{{ asset($product->product_small) }}" alt=""></a> </div>
                          <!-- /.image -->

                          @php
                          $amount = $product->selling_price - $product->discount_price;
                          $discount = ($amount/$product->selling_price) * 100;
                          @endphp

                          <div>
                            @if ($product->discount_price == NULL)
                            <div class="tag new"><span>new</span></div>
                            @else
                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                            @endif
                          </div>
                        </div>

                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              @if(session()->get('language') == 'german') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                            </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if ($product->discount_price == NULL)
                          <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                          @endif


                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">

                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>



                              <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->

                  @empty
                  <h5 class="text-danger">No Product Found</h5>

                  @endforelse
                  <!--  // end all optionproduct foreach  -->




                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
            @endforeach
            <!-- end categor foreach -->





          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->


        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($featured as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en  ) }}"><img src="{{ asset($product->product_small) }}" alt=""></a> </div>
                    <!-- /.image -->


                  </div>

                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                        @if(session()->get('language') == 'german') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
                      </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if ($product->discount_price == NULL)
                    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                    @endif


                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">

                          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>



                        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            @endforeach









            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img src="assets/images/products/p8.jpg" alt=""></a> </div>
                    <!-- /.image -->


                    <!-- /.product-image -->


                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>

                        

                            <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                              <i class="fa fa-heart"></i>
                            </button>

                        

                          <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                          </li>
                        </ul>
                      </div>
                      <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                  </div>
                  <!-- /.product -->

                </div>
                <!-- /.products -->




                <!-- /.item -->
              </div>
              <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->


    


      </div>
      <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
  </div>


  @endsection