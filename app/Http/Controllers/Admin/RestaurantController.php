<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Cuisine;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::latest()->paginate(10);

        return view('admin.pages.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuisines = Cuisine::all(); // pour le multi-select

        return view('admin.pages.restaurant.add', compact('cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        // Création simple (sans image)
        $restaurant = Restaurant::create([
            'name' => $request->name,
            'address' => $request->address,
            'delivery_fee' => $request->delivery_fee,
            'description' => $request->description,
            'avg_rating' => 0,
        ]);

        // Pivot
        if ($request->cuisines_id) {
            $restaurant->cuisines()->sync($request->cuisines_id);
        }

        // 3. Multi-upload d’images
        if ($request->hasFile('images')) {

            $folderPath = public_path('images/restaurants/'.$restaurant->id);

            // Créer le dossier
            if (! file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $i = 1; // pour 1.jpg, 2.jpg, ...

            foreach ($request->file('images') as $image) {

                // récupérer le nom original fourni par ton input
                // $imageName = $image->getClientOriginalName();
                // // exemple : 1.jpg, 3.png, photo.jpeg

                // // déplacer dans le dossier final
                // $image->move($folderPath, $imageName);

                $image = $request->file('images')[0];

                $image->move($folderPath, 'logo.png');
            }
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant ajouté avec succès.');
    }

    public function edit(Restaurant $restaurant)
    {
        $cuisines = Cuisine::all();
        $selected = $restaurant->cuisines->pluck('id')->toArray();

        return view('admin.pages.restaurant.update', compact('restaurant', 'cuisines', 'selected'));
    }

    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        // Mise à jour
        $restaurant->update([
            'name' => $request->name,
            'address' => $request->address,
            'delivery_fee' => $request->delivery_fee,
            'description' => $request->description,
        ]);

        // Mise à jour des cuisines
        $restaurant->cuisines()->sync($request->cuisines_id ?? []);
        // 3. Dossier
        $folder = public_path('images/restaurants/'.$restaurant->id);
        if (! file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        // 4. Si l’utilisateur a envoyé des nouvelles images
        if ($request->hasFile('images')) {

            // 🔥 Supprimer toutes les anciennes images
            $oldFiles = glob($folder.'/*');
            foreach ($oldFiles as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }

            // 🔥 Ajouter les nouvelles images
            foreach ($request->file('images') as $image) {

                $imageName = $image->getClientOriginalName();
                $image->move($folder, $imageName);
            }
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant mis à jour avec succès.');
    }

    public function destroy(Restaurant $restaurant)
    {
        // 1. Chemin du dossier images
        $folder = public_path('images/restaurants/'.$restaurant->id);

        // 2. Supprimer le dossier si existe
        if (file_exists($folder)) {

            // supprimer tous les fichiers
            $files = glob($folder.'/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }

            // supprimer le dossier
            rmdir($folder);
        }
        $restaurant->delete();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant supprimé avec succès.');
    }
}
