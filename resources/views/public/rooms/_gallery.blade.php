<div id="carousel-example-generic{{$room->id}}" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<?php $count = 1; ?>
		@foreach( $photos as $photo )
			<div class="item {{ $count == 1 ? 'active' : '' }}">
				<a href="{{ route('room', $room->id) }}">
					<img src="{{ $photo->path }}" class="img-responsive" alt="" />
				</a>
			</div>
		<?php $count++ ?>
		@endforeach
  	</div>

	<a class="left carousel-control" href="#carousel-example-generic{{$room->id}}" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left glyphicon glyphicon-menu-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic{{$room->id}}" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right glyphicon glyphicon-menu-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>