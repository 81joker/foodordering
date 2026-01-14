<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        dd('Admin Dashboard');

        return view('admin.pages.dashboard.index', []);
    }
}
