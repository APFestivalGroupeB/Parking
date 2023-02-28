reservation.edit


<div class="section-card">
    <div class="section-card__header">
        <h1 class="h4 text-nowrap">Supprimer une reservation</h1>
    </div>

    <form action="{{ route('place.store') }}" method="POST">
        @csrf
        <div class="section-card__body">
            <div class="row">
               
                       


                                                <section class="container">
                            <h2 class="py-2">Datepicker in Bootstrap 5</h2>
                            <form class="row">
                                <label for="date" class="col-1 col-form-label">Date de fin </label>
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
                   
             

                     
            </div>
                       


                            <div class="section-card__footer">
            <button type="submit" class="btn btn-success">Suppprimer</button>
        </div>
    </form>
</div>