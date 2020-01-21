@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card white">
                <div class="card-content">
                    <span class="card-title red-text text-lighten-2"><strong>REGISTER</strong></span>
                    <form action="{{ route('register')  }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name" required minlength="3">
                                <label for="name">Name</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="email" type="text" class="validate" name="email" required minlength="3">
                                <label for="email">Email</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required minlength="8">
                                <label for="password">Password</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="password_confirmation" type="password" class="validate" name="password_confirmation" required minlength="8">
                                <label for="password_confirmation">Password Confirmation</label>
                                <span class="helper-text" data-error="Wajib diisi!" data-success=""></span>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light green lighten-2">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
