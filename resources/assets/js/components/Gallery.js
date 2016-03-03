var React = require('react');
var ReactDOM = require('react-dom');

var Gallery = React.createClass({

	componentDidMount() {
		$(ReactDOM.findDOMNode(this.refs.carousel)).owlCarousel({
			singleItem : true,
			autoPlay: true,
			pagination: false
		});
	},

	render() {
		var photos = this.props.photos.map(function(photo) {
			return (
				<div key={photo.id}>
				    <img className="img-responsive" 
				         src={ photo.path }
				         alt="" title="" />
				</div>
			)
		});

		return (
			<div ref="carousel">
				{ photos }
			</div>
		)
	}
});

export default Gallery;