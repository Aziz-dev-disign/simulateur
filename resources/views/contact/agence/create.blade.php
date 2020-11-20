@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<!-- Formulaire -->
<form class="form-horizontal form-label-left formulaire"  method="POST" action="{{route('admin.agence.store')}}" enctype="multipart/form-data">
    @csrf
    

    <div class="form-group">
        <label class="required" for="code">Code</label>
        <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code') }}" required>
        @if($errors->has('code'))
            <div class="invalid-feedback">
                {{ $errors->first('code') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label class="required" for="nom">Nom</label>
        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label class="required" for="email">Email</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
        @if($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label class="required" for="telephone">Téléphone</label>
        <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" required>
        @if($errors->has('telephone'))
            <div class="invalid-feedback">
                {{ $errors->first('telephone') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label class="required" for="ville">Ville</label>
        <input class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" type="text" name="ville" id="ville" value="{{ old('ville') }}" required>
        @if($errors->has('ville'))
            <div class="invalid-feedback">
                {{ $errors->first('ville') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{route('admin.agence.index')}}" class="btn btn-danger">Retour</a>
    </div>
</form>
<div class="ln_solid formulaire"></div>
@endsection