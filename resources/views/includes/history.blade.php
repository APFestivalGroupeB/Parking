<div class="card">
    <div class="card-header">Historique des reservations</div>

    <div class="card-body">
        <ul>
            @forelse ($reservationsHistory as $reservation)
            <li>
                {{ date('d/m/Y', strtotime($reservation->created_at)) }} : attribution de la place n° {{ $reservation->place->numero }} à {{ $reservation->user->name }} pour une durée de {{ $reservation->duration }} jour(s)
            </li>
            @empty
            <p>Vide</p>
            @endforelse
        </ul>
    </div>
</div>
