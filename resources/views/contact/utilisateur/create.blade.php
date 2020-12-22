@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<form method="POST" action="{{ route('admin.user.store') }}">
    @csrf

    <div class="form-group row">
        <label for="role_id" class="col-md-4 col-form-label">{{ __('Role') }} <span>*</span></label>
        <div class="col-md-6">
            <select name="role_id" id="role_id" class="form-control" >
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
        <label for="name" class="col-md-4 col-form-label">{{ __('Nom et Prénom(s)') }} <span>*</span></label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="nom et prénom"  autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail') }} <span>*</span></label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="exemple@exemple.com"  autocomplete="email">
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label">{{ __('statut') }} <span>*</span></label>
        <div class="col-md-6">
            <select id="status" type="text" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"  name="status">
                <option value="inactif">Inactif</option>
                <option value="actif">Actif</option>
            </select>
            @if($errors->has('status'))
                <div class="invalid-feedback">
                    {{ $errors->first('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label">{{ __('Mot de passe') }} <span>*</span></label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="mot de passe"  autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirmez le mot de passe') }} <span>*</span></label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmez mot de passe"  autocomplete="new-password">
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

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection