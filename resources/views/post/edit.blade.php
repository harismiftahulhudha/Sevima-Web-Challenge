@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card white">
                <div class="card-content">
                    <span class="card-title red-text text-lighten-2"><strong>EDIT POSTING</strong></span>
                    <form action="{{ route('post.update', $post->id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>GAMBAR</span>
                                    <input type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="caption" class="materialize-textarea" cols="30" maxlength="5000" minlength="3" name="caption" required rows="10">{{ $post->caption }}</textarea>
                                <label for="caption">Caption</label>
                                <span class="helper-text" data-error="Wajib diisi !" data-success=""></span>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light green lighten-2">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
