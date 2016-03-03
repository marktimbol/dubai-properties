var React = require('react');
var ReactDOM = require('react-dom');
var csrfToken = $('meta[name="csrf_token"]').attr('content');

import RoomAmenity from './RoomAmenity';

var RoomAmenities = React.createClass({

	handleChange(e) {
		var url = '/api/room/'+window.room.id+'/amenities/'+e.target.value;

		$.ajax({
			url: url,
			type: 'PUT',
			headers: { 'X-CSRF-Token' : csrfToken },
			success: function(response)
			{
				console.log(response);
			}.bind(this),
			error: function(xhr, status, err) {
				console.log(err.toString());
			}.bind(this)
		});
	},

	render() {
		var amenities = window.amenities.map(function(amenity) {
			var isCheck = false;

			window.room.amenities.map(function(roomAmenity) {
				if( amenity.id == roomAmenity.id )
				{
					isCheck = true;
				}
			});

			return (
				<div key={amenity.id}>
					<RoomAmenity amenity={amenity} checked={isCheck} handleChange={this.handleChange} />
				</div>
			)
		}.bind(this));

		return (
			<div>{ amenities }</div>
		);
	}
});

ReactDOM.render(
	<RoomAmenities />,
	document.getElementById('RoomAmenities')
);