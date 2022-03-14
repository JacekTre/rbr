@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h1>{{ $post->getTitle() }}</h1>
                </div>

                <div class="col-12 text-center">
                    <p>{{ $post->getContent() }}</p>
                </div>

                <div class="col-12 text-center">
                    <table class="table">
                        <tr>
                            <td>Utworzono</td>
                            <td>{{ $post->getCreatedAt() }}</td>
                        </tr>
                        <tr>
                            <td>Zmodyfikowano</td>
                            <td>{{ $post->getUpdatedAt() }}</td>
                        </tr>
                        <tr>
                            <td>Autor</td>
                            <td>{{ $post->getAuthor()->getName() }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 text-center">
                    <h2>Komentarze</h2>
                    @if($post->getCommentsCount() === 0)
                        <p>Brak komentarzy</p>
                    @else
                        <table class="table">
                            <tr>
                                <th>Data</th>
                                <th>Autor</th>
                                <th>Komentarz</th>
                            </tr>
                            @foreach($post->getComments() as $comment)
                                <tr>
                                    <td>{{ $comment->getCreatedAt() }}</td>
                                    <td>{{ $comment->getAuthor()->getName() }}</td>
                                    <td>{{ $comment->getContent() }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
