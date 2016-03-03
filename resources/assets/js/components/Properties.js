var React = require('react');
import Property from './Property';

var Properties = React.createClass({

	getInitialState()
	{
		return {
			properties: [],
		}
	},

	componentDidMount() {
		if( this.props.url )
		{
			this.fetchProperties();
		}
	},

	fetchProperties() {
		$.get(this.props.url, function(response) {
			this.setState({
				properties: response
			})
		}.bind(this));
	},

	render() {	
		if( this.props.url )
		{
			var properties = this.state.properties.map(function(property) {
				return (				
					<div key={property.id} className="col-xs-12 col-md-4">
						<Property property={property} isLikeable={true} />
					</div>
				)
			});
		} 
		else 
		{		
			var properties = this.props.properties.map(function(property) {
				return (				
					<div key={property.id} className="col-xs-12 col-md-6">
						<Property property={property} isLikeable={true} />
					</div>
				)
			});
		}

		return (
			<div className="row">
				{ properties }
            </div>
		)
	}
});

export default Properties;