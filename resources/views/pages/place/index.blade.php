@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">Liste des places</h1>

                    <a href="{{ route('places.create') }}" class="btn btn-success float-end">Ajouter</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Numéro</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($places as $place)
                            <tr>
                                <th scope="row">{{ $place->id }}</th>
                                <td>{{ $place->numero }}</td>
                                <td>
                                    <a href="{{ route('places.show', ['place' => $place->id]) }}" class="btn btn-primary btn-sm">Voir</a>

                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                        Supprimer
                                    </a>

                                    <form id="delete-form" action="{{ route('places.destroy', ['place' => $place->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
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
