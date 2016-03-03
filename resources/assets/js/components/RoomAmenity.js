var React = require('react');

var RoomAmenity = React.createClass({

	render() {
		return (
			<div className="col-xs-6 col-md-3">
				<div className="checkbox">
					<label>
						<input type="checkbox" 
							value={this.props.amenity.id}
							defaultChecked={this.props.checked}
							onChange={this.props.handleChange} />
							{ this.props.amenity.name }
					</label>
				</div>
			</div>
		);
	}
});

export default RoomAmenity;