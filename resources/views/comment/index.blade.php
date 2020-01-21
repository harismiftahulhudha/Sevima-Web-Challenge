@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-content">
            <p>
                {{ $post->caption }}
                <br><br>
                <span style="color: gray;">{{ $post->created_at->diffForHumans() }}</span>
            </p>
            <br><br>
            <form action="{{ route('post.comment.store', $post->id) }}" method="POST">
                @csrf
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="comment" autofocus></textarea>
                    <label for="textarea1" class="active">Komentar</label>
                </div>
                <div class="col s12">
                    <button class="btn-small waves-effect waves-light" type="submit">KOMENTAR</button>
                </div>
            </form>
        </div>
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab"><a href="#like">LIKE</a></li>
                <li class="tab"><a class="active" href="#comment">KOMENTAR</a></li>
            </ul>
        </div>
        <div class="card-content grey lighten-4">
            <div id="like">
                <ul class="collection">
                    @foreach($likes as $like)
                        <li class="collection-item">
                            <span class="title">{{ $like->user->name }}</span> - <span style="color: gray;">{{ $like->created_at->diffForHumans() }}</span>
                            <a class="secondary-content"><i class="material-icons red-text">thumb_up</i></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="comment">
                <ul class="collection">
                    @foreach($comments as $comment)
                        <li class="collection-item">
                            <span class="title">{{ $comment->user->name }}</span> - <span style="color: gray;">{{ $comment->created_at->diffForHumans() }}</span>
                            <p>{{ $comment->comment }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
