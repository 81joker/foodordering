@extends('admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Responsive tables Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Foods</h4>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('admin.foods.create') }}" class="btn btn-primary btn-sm" role="button"><i
                                    class="fa fa-plus"></i> New Food</a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Cuisine</th>
                                    <th scope="col">Restaurant</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($foods as $food)
                                    <tr>
                                        <td scope="row">{{ $food->id }}</th>
                                        <td>
                                            @php
                                                $imagePath = public_path("images/foods/{$food->id}/1.jpg");
                                            @endphp

                                            @if (file_exists($imagePath))
                                                <img src="{{ asset('images/foods/' . $food->id . '/1.jpg') }}"
                                                    alt="{{ $food->name }}" width="60" height="60"
                                                    style="object-fit:cover; border-radius:5px;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->cuisine ? $food->cuisine->name : '-' }}</td>
                                        <td>{{ $food->restaurant ? $food->restaurant->name : '-' }}</td>
                                        <td>{{ number_format($food->price, 2) }}</td>
                                        <td><span class="badge badge-warning">{{ $food->avg_rating }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.foods.edit', $food->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No foods found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $foods->links('admin.pagination.custom') }}
                    </div>
                </div>
                <!-- Responsive tables End -->
            </div>
        </div>
    </div>
@endsection
