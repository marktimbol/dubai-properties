@extends('public.layouts.default')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-md-7">
				<h1 class="smallBigTitle">
					<small>Property</small>
					Listing
				</h1>
				<div id="PropertiesContainer"></div>
			</div>

			<div class="col-md-5">
				<div id="map"></div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/blazy.js') }}"></script>
	<script src="{{ elixir('js/carousel.js') }}"></script>
	<script src="/js/PropertiesContainer.js"></script>
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