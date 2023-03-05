@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            BTN simule chron

            <div class="card mt-4">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">File d'attente</h1>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Position</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">
                                    <form action="{{ route('reservations.position', ['utilisateur' => $user->id]) }}" method="POST" onchange="this.submit()">
                                        @csrf

                                        <select class="form-select" aria-label="Default select example">
                                            @for($i = 1; $i <= $users->count(); $i++)
                                            <option value="{{ $i }}" @selected($i == $user->position)>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </form>
                                </th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault();document.getElementById('cancel-form').submit();">
                                        X
                                    </a>

                                    <form id="cancel-form" action="{{ route('utilisateurs.update', ['utilisateur' => $user->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="position" value="">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">Liste des attributions</h1>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Place</th>
                                <th scope="col">Utilisateur</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($places as $place)
                            <tr>
                                <td scope="row">{{ $place->numero }}</td>
                                <td>{{ $place->user() ? $place->user()->name : '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
