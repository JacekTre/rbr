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
                            <th style="width:25%">Tytuł</th>
                            <th style="width:25%">Treść</th>
                            <th style="width:15%">Autor</th>
                            <th style="width:15%">Liczba komentarzy</th>
                            <th style="width:15%">Akcje</th>
                        </tr>
                        @if(!is_null($posts))
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->getId() }}
                                    </td>
                                    <td>
                                        {{ $post->getTitle() }}
                                    </td>
                                    <td>
                                        {{ $post->getAbbreviatedContent() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('users.getUser', ['id' => $post->getAuthor()->getId()]) }}">{{ $post->getAuthor()->getName() }}</a>
                                    </td>
                                    <td>
                                        {{ $post->getCommentsCount() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.getPost', ['id' => $post->getId()]) }}" class="btn btn-primary m-1">Wyswietl</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <p>Nie ma żadnych postów.</p>
                                </td>
                            </tr>
                        @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
