
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h5 d-inline-block mt-2">Place {{ $place->numero }}</h1>

                    <a class="btn btn-danger float-end" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                        Supprimer
                    </a>

                    <form id="delete-form" action="{{ route('places.destroy', ['place' => $place->id]) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('places.update', ['place' => $place->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="numero" class="col-md-4 col-form-label text-md-end">Numero</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero', $place->numero) }}" required autocomplete="numero" autofocus>

                                @error('numero')
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
            @include('includes.history', [
                'reservationsHistory' => $place->reservations()->history()->get(),
            ])
        </div>
    </div>
</div>
@endsection
