<?php

namespace App\Http\Controllers\PlaceController;

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.place.index', [
            'places' => Place::orderBy('numero', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.place.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => ['required', 'string', 'max:255', 'unique:place'],
        ]);

        $place = Place::create([
            'numero' => $request->numero,
        ]);

        return redirect()->route('places.show', ['place' => $place->id])->with('success', 'La place a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.place.show', [
            'place' => Place::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $place = Place::findOrFail($id);

        $request->validate([
            'numero' => ['required', 'string', 'max:255', 'unique:place'],
        ]);

        $place->numero = $request->numero;

        $place->save();

        return redirect()->route('places.show', ['place' => $place->id])->with('success', 'Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Place::findOrFail($id)->delete();

        return redirect()->route('places.index')->with('success', 'Place supprimé avec succès');
    }
}
