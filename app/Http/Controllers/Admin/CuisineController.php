<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Http\Requests\CuisineRequest;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupère les cuisines, triées par date (plus récent en premier) avec pagination
        $cuisines = Cuisine::latest()->paginate(10);

        return view('admin.pages.cuisine.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.cuisine.add');
    }

    public function store(CuisineRequest $request)
    {
        Cuisine::create($request->validated());

        return redirect()
            ->route('admin.cuisines.index')
            ->with('success', 'Kitchen added successfully.');
    }


    public function edit(Cuisine $cuisine)
    {
        return view('admin.pages.cuisine.update', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuisineRequest $request, Cuisine $cuisine)
    {
        $cuisine->update($request->validated());

        return redirect()
            ->route('admin.cuisines.index')
            ->with('success', 'Kitchen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();

        return redirect()
            ->route('admin.cuisines.index')
            ->with('success', 'Kitchen deleted successfully.');
    }
}
