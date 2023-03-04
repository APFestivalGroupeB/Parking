@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">Liste des utilisateurs</h1>

                    <a href="{{ route('utilisateurs.create') }}" class="btn btn-success float-end">Ajouter</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Statut</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->est_valide ? '<span class="text-success">validé</span>' : '<span class="text-warning">en attente</span>' !!}</td>
                                <td><span class="badge bg-success">{{ $user->est_admin ? 'admin' : '' }}</span></td>
                                <td>
                                    <a href="{{ route('utilisateurs.show', ['utilisateur' => $user->id]) }}" class="btn btn-primary btn-sm">Voir</a>

                                    @if ($user->id != Auth::user()->id)
                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                        Supprimer
                                    </a>

                                    <form id="delete-form" action="{{ route('utilisateurs.destroy', ['utilisateur' => $user->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
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
