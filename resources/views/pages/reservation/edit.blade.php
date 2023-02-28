reservation.edit


<div class="section-card">
    <div class="section-card__header">
        <h1 class="h4 text-nowrap">Supprimer une reservation</h1>
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
                            @error('num_place')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                   
             

                        <div class="input-group">
                            <div class="form-floating">
                                <input class="form-control @error('place_id') is-invalid @enderror" type="text" name="place_id" placeholder=" " value="{{ old('place_id') }}">
                                <label>Id place</label>
                                @error('place_id)
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                       


                            <div class="section-card__footer">
            <button type="submit" class="btn btn-success">Suppprimer</button>
        </div>
    </form>
</div>