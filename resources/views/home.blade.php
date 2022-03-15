@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1>Dostępne opcje:</h1>
            <div class="m-3">
                <a href="{{ route('users.list') }}" class="btn btn-primary">Użytkownicy</a>
            </div>
            <div class="m-3">
                <a href="{{ route('posts.list') }}" class="btn btn-primary">Posty</a>
            </div>
            <div class="m-3">
                <a href="{{ route('client.list') }}" class="btn btn-primary">API</a>
            </div>
        </div>
    </div>
</div>
@endsection
