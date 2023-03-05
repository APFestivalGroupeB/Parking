
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">Utilisateur {{ $user->name }}</h1>

                    <a class="btn btn-danger float-end" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                        Supprimer
                    </a>

                    <form id="delete-form" action="{{ route('utilisateurs.destroy', ['utilisateur' => $user->id]) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('utilisateurs.update', ['utilisateur' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="current_pwd" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="current_pwd" type="password" class="form-control @error('current_pwd') is-invalid @enderror" name="current_pwd" required>

                                @error('current_pwd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Mot de passe</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('utilisateurs.update', ['utilisateur' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="current_pwd" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="current_pwd" type="password" class="form-control @error('current_pwd') is-invalid @enderror" name="current_pwd" required>

                                @error('current_pwd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Nouveau</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmer nouveau</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Changer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (Auth::user()->isAdmin())
        <div class="col-md-8 mt-4">
            @include('includes.history', [
                'reservationsHistory' => $user->reservations()->history()->get(),
            ])
        </div>
        @endif
    </div>
</div>
@endsection
