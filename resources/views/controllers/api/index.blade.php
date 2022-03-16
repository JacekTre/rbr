@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h1>Użytkownicy</h1>
                </div>

                <div class="col-12 text-center">
                    <form action="{{ route('client.result') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="basePath">Podstawowa ścieżka API:</label>
                            <input type="text" class="form-control"  name="basePath" value="{{ $apiPath }}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="endpoint">Podstawowa ścieżka API:</label>
                            <select name="endpoint" id="" class="form-select">
                                @foreach($endpoints as $endpoint)
                                    <option value="{{ $endpoint }}" class="form-control" >{{ $endpoint }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="method">Metoda:</label>
                            <select name="method" id="" class="form-select">
                                @foreach($methods as $method)
                                    <option value="{{ $method }}" class="form-control" >{{ $method }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="objectId">ID:</label>
                            <input type="text" name="objectId" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" class="form-control" style="height: 150px"></textarea>
                        </div>
                        <div class="form-group m-3">
                            <button type="submit" class="btn btn-primary">Wyślij</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
