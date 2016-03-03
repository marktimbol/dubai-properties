@extends('public.layouts.default')
@section('bodyClass', 'cream')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div id="PropertiesPerEmirate"></div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
	<script src="/js/PropertiesPerEmirate.js"></script>
@endsection	