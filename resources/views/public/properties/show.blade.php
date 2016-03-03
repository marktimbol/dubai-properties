@extends('public.layouts.default')
@section('bodyClass', 'page')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection
@section('content')
	<div class="Property">
		<div class="whiteBg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="Property__name">
							{{ $property->name }} 
							<span class="{{ $property->to == 'rent' ? 'Property__price--for-rent' : 'Property__price--for-sale' }}">
								AED {{ number_format($property->price) }}
								{{ $property->to == 'rent' ? '/month' : '' }}
							</span>
						</h1>

						<ul class="Property__quick-info">
							<li><i class="fa fa-expand"></i> 3326 sq. ft</li>
							<li><i class="fa fa-bed"></i> 3</li>
							<li><i class="fa fa-bed"></i> 2</li>
							<li class="Property__quick-info--address">
								<i class="fa fa-map-marker"></i>
								{{ sprintf('%s, %s, %s', $property->sublocation, $property->city, str_replace('-', ' ', $property->emirate)) }}
							</li>
						</ul>
					</div>
				</div>

				<div class="Property__gallery-container">
					<div class="row row-eq-height">
						<div class="col-md-9">
							<div class="owl-carousel-slide">
								@foreach( range(1, 2) as $index )
								<div>
									<a href="#">
										<img src="http://lorempixel.com/1400/1000/city" class="img-responsive" alt="" />
									</a>
								</div>
								@endforeach
							</div>
						</div>
						<div class="col-md-3 Property__agent-box">
							<div class="Property__agent">
								<img src="http://www.avatarsdb.com/avatars/Shailene_here_i_am.jpg" 
								width="100" height="100"
								class="img-circle text-center" 
								alt="{{ $property->user->name }}" alt="{{ $property->user->name }}" 
								title="{{ $property->user->name }}" />
								<p class="text-center">
									<span>{{ $property->user->name }}</span>
								</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p class="text-center">
									<a href="#" class="clear-bordered-button">Contact Agent</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="creamBg">
			<div class="container">
				<div class="row Property__description">
					<div class="col-md-9">
						<h2>About this property 
							@can('edit', $property)
								<span class="float-right">
									<a href="#" class="btn btn-default btn-block">
										<i class="fa fa-pencil"></i> Edit Property
									</a>
								</span>
							@endcan
						</h2>
						{!! $property->description == '' ? 'Empty' : $property->description !!}

						<div class="Property__features">
							<div class="row">
								<div class="col-md-12">
									<h2>Property Features</h2>
								</div>
								<div class="col-md-12">
									<div class="row">
										@foreach( $features->chunk(10) as $chunks )
											<div class="col-xs-6 col-md-4">
												<ul>
												@foreach( $chunks as $feature )
													<?php $class="text-muted striked"; ?>
													@foreach( $property->features as $propertyFeature )
														@if( $feature->id === $propertyFeature->id)
															<?php $class="bold"; ?>
														@endif
													@endforeach	
													<li class="{{ $class }}">{{ $feature->name }}</li>
												@endforeach
												</ul>
											</div>
										@endforeach	
									</div>
								</div>
							</div>	
						</div>

						<div class="Property__map">
							<h2>Location Map</h2>
							<div id="map"></div>
						</div>
				

						<div class="Property__gallery--grid">
							<h2>More Pictures</h2>
							<?php
							$photosCount = count($property->photos);
							$photoCount = 1;
							$needsRow = false;
							?>
							<div class="row">
								@foreach( $property->photos->take(5) as $photo )
									<div class="col-md-{{ $photoCount > 2 ? '4' : '6' }} {{ $photoCount == 5 ? 'lastPhoto' : '' }}">
										<img src="{{ $photo->path }}" class="img-responsive" alt="{{ $property->name }}" title="{{ $property->name }}" />
										@if( $photoCount == 5 )
											<div class="viewPhotos">
												<p><a href="#" class="viewPhotos__link">View all {{ $photosCount }} photos</a></p>
											</div>
										@endif
									</div>	
									<?php 
									$photoCount++;
									$needsRow = $photoCount === 3 ? true : false;
									?>
								@endforeach
							</div>								
						</div>
						
					</div>

					<div class="col-md-3">
						<h4>Send Enquiry</h4>
						<hr />
						<form>
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Your Full Name" />
							</div>
							<div class="form-group">
								<label>eMail</label>
								<input type="email" name="email" class="form-control" placeholder="Your Email" />
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control" rows="5" placeholder="What do you want to say?"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary">Send Message</button>
							</div>

						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
	<script>
	  function initMap() {
	    var mapDiv = document.getElementById('map');
	    var map = new google.maps.Map(mapDiv, {
	      center: {lat: 44.540, lng: -78.546},
	      zoom: 8
	    });
	  }
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
@endsection