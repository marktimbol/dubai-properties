var React = require('react');
var ReactDOM = require('react-dom');
var ReactPaginate = require('react-paginate');

import Properties from './Properties';

var PropertiesContainer = React.createClass({
	getInitialState() {
		return {
			pagination: [],
			properties: [],
			currentPage: 0
		}
	},

	fetchProperties() {
		var url = '/api/properties/' + window.buyOrRent;

		$.ajax({
			url: url,
			type: 'GET',
			data: {
				page: this.state.currentPage,
			},
			success: function(response) {
				console.log(response);
				this.setState({
					pagination: response,
					properties: response.data
				});
			}.bind(this),
			error: function(xhr, status, err) {
				console.log(err.toString());
			}.bind(this)
		});
	},


	componentDidMount() {
		this.fetchProperties();
	},

	handlePageClick(data) {
		var selectedPage = data.selected + 1;

		this.setState({ currentPage: selectedPage }, () => {
			this.fetchProperties();
		});
	},

	render() {	
		return (
			<div>
				<div className="row scrollDiv">
					<Properties properties={this.state.properties} />
				</div>

				<ReactPaginate
                   breakLabel={<li className="break"><a href="">...</a></li>}
                   pageNum={ Math.ceil(this.state.pagination.total / this.state.pagination.per_page) }
                   marginPagesDisplayed={3}
                   pageRangeDisplayed={20}
                   clickCallback={this.handlePageClick}
                   containerClassName={"pagination"}
                   subContainerClassName={"pages pagination"}
                   activeClassName={"active"} />
            </div>
		)
	}
});

ReactDOM.render(
	<PropertiesContainer />,
	document.getElementById('PropertiesContainer')
);