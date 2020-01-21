@extends('layouts.app')

@section('content')
    <p>{{ $user->name }}</p>
    @foreach($posts->chunk(3) as $items)
        <div class="row">
            @foreach($items as $item)
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('storage/' . $item->image) }}">
                            <form action="{{ route('post.like.store', $item->id) }}" method="post">
                                @csrf
                                @if(\App\Like::where('post_id', $item->id)->where('user_id', Auth::user()->id)->count() > 0)
                                    <button type="submit"
                                       class="btn-floating halfway-fab waves-effect waves-light red"><i
                                            class="material-icons">thumb_up</i></button>
                                @else
                                    <button type="submit"
                                            class="btn-floating halfway-fab waves-effect waves-light black"><i
                                            class="material-icons">thumb_up</i></button>
                                @endif
                            </form>
                        </div>
                        <div class="card-action">
                            <form action="{{ route('post.destroy',$item->id) }}" method="POST">
                                <a href="{{ route('post.comment.index', $item->id) }}" class="btn waves-effect waves-light green lighten-2">Komentar</a>
                                @if(Auth::user()->id == $item->user_id)
                                    <a href="{{ route('post.edit', $item->id) }}"
                                       class="btn waves-effect waves-light blue lighten-2">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn waves-effect waves-light red lighten-2">Hapus
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
