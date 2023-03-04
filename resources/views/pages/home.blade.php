@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Place</div>

                <div class="card-body">
                    <div>
                        @if (Auth::user()->hasPlace())
                        <a class="btn btn-danger float-end" href="#" onclick="event.preventDefault();document.getElementById('cancel-form').submit();">
                            Résilier
                        </a>

                        <form id="cancel-form" action="{{ route('reservation.destroy', ['reservation' => Auth::user()->reservation()->id]) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>

                        Votre place porte le n° <strong>{{ Auth::user()->place()->numero }}</strong>
                        <br>
                        Temps restant : {{ Auth::user()->reservation()->remainingTime->days }} jour(s) et {{ Auth::user()->reservation()->remainingTime->h }} heure(s)
                        @elseif (Auth::user()->isWaiting())
                            En attente d'une place
                            <br>
                            Position <strong>{{ Auth::user()->position }}</strong> dans la file d'attente
                        @else
                        <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('reservation-form').submit();">
                            Demander une place
                        </a>

                        <form id="reservation-form" action="{{ route('reservation.store') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">Historique des reservations</div>

                <div class="card-body">
                    <ul>
                        @forelse ($reservationsHistory as $reservation)
                        <li>
                            {{ date('d/m/Y', strtotime($reservation->created_at)) }} : attribution de la place n° {{ $reservation->place->numero }} pour une durée de {{ $reservation->duration }} jour(s)
                        </li>
                        @empty
                        <p>Vide</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
