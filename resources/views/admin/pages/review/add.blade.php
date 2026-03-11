@extends('admin.layouts.app')
 
@section('content')
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px"> 
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Review Form</h4> 
							</div>
						</div>
						<form>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Customer</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										placeholder="Johnny Brown"
										name="name"
										disabled
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Restaurant</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										placeholder="Johnny Brown"
										name="restaurant_name"
										disabled
									/>
								</div>
							</div>  
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Rating (1-5)</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="number" placeholder="5" name="rating" min="1" max="5" disabled/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Comment</label>
								<div class="col-sm-12 col-md-10">
									<textarea class="form-control" name="comment" placeholder="Write review..." disabled></textarea>
								</div>
							</div> 
						</form>
					</div>
					<!-- Default Basic Forms End -->
				</div> 
			</div>
		</div> 
@endsection  