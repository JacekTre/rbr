@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h1>Użytkownik</h1>
                </div>

                <div class="col-12 text-center">
                    <table class="table">
                        <tr>
                            <th style="width:10%">ID</th>
                            <th style="width:30%">Nazwa</th>
                            <th style="width:30%">Email</th>
                            <th style="width:15%">Utworzono</th>
                            <th style="width:15%">Zmodyfikowano</th>
                        </tr>
                        <tr>
                            <td>
                                {{ $user->getId() }}
                            </td>
                            <td>
                                {{ $user->getName() }}
                            </td>
                            <td>
                                {{ $user->getEmail() }}
                            </td>
                            <td>
                                {{ $user->getCreatedAt() }}
                            </td>
                            <td>
                                {{ $user->getUpdatedAt() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
