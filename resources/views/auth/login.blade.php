@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card white">
                <div class="card-content">
                    <span class="card-title red-text text-lighten-2"><strong>LOGIN</strong></span>
                    <form action="{{ route('login')  }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required minlength="3">
                                <label for="email">Email</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required minlength="3">
                                <label for="password">Password</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light green lighten-2">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
