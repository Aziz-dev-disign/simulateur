@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>



<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.simulateur.store')}}" enctype="multipart/form-data">
    @csrf

    <div class=" form-group row">
        <label  for="type_id">Type de simulateur <span >*</span></label>
        <select name="type_id" id="type_id" class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
            <option value="">Choisir...</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->nom}}</option>
            @endforeach
        </select>            
        @if($errors->has('type_id'))
            <div class="invalid-feedback">
                {{ $errors->first('type_id') }}
            </div>
        @endif
    </div><div class="form-group">
        <label  for="nom">Nom du simulateur <span >*</span></label>
        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom')}}" >
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div><div class="form-group">
        <label  for="slug">Sous titre <span >*</span></label>
        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug')}}" >
        @if($errors->has('slug'))
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
        @endif
    </div>
    <div class=" form-group row">
        <label  for="Statut">Statut <span >*</span></label>
        <select name="statut" id="statut" class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}">
            <option value="">choisir un statut</option>
            <option value="inactif">Inactif</option>
            <option value="actif">Actif</option>
        </select>
        @if($errors->has('slug'))
        <div class="invalid-feedback">
            {{ $errors->first('slug') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="montantMin">Monatant minimum <span >*</span></label>
        <input class="form-control {{ $errors->has('montantMin') ? 'is-invalid' : '' }}" type="text" name="montantMin" id="montantMin" value="{{ old('montantMin')}}" >
        @if($errors->has('montantMin'))
            <div class="invalid-feedback">
                {{ $errors->first('montantMin') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="montantMax">Monatant Max <span >*</span></label>
        <input class="form-control {{ $errors->has('montantMax') ? 'is-invalid' : '' }}" type="text" name="montantMax" id="montantMax" value="{{ old('montantMax')}}" >
        @if($errors->has('montantMax'))
            <div class="invalid-feedback">
                {{ $errors->first('montantMax') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="taux">Taux <span >*</span></label>
        <input class="form-control {{ $errors->has('taux') ? 'is-invalid' : '' }}" type="text" name="taux" id="taux" value="{{ old('taux')}}" >
        @if($errors->has('taux'))
            <div class="invalid-feedback">
                {{ $errors->first('taux') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="dureeMin">Durée minimum <span >*</span></label>
        <input class="form-control {{ $errors->has('dureeMin') ? 'is-invalid' : '' }}" type="text" name="dureeMin" id="dureeMin" value="{{ old('dureeMin')}}" >
        @if($errors->has('dureeMin'))
            <div class="invalid-feedback">
                {{ $errors->first('dureeMin') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="dureeMax">Durée maximum <span >*</span></label>
        <input class="form-control {{ $errors->has('dureeMax') ? 'is-invalid' : '' }}" type="text" name="dureeMax" id="dureeMax" value="{{ old('dureeMax')}}" >
        @if($errors->has('dureeMax'))
            <div class="invalid-feedback">
                {{ $errors->first('dureeMax') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label  for="image">Image <span >*</span></label>
        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image" value="{{ old('image')}}" >
        @if($errors->has('image'))
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
        @endif
    </div>
    <div class=" form-group">
        <label  for="decription">Description<span >*</span></label>
        <textarea name="description" id="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
        @if($errors->has('description'))
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        @endif
    </div>    
    <div class="form-group">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>
    </div>
</form>
@endsection