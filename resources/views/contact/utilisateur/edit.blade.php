@extends('contact.layouts.accueil')

@section('content')

<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{$user->name}}</h3>

<form method="POST" action="{{ route('admin.user.update', $user->id) }}">
    @csrf
     @method('patch')
    <div class="form-group row">
        <label for="role_id" class="col-md-4 col-form-label">{{ __('Role') }}</label>
        <div class="col-md-6">
            <select name="role_id" id="role_id" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{$user->role_id == $role->id ? "selected" : ''}}>{{$role->nom}}</option>
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
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}"  autocomplete="name" autofocus>
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
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email}}"  autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label">{{ __('statut') }}</label>
        <div class="col-md-6">
            <select name="status" class="form-control @error('status') is-invalid @enderror custom-select"  id="status">
                @foreach ($user->getstatuOptions() as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Modifier') }}
            </button>
            <a href="{{route('admin.user.index')}}" class="btn btn-danger">Retour</a>
        </div>
    </div>
</form>

@endsection