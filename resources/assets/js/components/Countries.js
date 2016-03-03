var React = require('react');
var ReactDOM = require('react-dom');

import Rooms from './Rooms';
import Gallery from './Gallery';
import WhyVisit from './WhyVisit';

var Countries = React.createClass({
	getInitialState() {
		return {
			countries: window.countries,
		}
	},

	render() {
		var countries = window.countries.map(function(country) {
			return (
				<div key={country.id} className="Country col-md-12">
					<h2>{ country.name }</h2>
					<div className="row">
						<div className="Country__gallery col-md-8">
							<Gallery id={country.id} photos={country.photos} />
						</div>
						<div className="Country__why-visit col-md-4">
							<WhyVisit country={country} />
						</div>
					</div>
					<div className="row">
						<div className="Country__available-in col-md-12">
							<h4>Available in { country.name }</h4>
							<Rooms rooms={country.rooms} countrySlug={country.slug} />
						</div>	
					</div>
				</div>
			)
		});

		return (
			<div>{ countries }</div>
		)
	}
});

ReactDOM.render(
	<Countries />,
	document.getElementById('Countries')
);