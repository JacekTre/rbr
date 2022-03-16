@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h1>Odpowiedź API</h1>
                </div>

                <pre id="json-response">
                </pre>
            </div>
        </div>
    </div>
    <script>
        let placeForJson = document.getElementById('json-response');

        document.addEventListener('DOMContentLoaded', function (){
            placeForJson.innerHTML = JSON.stringify(@json($response), undefined, 2);
        })
    </script>
@endsection
