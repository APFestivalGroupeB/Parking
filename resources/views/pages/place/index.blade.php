
@extends('layouts.app')




@section('content')


<div class="section-card">
    <div class="section-card__header">
        <div>
            <h1 class="h4 text-nowrap">Place</h1>
            <small class="text-muted">Dates: </small>
        </div>
        <ul class="header-options">
           
            <li>
                <a class="btn btn-primary" href="{{ route('place.create') }}">
                    <i class="bi bi-plus-square-fill"></i>
                </a>
            </li>
       
        </ul>
    </div>

    
</div>



@endsection


