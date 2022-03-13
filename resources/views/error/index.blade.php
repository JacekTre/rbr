@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Wykryto bład</h1>
            <p>{{ $errorMessage }}</p>
        </div>
    </div>
</div>
@endsection
