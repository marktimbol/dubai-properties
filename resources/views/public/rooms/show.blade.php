@extends('public.layouts.default')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/datepicker.css') }}"></script>
@endsection
@section('content')
	<div class="SingleRoom">
		@include('public.rooms._gallery', ['photos' => $room->photos])
		<div class="whiteBg">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="SingleRoom__description row">
							<div class="col-md-3">
								<div class="SingleRoom__user">
									<img src="http://www.avatarsdb.com/avatars/Shailene_here_i_am.jpg" 
									width="100" height="100"
									class="img-circle" 
									alt="Room user" alt="{{ $room->user->name }}" 
									title="{{ $room->user->name }}" />
									<span>{{ $room->user->name }}</span>
								</div>
							</div>
							<div class="col-md-9">
								<h1 class="SingleRoom__name">{{ $room->name }}</h1>
								<h3 class="SigleRoom__country">{{ $room->user->country->name }}</h3>
								<div class="SingleRoom__includes row">
									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<span class=" glyphicon glyphicon-home fa-2x"></span>
											{{ $room->roomType }}
										</p>
									</div>

									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-users fa-2x"></i>
											{{ $room->accommodates }} Guest{{ $room->accommodates > 1 ? 's' : '' }}
										</p>
									</div>

									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-bed fa-2x"></i>
											{{ $room->beds }} Bed{{ $room->beds > 1 ? 's' : '' }}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="SingleRoom__booking">
							<div class="SingleRoom__booking--header">
								<div class="row">
									<div class="col-md-7">
										<p class="SingleRoom__booking--price"><span class="currency">$</span>{{ $room->price }}</p>
									</div>
									<div class="col-md-5">
										<p class="SingleRoom__booking--perNight">Per Night</p>
									</div>
								</div>
							</div>
							<div id="BookingForm"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="creamBg">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2>About this listing 
							@can('edit', $room)
								<span class="float-right">
									<a href="{{ route('user.rooms.edit', $room->id) }}" class="btn btn-default btn-block"><i class="fa fa-pencil"></i> Edit Room</a>
								</span>
							@endcan
						</h2>
						{!! $room->aboutListing == '' ? 'Empty' : $room->aboutListing !!}
						<p>&nbsp;</p>
						<p><strong><a href="#">Contact Host</a></strong></p>

						<div class="SingleRoom__info">
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>The Space</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>Accomodates: 
														<strong>{{ $room->accommodates }} Guest{{ $room->accommodates > 1 ? 's' : '' }}</strong>
													</li>
													<li>Bathrooms: <strong>{{ $room->bathrooms }}</strong></li>
													<li>Bed Type: <strong>{{ $room->bedType }}</strong></li>
													<li>Bedrooms: <strong>{{ $room->bedrooms }}</strong></li>
													<li>Beds: <strong>{{ $room->beds }}</strong></li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>Check In: <strong>{{ $room->checkIn }}</strong></li>
													<li>Check Out: <strong>{{ $room->checkOut }}</strong></li>
													<li>Property Type: <strong>{{ $room->propertyType }}</strong></li>
													<li>Room Type: <strong>{{ $room->roomType }}</strong></li>
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div id="RoomAmenities"></div>
								<div class="row">
									<div class="col-md-3">
										<p>Amenities</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											@foreach( $amenities->chunk(15) as $chunks )
												<div class="col-xs-6 col-md-6">
													<ul>
													@foreach( $chunks as $amenity )
														<?php $class="text-muted striked"; ?>
														@foreach( $room->amenities as $roomAmenity )
															@if( $amenity->id === $roomAmenity->id)
																<?php $class="bold"; ?>
															@endif
														@endforeach	
														<li class="{{ $class }}">{{ $amenity->name }}</li>
													@endforeach
													</ul>
												</div>
											@endforeach	
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Prices</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>Extra people: 
														<strong>
															{{ $room->extraPeopleFee == 0 ? 'No Charge' :  '$' . $room->extraPeopleFee }}
														</strong>
													</li>
													<li>Cleaning fee: 
														<strong>
															${{ $room->cleaningFee }}
														</strong>
													</li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>Cancellation: <strong><a href="#">Strict</a></strong></li>
												</ul>	
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Description</p>
									</div>
									<div class="col-md-9">
										<h4>The Space</h4>
										{!! $room->description == '' ? 'Empty' : $room->description !!}
										</p>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>House Rules</p>
									</div>
									<div class="col-md-9">
									</div>
								</div>	
							</div>

							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Safety Features</p>
									</div>
									<div class="col-md-9">
									</div>
								</div>	
							</div>

							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Availability</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>
														<strong>{{ $room->minimumStay }} night{{ $room->minimumStay > 1 ? 's' : '' }}</strong> minimum stay
													</li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>
														<a href="#"><strong>View Calendar</strong></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--gallery">
								<?php
								$photosCount = count($room->photos);
								$photoCount = 1;
								$needsRow = false;
								?>
								<div class="row">
									@foreach( $room->photos->take(5) as $photo )
										<div class="col-md-{{ $photoCount > 2 ? '4' : '6' }} {{ $photoCount == 5 ? 'lastPhoto' : '' }}">
											<img src="{{ $photo->path }}" class="img-responsive" alt="{{ $room->name }}" title="{{ $room->name }}" />
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
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/datepicker.js') }}"></script>
	<script src="/js/BookingForm.js"></script>
@endsection