@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<form class="form-horizontal form-label-left"  method="POST" action="#" enctype="multipart/form-data">
    @csrf
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nom">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nom"  required="required" class="form-control col-md-7 @error('nom') is-invalid @enderror " name="nom" placeholder="Veillez entrer un nom"  value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="slug">slug <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="slug"  required="required" class="form-control col-md-7 @error('slug') is-invalid @enderror " name="slug" placeholder="Veillez entrer un slug"  value="{{ old('slug') }}" required autocomplete="slug" autofocus>            
            @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="montantMin">Montant minmum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="montantMin"  required="required" class="form-control col-md-7 @error('montantMin') is-invalid @enderror " name="montantMin" placeholder="Veillez entrer un Montant minmum<"  value="{{ old('montantMin') }}" required autocomplete="montantMin" autofocus>            
            @error('montantMin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="montantMax">Montant maximum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="montantMax"  required="required" class="form-control col-md-7 @error('montantMax') is-invalid @enderror " name="montantMax" placeholder="Veillez entrer un montant maximum"  value="{{ old('montantMax') }}" required autocomplete="montantMax" autofocus>            
            @error('montantMax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="dureeMin">Durée minimum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="dureeMin"  required="required" class="form-control col-md-7 @error('dureeMin') is-invalid @enderror " name="dureeMin" placeholder="Veillez entrer une durée minimum"  value="{{ old('dureeMin') }}" required autocomplete="dureeMin" autofocus>            
            @error('dureeMin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="dureeMax">Durée maximum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="dureeMax"  required="required" class="form-control col-md-7 @error('dureeMax') is-invalid @enderror " name="dureeMax" placeholder="Veillez entrer une durée maximum"  value="{{ old('dureeMax') }}" required autocomplete="dureeMax" autofocus>            
            @error('dureeMax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>    
    <div class="item form-group row">
        <label class="control-label col-md-3" for="decription">Decription<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="decription"  required="required" class="form-control col-md-7 @error('decription') is-invalid @enderror " name="decription" placeholder="Veillez entrer un decription"  value="{{ old('decription') }}" required autocomplete="decription" autofocus>            
            @error('decription')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>    
    <div class="item form-group row">
        <label class="control-label col-md-3" for="image">image <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="image"  required="required" class="form-control col-md-7 @error('image') is-invalid @enderror " name="image" placeholder="Veillez entrer un image"  value="{{ old('image') }}" required autocomplete="image" autofocus>            
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{route('admin.agence.index')}}" class="btn btn-danger">Retour</a>
        </div>
    </div>
</form>
@endsection