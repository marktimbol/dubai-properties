@extends('public.layouts.default')
@section('header_styles')
<style>
	#map {
		position: fixed !important;
		margin-top: 0;
		height: 90%;
		width: 40%;
	}
</style>
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div id="RoomsPerCountry"></div>
			</div>

			<div class="col-md-5">
				<div id="map"></div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="/js/RoomsPerCountry.js"></script>
	<script>
	  function initMap() {
	    var mapDiv = document.getElementById('map');
	    var map = new google.maps.Map(mapDiv, {
	      center: {lat: 44.540, lng: -78.546},
	      zoom: 8
	    });
	  }
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
@endsection	