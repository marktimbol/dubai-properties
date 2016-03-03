<div id="carousel-example-generic{{$property->id}}" class="carousel slide" data-ride="carousel">
	<div class="SingleProperty__price-container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="SingleProperty__price">AED {{ number_format($property->price) }}</h2>

				<div class="row">
					<div class="col-xs-6 col-md-6">
						<p class="text-center">
							<span class=" glyphicon glyphicon-home fa-2x"></span>
							{{ $property->type }}
						</p>
					</div>

					<div class="col-xs-6 col-md-6">
						<p class="text-center">
							<span class=" glyphicon glyphicon-home fa-2x"></span>
							{{ $property->bedrooms }} Bedroom{{ $property->bedrooms > 1 ? 's' : '' }}
						</p>
					</div>

					<div class="col-xs-6 col-md-6">
						<p class="text-center">
							<span class=" glyphicon glyphicon-home fa-2x"></span>
							{{ $property->bathrooms }} Bathroom{{ $property->bathrooms > 1 ? 's' : '' }}
						</p>
					</div>

					<div class="col-xs-6 col-md-6">
						<p class="text-center">
							<span class=" glyphicon glyphicon-home fa-2x"></span>
							{{ $property->area }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="carousel-inner" role="listbox">
		<?php $count = 1; ?>
		@foreach( $photos as $photo )
			<div class="item {{ $count == 1 ? 'active' : '' }}">
				<a href="#">
					<img src="{{ $photo->path }}" class="img-responsive" alt="" />
				</a>
			</div>
		<?php $count++ ?>
		@endforeach
  	</div>

	<a class="left carousel-control" href="#carousel-example-generic{{$property->id}}" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left glyphicon glyphicon-menu-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic{{$property->id}}" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right glyphicon glyphicon-menu-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>