@extends('admin.layouts.app')
 
@section('content')
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<!-- Responsive tables Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Reviews</h4>
							</div>
							<div class="pull-right">
								<a
									href="Review-Add.html"
									class="btn btn-primary btn-sm"
									role="button"
									><i class="fa fa-plus"></i> New Review</a
								>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Customer</th>
										<th scope="col">Target</th>
										<th scope="col">Rating</th>
										<th scope="col">Comment</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Johnny Brown</td>
										<td>Resto: Domino's Pizza</td>
										<td><span class="badge badge-success">5</span></td>
										<td>Excellent service and great pizza!</td>
										<td>
											<button class="btn btn-success btn-sm" role="button">
												<i class="fa fa-pencil-square-o"></i>
											</button>
											<button class="btn btn-danger btn-sm" role="button">
												<i class="fa fa-trash"></i>
											</button>
										</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Nik Baker</td>
										<td>Food: Pork Tenderloin</td>
										<td><span class="badge badge-warning">4</span></td>
										<td>Very tasty, but a bit expensive.</td>
										<td>
											<button class="btn btn-success btn-sm" role="button">
												<i class="fa fa-pencil-square-o"></i>
											</button>
											<button class="btn btn-danger btn-sm" role="button">
												<i class="fa fa-trash"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div> 
					</div>
					<!-- Responsive tables End -->
				</div>
			</div>
		</div> 
@endsection  