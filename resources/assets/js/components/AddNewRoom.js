var React = require('react');
var ReactDOM = require('react-dom');
var csrfToken = $('meta[name="csrf_token"]').attr('content');

var AddNewRoom = React.createClass({

	getInitialState() {
		return {
			name: '',
			price: '',
			minimumStay: '',
			propertyType: '',
			roomType: '',
			accommodates: '',
			bathrooms: 	'',
			bedType: '',
			bedrooms: '',
			beds: '',
			checkIn: '',
			checkOut: '',
			extraPeopleFee: '',
			cleaningFee: '',

			isSubmitted: false,
			errors: ''
		}
	},

	handleChange(name, e)
	{
		var newState = {};
		newState[name] = e.target.value;

		this.setState(newState)
	},

	submitForm(e) {

		e.preventDefault();
		
		this.setState({
			isSubmitted: true
		});

		var storeRoomUrl = '/user/rooms';

		$.ajax({
			url: storeRoomUrl,
			type: 'POST',
			headers: {
				'X-CSRF-Token' : csrfToken,
			},
			data: {
				name: this.state.name,
				price: this.state.price,
				minimumStay: this.state.minimumStay,
				aboutListing: '',
				propertyType: this.state.propertyType,
				roomType: this.state.roomType,
				accommodates: this.state.accommodates,
				bathrooms: 	this.state.bathrooms,
				bedType: this.state.bedType,
				bedrooms: this.state.bedrooms,
				beds: this.state.beds,	
				checkIn: this.state.checkIn,
				checkOut: this.state.checkOut,
				extraPeopleFee: this.state.extraPeopleFee,
				cleaningFee: this.state.cleaningFee,
				description: ''
			},
			success: function(response) {
				console.log(response);

				this.setState({
					errors: '',
					isSubmitted: false
				});

				swal({
					title: "Airbnb",  
					text: response,  
					type: "success", 
					timer: 2000,
					showConfirmButton: false,
					confirmButtonText: 'Okay'
				});
			}.bind(this),
			error: function(xhr, status, err) {		
	            var errors = xhr.responseJSON;
	            var errorMessages= '';
	            
	            $.each( errors, function( key, value ) {
	                errorMessages += '<li>' + value[0] + '</li>';
	            });

	            this.setState({
	            	errors: errorMessages,
	            	isSubmitted: false
	            });

			}.bind(this)
		})
	},

	displayErrors() { 
		return {
			__html: this.state.errors
		}
	},

	render() {
		var countArray = ['', 1, 2, 3, 4, 5];

		var minimumStayOptions = countArray.map(function(count, index) {
			return (
				<option key={index} value={count}>
					{ 
						count !== '' ?
							<span>{ count } day{ count > 1 ? 's' : '' }</span> :
							'Please select'
					}
				</option>
			)
		});
		
		var propertyTypes = ['', 'Other', 'Apartment'];
		var propertyTypeOptions = propertyTypes.map(function(type, index) {
			return (
				<option key={index} value={type}>
					{ 
						type !== '' ?
							type :
							'Please select'
					}
				</option>
			)
		});

		var roomTypes = ['', 'Private Room', 'Entire home/apt', 'Shared Room'];
		var roomTypeOptions = roomTypes.map(function(type, index) {
			return (
				<option key={index} value={type}>
					{ 
						type !== '' ?
							type :
							'Please select'
					}
				</option>
			)
		});

		var accommodatesOptions = countArray.map(function(count, index) {
			return (
				<option key={index} value={count}>
					{ 
						count !== '' ?
							<span>{ count } person{ count > 1 ? 's' : '' }</span> :
							'Please select'
					}
				</option>
			)
		});

		var bathroomsOptions = countArray.map(function(count, index) {
			return (
				<option key={index} value={count}>
					{ 
						count !== '' ?
							<span>{ count } bathroom{ count > 1 ? 's' : '' }</span> :
							'Please select'
					}
				</option>
			)
		});

		var bedroomsOptions = countArray.map(function(count, index) {
			return (
				<option key={index} value={count}>
					{ 
						count !== '' ?
							<span>{ count } bedroom{ count > 1 ? 's' : '' }</span> :
							'Please select'
					}
				</option>
			)
		});

		var bedsOptions = countArray.map(function(count, index) {
			return (
				<option key={index} value={count}>
					{ 
						count !== '' ?
							<span>{ count } bed{ count > 1 ? 's' : '' }</span> :
							'Please select'
					}
				</option>
			)
		});

		var timings = [
			'', '8:00 AM', '8:30 AM', '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM',
			'01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM', '05:00 PM',
			'05:30 PM', '06:00 PM', '06:30 PM', '07:00 PM', '07:30 PM', '08:00 PM', '08:30 PM', '09:00 PM', '09:30 PM',
			'10:00 PM', '10:30 PM', '11:00 PM', '11:30 PM'
		];

		var timingsOptions = timings.map(function(time, index) {
			return (
				<option key={index} value={time}>
					{ 
						time !== '' ?
							time :
							'Please select'
					}
				</option>
			)
		});

		return(
			<form onSubmit={this.submitForm}>
				<div className="row">
					<div className="col-md-12">
						<h1 className="page__title">Add New Room</h1>
						<hr />
						<div className="row">
							<div className="col-md-12">
								<h3>Room Information</h3>
								<hr />
							</div>
							<div className="col-md-4">
								<div className="form-group">
									<label>Name</label>
									<input type="text" 
										className="form-control" 
										value={ this.state.name } 
										onChange={this.handleChange.bind(this, 'name')}
										refs="name"
										placeholder="What's your room name?" />
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Price</label>
									<div className="input-group">
										<div className="input-group-addon">$</div>
										<input type="text"
											className="form-control" 
											value={ this.state.price } 
											onChange={this.handleChange.bind(this, 'price')}
											placeholder="Price per night" />
									</div>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Minimum Stay</label>
									<select className="form-control" 
										value={this.state.minimumStay}
										onChange={this.handleChange.bind(this, 'minimumStay')}>
										{ minimumStayOptions }
									</select>
								</div>		
							</div>
						</div>
						
						<div className="row">
							<div className="col-md-12">
								<h3>The Space</h3>
								<hr />
							</div>
							<div className="col-md-4">
								<div className="form-group">
									<label>Property Type</label>
									<select className="form-control" 
										value={this.state.propertyType}
										onChange={this.handleChange.bind(this, 'propertyType')}>
										{ propertyTypeOptions }
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Room Type</label>
									<select className="form-control" 
										value={this.state.roomType}
										onChange={this.handleChange.bind(this, 'roomType')}>
										{ roomTypeOptions }
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Accommodates</label>
									<select className="form-control" 
										value={this.state.accommodates}
										onChange={this.handleChange.bind(this, 'accommodates')}>
										{ accommodatesOptions }
									</select>
								</div>
							</div>
						</div>

						<div className="row">
							<div className="col-md-4">
								<div className="form-group">
									<label>Bathrooms</label>
									<select className="form-control"
										value={this.state.bathrooms}
										onChange={this.handleChange.bind(this, 'bathrooms')}>
										{ bathroomsOptions }
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Bed Type</label>
									<input type="text"
										className="form-control" 
										value={this.state.bedType}
										onChange={this.handleChange.bind(this, 'bedType')}
										placeholder="Bed Type" />
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Bedrooms</label>
									<select className="form-control"
										value={this.state.bedrooms}
										onChange={this.handleChange.bind(this, 'bedrooms')}>
										{ bedroomsOptions }
									</select>
								</div>
							</div>
						</div>

						<div className="row">
							<div className="col-md-4">
								<div className="form-group">
									<label>Beds</label>
									<select className="form-control"
										value={this.state.beds}
										onChange={this.handleChange.bind(this, 'beds')}>
										{ bedsOptions }
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Check In</label>
									<select className="form-control"
										value={this.state.checkIn}
										onChange={this.handleChange.bind(this, 'checkIn')}>
										{ timingsOptions }
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Check Out</label>
									<select className="form-control" 
										value={this.state.checkOut}
										onChange={this.handleChange.bind(this, 'checkOut')}>
										{ timingsOptions }
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div className="row">
					<div className="col-md-12">
						<h3>Prices</h3>
						<hr />
					</div>

					<div className="col-md-3">
						<div className="form-group">
							<label>Extra People</label>
							<div className="input-group">
								<div className="input-group-addon">$</div>
								<input type="text" 
									className="form-control" 
									value={this.state.extraPeopleFee}
									onChange={this.handleChange.bind(this, 'extraPeopleFee')} 
									placeholder="Extra People Fee" />
							</div>
						</div>
					</div>

					<div className="col-md-3">
						<div className="form-group">
							<label>Cleaning Fee</label>
							<div className="input-group">
								<div className="input-group-addon">$</div>
								<input type="text" 
									className="form-control"
									value={this.state.cleaningFee}
									onChange={this.handleChange.bind(this, 'cleaningFee')}
									placeholder="Cleaning Fee" />
							</div>
						</div>
					</div>
				</div>

				{ this.state.errors !== '' ?
					<div className="alert alert-danger" dangerouslySetInnerHTML={this.displayErrors()}></div>
				: '' }

				<hr />

				<div className="row">
					<div className="col-md-12">
						<button type="submit" 
							name="submit" 
							className="btn btn-primary btn-lg"
							disabled={this.state.isSubmitted ? 'disabled' : ''}
							onClick={this.submitForm}>
							Save Room Information &nbsp; 
							{ this.state.isSubmitted ? <i className="fa fa-spinner fa-spin"></i> : '' }
						</button>
					</div>
				</div>
			</form>
		);	
	}
});

ReactDOM.render(
	<AddNewRoom />,
	document.getElementById('AddNewRoom')
);