var React = require('react');
var ReactDOM = require('react-dom');

import WhyVisit from './WhyVisit';
import Properties from './Properties';

var PropertiesPerEmirate = React.createClass({

	getInitialState() {
		return {
			properties: []
		}
	},

	render() {
		var emirates = [
		    'dubai', 'abu-dhabi', 'al-ain', 'ajman', 'fujairah', 
		    'ras-al-khaimah', 'sharjah', 'umm-al-quwain'
		];

		var propertiesPerCities = emirates.map(function(emirate) {
			var cityUrl = "/api/properties/city/" + emirate;

			return (
				<div key={emirate} className="City col-md-12">
					<h2>{ emirate }</h2>
					<div className="row">
						<div className="City__gallery col-md-8">
							<div>
								<img src="http://lorempixel.com/1300/800/city" 
									className="img-responsive" 
									alt="" />
							</div>	
						</div>
						<div className="City__why-visit col-md-4">
							<WhyVisit emirate={emirate} />
						</div>
					</div>
					<div className="row">
						<div className="City__available-in col-md-12">
							<h4>Available in { emirate }</h4>
							<Properties url={cityUrl} />
						</div>	
					</div>

					<div className="row">
						<p>&nbsp;</p>
						<div className="text-center">
							<a href="#" className="btn btn-danger">View all properties</a>
						</div>
					</div>
				</div>
			)
		}.bind(this));

		return (
			<div>{ propertiesPerCities }</div>
		)
	}
});

ReactDOM.render(
	<PropertiesPerEmirate />,
	document.getElementById('PropertiesPerEmirate')
);