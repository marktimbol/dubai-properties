@extends('public.layouts.default')
@section('bodyClass', 'home')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('content')
	@include('public._slideshow')
	@include('public._search-property')

	<div class="forBuyOrRent">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3 class="smallBigTitle">
						<small>Property</small>
						For Rent
					</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					</p>
				</div>

				<div class="col-md-9">
					<div class="row">
						<div class="owl-carousel">
							@foreach( range(1, 7) as $index )
								<div class="Property">
									<div class="Property__gallery">
										<div>
											<img src="http://lorempixel.com/600/400/city" class="img-responsive" alt="" />
										</div>	
										<h4 class="Property__price Property__price--for-rent">
											<span class="currency">AED</span> 2,500,000
										</h4>
									</div>
									<div class="Property__content">
										<h3 class="Property__name">
											<a href="#">Listing Name</a>
										</h3>
										<ul>
											<li><i class="fa fa-expand"></i> 3326 sq. ft</li>
											<li><i class="fa fa-bed"></i> 3</li>
											<li><i class="fa fa-bed"></i> 2</li>
										</ul>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<p>&nbsp;</p>
			<hr />
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-md-3">
					<h3 class="smallBigTitle">
						<small>Property</small>
						For Sale
					</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					</p>
				</div>

				<div class="col-md-9">
					<div class="row">
						<div class="owl-carousel">
							@foreach( range(1, 7) as $index )
								<div class="Property">
									<div class="Property__gallery">
										<div>
											<img src="http://lorempixel.com/600/400/city" class="img-responsive" alt="" />
										</div>	
										<h4 class="Property__price Property__price--for-sale">
											<span class="currency">AED</span> 2,500,000
										</h4>
									</div>
									<div class="Property__content">
										<h3 class="Property__name">
											<a href="#">Listing Name</a>
										</h3>
										<ul>
											<li><i class="fa fa-expand"></i> 3326 sq. ft</li>
											<li><i class="fa fa-bed"></i> 3</li>
											<li><i class="fa fa-bed"></i> 2</li>
										</ul>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="creamBg featuredProperties">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="smallBigTitle">
						<small>Trending</small>
						Featured Property
					</h3>
				</div>
				<div class="owl-carousel-featured">
					@foreach( range(1, 7) as $index )
						<div class="Property">
							<div class="Property__gallery">
								<div>
									<img src="http://lorempixel.com/600/400/city" class="img-responsive" alt="" />
								</div>	
								<h4 class="Property__price Property__price--for-rent">
									<span class="currency">AED</span> 2,500,000
								</h4>
							</div>
							<div class="Property__content">
								<h3 class="Property__name">
									<a href="#">Listing Name</a>
								</h3>
								<ul>
									<li><i class="fa fa-expand"></i> 3326 sq. ft</li>
									<li><i class="fa fa-bed"></i> 3</li>
									<li><i class="fa fa-bed"></i> 2</li>
								</ul>
							</div>
						</div>
					@endforeach
				</div>
			</div>	
		</div>
	</div>

@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection