@extends('admin.layouts.app')

@section('content') 
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="pd-20 card-box mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h4 class="text-blue h4">Restaurants</h4>
					</div>
					<div class="pull-right">
						<a href="{{ route('admin.restaurants.create') }}"
						   class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> New Restaurant
						</a>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th scope="col">Image</th>
								<th>Name</th>
								<th>Address</th>
								<th>Delivery Fee</th>
								<th>Rating</th>
								<th>Cuisines</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse($restaurants as $restaurant)
								<tr>
									<td>{{ $restaurant->id }}</td>
									<td>
										@php
											$imagePath = public_path("images/restaurants/{$restaurant->id}/logo.png");
										@endphp

										@if(file_exists($imagePath))
											<img src="{{ asset("images/restaurants/{$restaurant->id}/logo.png") }}" alt="{{ $restaurant->name }}" width="60" height="60" style="object-fit:cover; border-radius:5px;">
										@else
											<span class="text-muted">No image</span>
										@endif
									</td>
									<td>{{ $restaurant->name }}</td>
									<td>{{ $restaurant->address }}</td>
									<td>${{ number_format($restaurant->delivery_fee, 2) }}</td>
									<td>
										<span class="badge badge-warning">
											{{ number_format($restaurant->avg_rating, 2) }}
										</span>
									</td>
									<td>
										@foreach($restaurant->cuisines as $c)
											<span class="badge badge-secondary">{{ $c->name }}</span>
										@endforeach
									</td>
									<td>
										<a href="{{ route('admin.restaurants.edit', $restaurant->id) }}"
										   class="btn btn-success btn-sm">
											<i class="fa fa-pencil-square-o"></i>
										</a>

										<form method="POST"
											  action="{{ route('admin.restaurants.destroy', $restaurant->id) }}"
											  style="display:inline-block">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger btn-sm"
													onclick="return confirm('Are you sure?')">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="7" class="text-center">No data found.</td>
								</tr>
							@endforelse
						</tbody>
					</table>

					<div class="mt-3">
						{{ $restaurants->links('admin.pagination.custom') }}
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
