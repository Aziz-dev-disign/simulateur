@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('assets/images/societe-generale-ethereum2.jpg')}}');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{route('login')}}">
                @csrf
                <span class="login100-form-logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="image" style="width:100px;height:100px;" class="bf5 border rounded-circle">
                </span>
                <span class="login100-form-title p-b-34 p-t-27">
                    Se connecter
                </span>
                <div class="wrap-input100 validate-input" data-validate = "Entrez un nom">
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                    <span class="focus-input100" data-placeholder="&#xf106;"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="wrap-input100 validate-input" data-validate="Entrez un mot de passe">
                    <input type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="contact100-form-checkbox row">
                    <div class="col-md-6">
                        <input class="input-checkbox100" type="checkbox" name="remember" id="ckb1" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Se souvenir?
                        </label>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Connexion
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
