@extends('frontend.main_master')
@section('content')

@section('title')
 My Cart Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Cart</th>
				</tr>
			</thead>

			<tbody id="cartPage">
				
				 
			</tbody>
		</table>
	</div>
</div>	




<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md" id="cartSubTotal"></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						
							<a href="{{ route('checkout')}}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
				
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			


</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>


@endsection