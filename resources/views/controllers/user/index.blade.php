@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h1>Użytkownicy</h1>
                </div>

                <div class="col-12 text-center">
                    <table class="table">
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:25%">Nazwa</th>
                            <th style="width:25%">Email</th>
                            <th style="width:15%">Utworzono</th>
                            <th style="width:15%">Zmodyfikowano</th>
                            <th style="width:15%">Akcje</th>
                        </tr>
                        @if(!is_null($users))
                            @foreach($users as $user)
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
                                    <td>
                                        <a href="{{ route('users.getUser', ['id' => $user->getId()]) }}" class="btn btn-primary m-1">Wyswietl</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <p>Nie ma żadnych użytkowników.</p>
                                </td>
                            </tr>
                        @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
