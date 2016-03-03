var React = require('react');

import Gallery from './Gallery';

var Room = React.createClass({
	render() {
		var roomUrl = '/room/' + this.props.room.id;

		return (
			<div className="Room">
				{ this.props.isLikeable ?
					<div className="Room__header">
						<a href="#">
							<i className="fa fa-heart-o fa-2x"></i>
						</a>
					</div> : ''
				}
				<div className="Room__gallery">
					<Gallery id={this.props.room.id} photos={this.props.room.photos} />
					<h4 className="Room__price">
						<span className="currency">$</span> { this.props.room.price }
					</h4>
					<div className="Room__user">
						<a href="#">
							<img src="http://lorempixel.com/70/70/people" 
								width="70" height="70"
								className="img-circle" 
								alt={this.props.room.user.name} 
								alt={this.props.room.user.name}
								title={this.props.room.user.name} />
						</a>
					</div>
				</div>
				<div className="Room__footer">
					<h3 className="Room__name">
						<a href={roomUrl}>
							{ this.props.room.name }
						</a>
					</h3>
					<h5 className="Room__type">Private Room</h5>
				</div>
			</div>
		)
	}
});

export default Room;