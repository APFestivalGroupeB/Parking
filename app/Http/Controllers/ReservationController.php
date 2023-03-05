<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Place;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.reservation.index', [
            'places' => Place::orderBy('numero', 'asc')->get(),
            'users' => User::waiting()->orderBy('position', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($place = Place::free()->first()) {
            $user->reservations()->create([
                'date_fin' => Carbon::now()->addDays(7)->toDateString(),
                'place_id' => $place->id,
            ]);
        } else {
            $user->wait();
        }

        return redirect()->route('home')->with('success', 'Demande de place prise en compte');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reservation::findOrFail($id)->update([
            'date_fin' => date('Y-m-d'),
        ]);

        return redirect()->back()->with('success', 'Réservation résilié');
    }
}
