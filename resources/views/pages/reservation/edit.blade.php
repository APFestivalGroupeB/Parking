
@extends('layouts.app')


@section('content')



<div class="section-card">
	<div class="section-card__header">
		<h1 class="h4 text-nowrap">Supprimer une reservation</h1>
	</div>
	<form action="{{ route('reservations.store') }}" method="POST">
		@csrf
		<div class="section-card__body">
			<div class="row">
				<div class="col">
					<div class="row">
						<section class="container">
							<form class="row">
								<label for="date" class="col-1 col-form-label">Date de fin </label>
								<div class="col">
									<input type="date" name="date" id="date" class="form-control" style="width: 9.5%; display: inline;" >
									<span class="input-group-append">
										<span class="input-group-text bg-light d-block"><i class="fa fa-calendar"></i></span>
									</span>



                                    <div class="form-floating col">
                                         <input class="form-control @error('reservation_id') is-invalid @enderror" type="text" name="reservation_id" placeholder=" " value="{{ old('reservation_id') }}">
                                        <label>Id réservation</label>
                                    </div>
                             </div>
                            </form>
                        </section>
                    </div>
				</div>
				<div class="section-card__footer">
					<button type="submit" class="btn btn-success">Suppprimer</button>
				</div>
			</form>
		</div>
</div>

@endsection
