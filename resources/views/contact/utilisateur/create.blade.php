@extends('contact.layouts.accueil')

@section('content')


<form method="POST" action="{{ route('admin.user.store') }}">
    @csrf

    <div class="form-group row">
        <label for="role_id" class="col-md-4 col-form-label">{{ __('Role') }}</label>
        <div class="col-md-6">
            <select name="role_id" id="role_id" class="form-control">
                <option value="">choisir un role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->nom}}</option>
                @endforeach
            </select>
            @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">{{ __('Nom') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail') }}</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="statu" class="col-md-4 col-form-label">{{ __('Statut') }}</label>
        <div class="col-md-6">
            <input id="statu" type="text" class="form-control @error('statu') is-invalid @enderror" name="statu" value="{{ old('statu') }}" required autocomplete="statu">
            @error('statu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label">{{ __('Mot de passe') }}</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirmez le mot de passe') }}</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Enregistrer') }}
            </button>
            <a href="{{route('admin.user.index')}}" class="btn btn-danger">Retour</a>
        </div>
    </div>
</form>

@endsection