<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('success'))
            <div class="alert alert-success mb-0">
                {!! \Session::get('success') !!}
            </div>
            @endif

            @if(\Session::has('error'))
            <div class="alert alert-danger mb-0">
                {!! \Session::get('error') !!}
            </div>
            @endif
        </div>
    </div>
</div>
