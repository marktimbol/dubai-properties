var React = require('react');
var googlemap_key = $('meta[name="googlemap_key"]').attr('content');

var WhyVisit = React.createClass({
	render() {
		var google_map = `https://maps.googleapis.com/maps/api/staticmap?center=${this.props.emirate}&zoom=5&size=400x215&key=${googlemap_key}`

		return (
			<div>
				<h4 className="Country__why-visit-title">Why {this.props.emirate}?</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				</p>
				<p>&nbsp;</p>
				<div>
					<img src={google_map} 
						alt={this.props.emirate} title={this.props.emirate}
						className="img-responsive" />
				</div>
			</div>
		)
	}
});

export default WhyVisit;