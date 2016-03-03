var React = require('react');
var classNames = require('classnames');
import Gallery from './Gallery';

var Property = React.createClass({

	render() {
		var propertyUrl = '/properties/' + this.props.property.to + '/' + this.props.property.emirate + '/' + this.props.property.slug;
	    var propertyPrice = classNames({
	      'Property__price': true,
	      'Property__price--for-rent': this.props.property.to == 'rent',
	      'Property__price--for-sale': this.props.property.to == 'buy',
	    });

		return (
			<div className="Property">
				{ this.props.isLikeable ?
					<div className="Property__header">
						<a href="#">
							<i className="fa fa-heart-o fa-2x"></i>
						</a>
					</div> : ''
				}
				<div className="Property__gallery">
					<Gallery id={this.props.property.id} photos={this.props.property.photos} />
					<h4 className={propertyPrice}>
						<span className="currency">AED</span> { this.props.property.price }
					</h4>
					<div className="Property__agent">
						<a href="#">
							<img src="http://lorempixel.com/70/70/people" 
								width="70" height="70"
								className="img-circle" 
								alt={this.props.property.user.name} 
								alt={this.props.property.user.name}
								title={this.props.property.user.name} />
						</a>
					</div>
				</div>
				<div className="Property__content">
					<h3 className="Property__name">
						<a href={propertyUrl}>
							{ this.props.property.name.substr(0, 37) }
							{ this.props.property.name.length > 40 ? '...' : '' }
						</a>
					</h3>
					<ul>
						<li><i className="fa fa-expand"></i> 3326 sq. ft</li>
						<li><i className="fa fa-bed"></i> 3</li>
						<li><i className="fa fa-bed"></i> 2</li>
					</ul>
				</div>
			</div>
		)
	}
});

export default Property;