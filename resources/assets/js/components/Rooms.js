var React = require('react');

import Room from './Room';

var Rooms = React.createClass({
	render() {
		var countryUrl = "/country/" + this.props.countrySlug + "/rooms";
		var count = 1;
		
		var rooms = this.props.rooms.map(function(room) {
			while( count++ <= 3 )
			{			
				return (
					<div key={room.id} className="col-md-4">
						<Room room={room} isLikeable={false} />
					</div>
				)
			}
		});

		return (
			<div className="row">
				{ rooms }
				<div className="Country__see-available-places  col-md-12">
					<p className="text-center">
						<a href={countryUrl} className="btn btn-danger btn-lg">See all available places</a>
					</p>
				</div>
			</div>
		)
	}
});

export default Rooms;
