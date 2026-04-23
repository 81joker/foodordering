@extends('admin.layouts.app')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- Responsive tables Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Cuisines</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.cuisines.create') }}" class="btn btn-primary btn-sm" role="button">
                            <i class="fa fa-plus"></i> New Cuisine
                        </a>
                    </div>
                </div>

                @if(session('success'))
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
                                <th scope="col" width="10%">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cuisines as $cuisine)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th> <!-- Ou {{ $cuisine->id }} -->
                                    <td>{{ $cuisine->name }}</td>
                                    <td>
                                            <a href="{{ route('admin.cuisines.edit', $cuisine->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.cuisines.destroy', $cuisine->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this cuisine?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form> 
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        No cuisines found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $cuisines->links('admin.pagination.custom') }} <!-- Assurez-vous d'utiliser la pagination dans le Controller -->
                </div>

            </div>
            <!-- Responsive tables End -->
            
        </div>
    </div>
</div>
@endsection