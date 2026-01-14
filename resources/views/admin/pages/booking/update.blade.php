@extends('admin.layouts.app')
 
@section('content') 
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px"> 
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Booking Form</h4> 
							</div>
						</div>
						<form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
							@csrf
							@method('PUT')

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="name" value="{{ $booking->name }}" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="phone" value="{{ $booking->phone }}" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="email" name="email" value="{{ $booking->email }}" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Restaurant</label>
								<div class="col-sm-12 col-md-10">
									<select class="custom-select col-12" name="restaurant_id">
										@foreach($restaurants as $rest)
											<option value="{{ $rest->id }}" 
												@if($booking->restaurant_id == $rest->id) selected @endif>
												{{ $rest->name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Booking Date</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="date" name="booking_date" value="{{ $booking->booking_date }}">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Booking Time</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="time" name="booking_time" value="{{ $booking->booking_time }}">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Number of people</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="number" name="number_of_people" value="{{ $booking->number_of_people }}" min="1" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Status</label>
								<div class="col-sm-12 col-md-10">
									<select class="custom-select col-12" name="status">
										<option value="pending" {{ $booking->status=='pending'?'selected':'' }}>Pending</option>
										<option value="confirmed" {{ $booking->status=='confirmed'?'selected':'' }}>Confirmed</option>
										<option value="cancelled" {{ $booking->status=='cancelled'?'selected':'' }}>Cancelled</option>
										<option value="completed" {{ $booking->status=='completed'?'selected':'' }}>Completed</option>
									</select>
								</div>
							</div>

							<div class="clearfix mb-20">
								<div class="pull-right">
									<button class="btn btn-primary btn-sm" type="submit">Save</button>
								</div>
							</div>
						</form> 
					</div>
					<!-- Default Basic Forms End -->
				</div> 
			</div>
		</div> 
@endsection  
