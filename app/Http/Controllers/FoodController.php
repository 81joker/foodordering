<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Cuisine;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::with(['restaurant', 'cuisine'])->latest()->paginate(10);

        return view('admin.pages.food.index', compact('foods'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $cuisines = Cuisine::all();

        return view('admin.pages.food.add', compact('restaurants', 'cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        $food = Food::create($request->validated());

        // Créer dossier images
        $folder = public_path('images/foods/'.$food->id);
        if (! file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // Upload des images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = $image->getClientOriginalName();
                $image->move($folder, $fileName);
            }
        }

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $restaurants = Restaurant::all();
        $cuisines = Cuisine::all();

        return view('admin.pages.food.update', compact('food', 'restaurants', 'cuisines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food)
    {
        $food->update($request->validated());

        $folder = public_path('images/foods/'.$food->id);
        if (! file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // Si de nouvelles images sont envoyées, supprimer les anciennes
        if ($request->hasFile('images')) {
            $oldFiles = glob($folder.'/*');
            foreach ($oldFiles as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }

            foreach ($request->file('images') as $image) {
                $fileName = $image->getClientOriginalName();
                $image->move($folder, $fileName);
            }
        }

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $folder = public_path('images/foods/'.$food->id);

        if (file_exists($folder)) {
            $files = glob($folder.'/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            rmdir($folder);
        }
        $food->delete();

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food deleted successfully.');
    }
}
