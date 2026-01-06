@extends('admin.layouts.app')

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">

			<div class="pd-20 card-box mb-30">
				<h4 class="text-blue h4">Edit Restaurant</h4>

				<form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}"  enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Restaurant Name</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text"
								   name="name"
								   value="{{ old('name', $restaurant->name) }}">
							@error('name') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Cuisines Select</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select2 form-control"
									multiple name="cuisines_id[]"
									style="width:100%">
								@foreach($cuisines as $cuisine)
									<option value="{{ $cuisine->id }}"
										{{ in_array($cuisine->id, old('cuisines_id', $selected)) ? 'selected' : '' }}>
										{{ $cuisine->name }}
									</option>
								@endforeach
							</select>
							@error('cuisines_id') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Address</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text"
								   name="address"
								   value="{{ old('address', $restaurant->address) }}">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Delivery Fee</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="number" step="0.01"
								   name="delivery_fee"
								   value="{{ old('delivery_fee', $restaurant->delivery_fee) }}">
							@error('delivery_fee') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Description</label>
						<div class="col-sm-12 col-md-10">
							<textarea class="form-control" name="description">{{ old('description', $restaurant->description) }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Images</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control-file" type="file" name="images[]" multiple>
						</div>
					</div>
					<div class="clearfix mb-20">
						<div class="pull-right">
							<button class="btn btn-primary btn-sm" type="submit">Update</button>
						</div>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
@endsection
