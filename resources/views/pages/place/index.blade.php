
@extends('layouts.app')




@section('content')


<div class="section-card">
    <div class="section-card__header">
        <div>
            <h1 class="h4 text-nowrap">Place</h1>
            <small class="text-muted">Place:{{ $places->count() }} </small>
        </div>
        <ul class="header-options">

     
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Numéro Place</th>
    
    </tr>
  </thead>
  <tbody>

  @foreach($places as $key => $data)
    <tr>    
      <th>{{$data->id}}</th>
      <th>{{$data->numero}}</th>
                  
    </tr>
@endforeach
    
  </tbody>
</table>
                        
            <li>
                <a class="btn btn-primary" href="{{ route('place.create') }}">
                    <i class="bi bi-plus"></i>
                </a>
            </li>

           

  

           
            
        </ul>
    </div>
    <div class="section-card__body">
   
    </div>

    
</div>



@endsection


