@extends('public.layouts.default')

@section('bodyClass', 'cream page')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page__title">Rooms <span><a href="/user/rooms/create" class="btn btn-default">Add Room</a></span></h1>
				<ul class="list-group">
					@foreach( $rooms as $room )
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-3">
								<img src="http://placehold.it/300x250" alt="" title="" class="img-responsive" />
							</div>

							<div class="col-md-9">
								<h4>
									<a href="{{ route('room', $room->id) }}">
										{{ $room->name }}
									</a>
								</h4>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')

@endsection	