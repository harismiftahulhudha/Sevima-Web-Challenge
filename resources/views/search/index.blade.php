@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-content">
            <ul class="collection">
                @foreach($users as $user)
                    <li class="collection-item">
                        <a href="{{ route('post.index') }}?id={{ $user->id }}"><span class="title">{{ $user->name }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
