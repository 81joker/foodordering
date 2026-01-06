<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'phone'    => 'nullable|max:20',
            'birthday' => 'nullable|date',
            'role'     => 'required|in:customer,admin',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        if ($request->birthday) {
            $data['birthday'] = Carbon::parse($request->birthday)->format('Y-m-d');
        }
        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User créé');
    }
}
