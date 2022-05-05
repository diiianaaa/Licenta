@extends('frontend.main_master')
@section('content')
@section('title')
{{ $product->product_name_en }}
@endsection



<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
			
				<li class='active'></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						
					</div>


				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				<div class="detail-block">
					<div class="row  wow fadeInUp">

						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
									@foreach($multiImg as $img)
									<div class="single-product-gallery-item" id="{{asset($img->id)}}">
										<a data-lightbox="image-1" data-title="Gallery" href="{{asset($img->photo_name)}}">
											<img class="img-responsive" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
										</a>
									</div><!-- /.single-product-gallery-item -->
									@endforeach()



								</div><!-- /.single-product-slider -->


								<div class="single-product-gallery-thumbs gallery-thumbs">

									<div id="owl-single-product-thumbnails">
										@foreach($multiImg as $img)
										<div class="item">
											<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$img->id}}">
												<img class="img-responsive" width="85" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
											</a>
										</div>
										@endforeach
									</div><!-- /#owl-single-product-thumbnails -->




								</div><!-- /.gallery-thumbs -->

							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name" id="pname">
									@if(session()->get('language') == 'german') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
								</h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											<div class="rating rateit-small"></div>
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">(13 Reviews)</a>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.rating-reviews -->


								<div class="description-container m-t-20">
									@if(session()->get('language') == 'german') {{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">


										<div class="col-sm-6">
											<div class="price-box">
												<span class="price">${{$product->selling_price}}</span>

											</div>
										</div>

										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
											
												<button class="btn btn-primary " type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
													<i class="fa fa-envelope"></i>
												</a>
											</div>
										</div>

									</div><!-- /.row -->


									<!-- //// Add Size -->


									<div class="row">


										<div class="col-sm-6">

											<div class="form-group">
												@if($product->product_size_en == null)


												@else
											

												<label class="info-title control-label">Choose Size<span>*</span></label>
												<select class="form-control unicase-form-control selectpicker" style="display: none;">
													<option selected="" disabled="">--Choose Size--</option>
													@foreach($product_size_en as $size)

													<option value="{{ $size }}">{{ $size }}</option>
													
													@endforeach
												</select>
											@endif
											</div> <!-- end form group -->
											

										</div><!-- end col 6 -->


										


									</div><!-- /.row -->


									<!-- /////End Product Size -->



								</div><!-- /.price-container -->

								<div class="quantity-container info-container">
									<div class="row">

										<div class="col-sm-2">
											<span class="label">Quantity :</span>
										</div>

										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
													<div class="arrows">
														<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
													</div>
													<input type="text" id="quantity" value="1">
												</div>
											</div>
										</div>

										<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

										
			<div class="col-sm-7">
				<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
			</div>

									</div><!-- /.row -->
								</div><!-- /.quantity-container -->






							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->
				</div>

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-20">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>

							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">

								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
											@if(session()->get('language') == 'german') {{!! $product->long_descp_hin !!}} @else {{!! $product->long_descp_en !!}} @endif </p>
									</div>
								</div><!-- /.tab-pane -->



							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->



			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
	</div>







	@endsection