@extends('admin.layouts.app')
 
@section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px"> 
                    <!-- Default Basic Forms Start -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Edit Food</h4> 
                            </div> 
                        </div>
                        
                        <form action="{{ route('admin.foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Food Name</label>
                                <div class="col-sm-12 col-md-10">
                                    <input 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        type="text" 
                                        name="name" 
                                        value="{{ old('name', $food->name) }}"
                                    />
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Restaurant</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12 @error('restaurant_id') is-invalid @enderror" name="restaurant_id">
                                        <option value="">Choose Restaurant...</option>
                                        @foreach($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $food->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                                {{ $restaurant->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('restaurant_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Cuisine</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12 @error('cuisine_id') is-invalid @enderror" name="cuisine_id">
                                        <option value="">Choose Cuisine...</option>
                                        @foreach($cuisines as $cuisine)
                                            <option value="{{ $cuisine->id }}" {{ old('cuisine_id', $food->cuisine_id) == $cuisine->id ? 'selected' : '' }}>
                                                {{ $cuisine->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cuisine_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                                <div class="col-sm-12 col-md-10">
                                    <input 
                                        class="form-control @error('price') is-invalid @enderror" 
                                        type="number" 
                                        name="price" 
                                        step="0.01" 
                                        value="{{ old('price', $food->price) }}"
                                    />
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea class="form-control" name="description">{{ old('description', $food->description) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Food Image</label>
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
                    <!-- Default Basic Forms End -->
                </div> 
            </div>
        </div> 
@endsection