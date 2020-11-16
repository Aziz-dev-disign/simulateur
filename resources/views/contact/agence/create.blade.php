@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.agence.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nom">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nom"  required="required" class="form-control  @error('nom') is-invalid @enderror " name="nom" placeholder="Veillez entrer un nom"  value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="email">Email<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="email" id="email"  required="required" class="form-control  @error('email') is-invalid @enderror " name="email" placeholder="veillez entrer un email"  value="{{ old('email') }}" required autocomplete="email" autofocus>            
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="telephone">Téléphone<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="telephone"  required="required" class="form-control  @error('telephone') is-invalid @enderror" name="telephone"  value="{{ old('telephone') }}" placeholder="Entrez un téléphone" required autofocus>            
            @error('telephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="ville">Ville<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="ville" name="ville"  required="required" class="form-control  @error('ville') is-invalid @enderror" placeholder="Entrez la ville" required autofocus>            
            @error('ville')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button class="btn btn-primary" type="reset">Réinitialiser</button>
            <a href="{{route('admin.agence.index')}}" class="btn btn-danger">Retour</a>
        </div>
    </div>
</form>
@endsection