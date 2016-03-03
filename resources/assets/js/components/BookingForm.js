var React = require('react');
var ReactDOM = require('react-dom');
var csrf_token = $('meta[name="csrf_token"]').attr('content');

var BookingForm = React.createClass({
	getInitialState() {
		return {
			checkIn: '',
			checkOut: '',
			guests: 1,
			totalDays: 0,
			serviceFee: 8, //sample fee
			total: 0,
			showTotal: false,
		}
	},

	componentDidMount() {

	    $( "#checkIn" ).datepicker({
			changeMonth: false,
			numberOfMonths: 1,
			dateFormat: 'yy-mm-dd',
			minDate: 0, // Today's Date
			showAnim: 'slideDown',
			onSelect: function(selectedDate) {
				var checkOutMinDate = $('#checkIn').datepicker('getDate');
				checkOutMinDate.setDate(checkOutMinDate.getDate() + window.room.minimumStay);

				this.setState({
					checkIn: selectedDate,
				});
				
				$("#checkOut").datepicker("option", "minDate", checkOutMinDate);

			}.bind(this)
	    });

	    $("#checkOut").datepicker({
			changeMonth: false,
			numberOfMonths: 1,
			dateFormat: 'yy-mm-dd',
			showAnim: 'slideDown',
			minDate: 0,
			onSelect: function( selectedDate ) {
				this.setState({ 
					checkOut: selectedDate,
					showTotal: true
				});
				// $("#checkIn").datepicker( "option", "maxDate", selectedDate );
				this.calculateTotal();
			}.bind(this)
	    });
	},

	calculateTotal()
	{
		var roomPrice = window.room.price;

		var url = '/api/total-stay-days/' + this.state.checkOut + '/' + this.state.checkIn;
		$.get(url, function(response) {
			this.setState({
				totalDays: response,
				total: (roomPrice * response) + this.state.serviceFee
			});
		}.bind(this));

	},

	handleGuestsChange(e) {
		this.setState({ guests: e.target.value });
	},

	submitForm(e) {
		e.preventDefault();

		if( ! window.signedIn )
		{
			swal({
				title: "Airbnb",  
				text: "You need to login before you can book a room.",
				type: "error",
				 showConfirmButton: true,
				 confirmButtonText: 'Okay'
			});

			return false;
		}

		var url = '/bookings/' + window.room.id;
		$.ajax({
			url: url,
			type: 'POST',
			headers: { 'X-CSRF-Token' : csrf_token },
			data: {
				roomId: window.room.id,
				checkIn: this.state.checkIn,
				checkOut: this.state.checkOut,
				guests: this.state.guests
			},
			success: function(response) {
				console.log(response)
			}.bind(this),
			error: function(xhr, status, err) {
				console.log(err.toString());
			}.bind(this)
		})
	},

	render() {
		var postUrl = '/bookings/' + window.room.id;

		return (
			<form method="POST" action={postUrl} 
				onSubmit={this.submitForm}>
				<div className="row">
					<div className="col-xs-12 col-md-4 clear-padding-right">
						<div className="form-group">
							<label>Check in</label>
							<input type="text" id="checkIn" 
								className="form-control" 
								placeholder="yyyy-mm-dd" />
						</div>
					</div>
					<div className="col-xs-12 col-md-4 clear-padding-right">
						<div className="form-group">
							<label>Check out</label>
							<input type="text" id="checkOut" 							
								className="form-control" 
								placeholder="yyyy-mm-dd" />
						</div>
					</div>
					<div className="col-xs-12 col-md-4">
						<div className="form-group">
							<label>Guests</label>
							<select className="form-control" 
								value={this.state.guests} 
								onChange={this.handleGuestsChange}
							>
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</div>
					</div>
					{ this.state.showTotal ?
						<div className="col-xs-12 col-md-12">
							<ul className="list-group">
								<li className="list-group-item">
									${window.room.price} &times; {this.state.totalDays} nights
									<p className="float-right">${ window.room.price * this.state.totalDays}</p>
								</li>
								<li className="list-group-item">
									Service Fee
									<p className="float-right">{ this.state.serviceFee }</p>
								</li>
								<li className="list-group-item">
									Total
									<p className="float-right">${ this.state.total }</p>
								</li>
							</ul>
						</div> : ''
					}
					<div className="col-xs-12 col-md-12">
						<div className="form-group">
							<button type="submit" 
								className="btn btn-danger btn-lg btn-block"
								onClick={this.submitForm}
							>	
								Request to Book
							</button>
						</div>
					</div>
				</div>
			</form>
		)
	}
});

ReactDOM.render(
	<BookingForm />,
	document.getElementById('BookingForm')
);