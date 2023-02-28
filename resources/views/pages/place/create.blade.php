place.create

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
                            @error('num_place')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
             

                        <div class="input-group">
                            <div class="form-floating">
                                <input class="form-control @error('place_id') is-invalid @enderror" type="text" name="place_id" placeholder=" " value="{{ old('place_id') }}">
                                <label>Id place</label>
                                @error('place_id)
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                       




                        <section class="container">
  <h2 class="py-2">Datepicker in Bootstrap 5</h2>
  <form class="row">
    <label for="date" class="col-1 col-form-label">Date</label>
    <div class="col-5">
      <div class="input-group date" id="datepicker">
        <input type="text" class="form-control" id="date"/>
        <span class="input-group-append">
          <span class="input-group-text bg-light d-block">
            <i class="fa fa-calendar"></i>
          </span>
        </span>
      </div>
    </div>
  </form>
</section>