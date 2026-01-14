@extends('admin.layouts.app')
 
@section('content')
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<!-- Responsive tables Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Bookings</h4>
							</div> 
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Customer</th>
										<th scope="col">Restaurant</th>
										<th scope="col">Date</th>
										<th scope="col">Time</th>
										<th scope="col">Number of people</th>
										<th scope="col">Status</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
								@foreach($bookings as $booking)
									<tr>
										<th scope="row">{{ $booking->id }}</th>

										<td>{{ $booking->name }}</td>

										<td>{{ $booking->restaurant->name }}</td>

										<td>{{ $booking->booking_date }}</td>

										<td>{{ $booking->booking_time }}</td>

										<td>{{ $booking->number_of_people }}</td>

										<td>
											@if($booking->status == 'confirmed')
												<span class="badge badge-success">Confirmed</span>
											@elseif($booking->status == 'pending')
												<span class="badge badge-warning">Pending</span>
											@elseif($booking->status == 'cancelled')
												<span class="badge badge-danger">Cancelled</span>
											@else
												<span class="badge badge-info">Completed</span>
											@endif
										</td>

										<td>
											<a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-success btn-sm">
												<i class="fa fa-pencil-square-o"></i>
											</a>

											<form action="{{ route('admin.bookings.destroy', $booking->id) }}" 
												method="POST" 
												style="display:inline-block;">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div> 
					</div>
					<!-- Responsive tables End -->
				</div>
			</div>
		</div> 
@endsection  
