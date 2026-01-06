@extends('admin.layouts.app')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- Update User Form -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Update User</h4>
                    </div>
                </div>

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Nécessaire pour la méthode PUT -->

                    <!-- NAME -->
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                            />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control @error('email') is-invalid @enderror"
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                            />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control @error('password') is-invalid @enderror"
                                type="password"
                                name="password"
                                placeholder="Leave empty to keep current password"
                            />
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control"
                                type="password"
                                name="password_confirmation"
                                placeholder="Leave empty to keep current password"
                            />
                        </div>
                    </div>

                    <!-- BIRTHDAY -->
                    <div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Birthday</label>
						<div class="col-sm-12 col-md-10">
							<input
								class="form-control date-picker @error('birthday') is-invalid @enderror"
								type="text"
								name="birthday"
								value="{{ old('birthday', $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') : '') }}"
							/>
							@error('birthday')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

                    <!-- ROLE -->
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Role</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12 @error('role') is-invalid @enderror" name="role">
                                <option value="">Choose Role...</option>
                                <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="clearfix mb-20">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm" type="submit">
                                Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- End Update User Form -->

        </div>
    </div>
</div>
@endsection
