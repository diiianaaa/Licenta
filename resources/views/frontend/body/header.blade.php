<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="wrap">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <p class="mb-0 phone"><span class="fa fa-phone"></span> <a href="#">+40 7878 845 17</a></p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">

                            <a href="{{ route('wishlist') }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-heart"><i class="sr-only">Wishlist</i></span></a>
                            <a href="{{ route('mycart') }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-shopping-cart"><i class="sr-only">My Cart</i></span></a>
                            <a href="{{ route('checkout') }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-check"><i class="sr-only">Checklist</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-language"><i class="sr-only">

                                    </i>

                                </span></a>


                        </p>

                    </div>

                </div>
            </div>

        </div>


        <!-- /.container -->
    </div>






    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"></span></a>


            


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                    <li class="nav-item"><a href="#" class="nav-link"> @if(session()->get('language') == 'german') Zuhause @else Home @endif</a></li>
                    <!-- // End Category Foreach -->
                    <li class="nav-item"><a href="#" class="nav-link"> @if(session()->get('language') == 'german') Katalog @else Catalog @endif</a></li>
                    <li class="nav-item"><a href="{{route('blog_view')}}" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{ url('/reservTable') }}" class="nav-link">Reservation</a></li>
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link"> @if(session()->get('language') == 'german') Einloggen/Anmeldung @else Log In/Sign Up @endif</a></li>
                </ul>
            </div>

        </div>



    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">



        <div class="container">

        <form action="/search"  class="searchform order-sm-start order-lg-last">
         
                <div class="form-group d-flex">
                    <input type="text" name="query" class="form-control pl-3" id="search_product" placeholder="Search Product">
                    <button type="submit"  placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>




            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">


                        @php
                        $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                        @endphp

                        @foreach($categories as $category)
                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                            @if(session()->get('language') == 'german') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif
                        </a>
                        <ul class="dropdown-menu container">
                            <li>
                                <div class="yamm-content ">
                                    <div class="row">

                                        <!--   // Get SubCategory Table Data -->
                                        @php
                                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                        @endphp

                                        @foreach($subcategories as $subcategory)
                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                            <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">

                                                <h2 class="title">
                                                    @if(session()->get('language') == 'german') {{ $subcategory->subcategory_name_hin }} @else {{ $subcategory->subcategory_name_en }} @endif
                                                </h2>
                                            </a>



                                        </div>
                                        <!-- /.col -->
                                        @endforeach
                                        <!-- // End SubCategory Foreach -->


                                    </div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                    <!-- // End Category Foreach -->

                </ul>



            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">


            <!-- ===== === SHOPPING CART DROPDOWN ===== == -->

            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                    <div class="items-cart-inner">
                        <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                        <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                        <div class="total-price-basket"> <span class="lbl">cart -</span>
                            <span class="total-price"> <span class="sign">$</span>
                                <span class="value" id="cartSubTotal"> </span> </span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <!--   // Mini Cart Start with Ajax -->

                        <div id="miniCart">

                        </div>

                        <!--   // End Mini Cart Start with Ajax -->


                        <div class="clearfix cart-total">
                            <div class="pull-right"> <span class="text">Sub Total :</span>
                                <span class='price' id="cartSubTotal"> </span>
                            </div>
                            <div class="clearfix"></div>
                            <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                        </div>
                        <!-- /.cart-total-->

                    </li>
                </ul>
                <!-- /.dropdown-menu-->
            </div>
            <!-- /.dropdown-cart -->

            <!-- == === SHOPPING CART DROPDOWN : END=== === -->
        </div>

        <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->

        </div>
        <!-- /.main-header -->


    </nav>

    <!-- ============================================== NAVBAR ============================================== -->

    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>