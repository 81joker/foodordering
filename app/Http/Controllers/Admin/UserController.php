<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->take(10)->get();
        // $users = User::paginate(10);

        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.add');
    }

    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if (isset($data['birthday']) && $data['birthday']) {
            $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
        }
        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.user.update', compact('user'));
    }

    public function destroy($id)
    {
        User::destroy($id);

        return back()->with('success', 'User supprimé');
    }
}
