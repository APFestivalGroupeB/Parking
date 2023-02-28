
@extends('layouts.app')
<div class="section-card">
    <div class="section-card__header">
        <h1 class="h4 text-nowrap">Ajouter une place</h1>
    </div>

    <form action="{{ route('place.store') }}" method="POST">
        @csrf
        <div class="section-card__body">
            <div class="row">
                <div class="col">
                    <div class="row">
                       

                        <div class="form-floating col">
                            <input class="form-control @error('num_place') is-invalid @enderror" type="text" name="num_place" placeholder=" " value="{{ old('num_place') }}">
                            <label>Numero place</label>
                            
                        </div>
                   
             

                        <div class="input-group">
                            <div class="form-floating">
                                <input class="form-control @error('place_id') is-invalid @enderror" type="text" name="place_id" placeholder=" " value="{{ old('place_id') }}">
                                <label>Id place</label>
                              
                    </div>
                       


                            <div class="section-card__footer">
            <button type="submit" class="btn btn-success">Valider</button>
        </div>
    </form>
</div>



                       