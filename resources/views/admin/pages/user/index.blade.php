@extends('admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <!-- Responsive tables Start -->
                <div class="pd-20 card-box mb-30">

                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Users</h4>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> New User
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Role</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            {{ $user->birthday ? $user->birthday : '—' }}
                                        </td>

                                        <td>
                                            @if ($user->role == 'admin')
                                                <span class="badge badge-secondary">Admin</span>
                                            @else
                                                <span class="badge badge-primary">Customer</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete this user?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="mt-3">
                        {{ $users->links('admin.pagination.custom') }}
                    </div> --}}

                </div>
                <!-- Responsive tables End -->

            </div>
        </div>
    </div>
@endsection
