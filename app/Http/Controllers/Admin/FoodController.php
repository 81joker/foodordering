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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::with(['restaurant', 'cuisine'])->latest()->paginate(10);

        return view('admin.pages.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        $validated = $request->validated();
        $food = Food::create(collect($validated)->except('variants')->toArray());
        $this->syncVariants($food, $validated['variants'] ?? []);

        $folder = public_path('images/foods/'.$food->id);
        if (! file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        if ($request->hasFile('images')) {

            $oldFiles = glob($folder.'/*');
            foreach ($oldFiles as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move($folder, $imageName);
            }
        }

        // Upload des images
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $fileName = $image->getClientOriginalName();
        //         $image->move($folder, $fileName);
        //     }
        // }

        // if ($request->hasFile('images')) {
        //         $image = $request->file('images')[0];
        //         $image->move($folder, '1.jpg');
        //     }

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $food->load('variants');
        $restaurants = Restaurant::all();
        $cuisines = Cuisine::all();

        return view('admin.pages.food.update', compact('food', 'restaurants', 'cuisines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food)
    {
        $validated = $request->validated();
        $food->update(collect($validated)->except('variants')->toArray());
        $this->syncVariants($food, $validated['variants'] ?? []);

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

            // TODO: change this function to handle multiple images good before to ripped
            // foreach ($request->file('images') as $image) {
            //     $fileName = $image->getClientOriginalName();
            //     $image->move($folder, $fileName);
            // }
            if ($request->hasFile('images')) {
                $image = $request->file('images')[0];

                $image->move($folder, '1.jpg');
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

    private function syncVariants(Food $food, array $variants): void
    {
        $food->variants()->delete();

        $cleanVariants = collect($variants)
            ->filter(function ($variant) {
                return ! empty($variant['name']) && isset($variant['price']);
            })
            ->values();

        foreach ($cleanVariants as $index => $variant) {
            $food->variants()->create([
                'name' => $variant['name'],
                'price' => $variant['price'],
                'sort_order' => $index,
                'is_available' => true,
            ]);
        }
    }
}
