@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>



<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.simulateur.store')}}" enctype="multipart/form-data">
    @csrf

    <div class=" form-group row">
        <label class="control-label col-md-3" for="type_id">Type de simulateur <span class="required">*</span></label>
        <div class="col-md-7">
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Choisir...</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->nom}}</option>
                @endforeach
            </select>
            @error('type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="nom">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nom"  required="required" class="form-control  @error('nom') is-invalid @enderror " name="nom" placeholder="Veillez entrez un nom"  value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="slug">slug <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="slug"  required="required" class="form-control  @error('slug') is-invalid @enderror " name="slug" placeholder="Veillez entrez un slug"  value="{{ old('slug') }}" required autocomplete="slug" autofocus>            
            @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="montantMin">Montant minmum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="number" id="montantMin"  required="required" class="form-control  @error('montantMin') is-invalid @enderror " name="montantMin" placeholder="Veillez entrez un Montant minmum"  value="{{ old('montantMin') }}" required autocomplete="montantMin" autofocus>            
            @error('montantMin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="montantMax">Montant maximum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="number" id="montantMax"  required="required" class="form-control  @error('montantMax') is-invalid @enderror " name="montantMax" placeholder="Veillez entrez un montant maximum"  value="{{ old('montantMax') }}" required autocomplete="montantMax" autofocus>            
            @error('montantMax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="ùtaux">Taux <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="taux"  required="required" class="form-control  @error('taux') is-invalid @enderror " name="taux" placeholder="Veillez entrez le taux"  value="{{ old('taux') }}" required autocomplete="taux" autofocus>            
            @error('taux')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="dureeMin">Durée minimum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="number" id="dureeMin"  required="required" class="form-control  @error('dureeMin') is-invalid @enderror " name="dureeMin" placeholder="Veillez entrez une durée minimum"  value="{{ old('dureeMin') }}" required autocomplete="dureeMin" autofocus>            
            @error('dureeMin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="dureeMax">Durée maximum <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="number" id="dureeMax"  required="required" class="form-control  @error('dureeMax') is-invalid @enderror " name="dureeMax" placeholder="Veillez entrez une durée maximum"  value="{{ old('dureeMax') }}" required autocomplete="dureeMax" autofocus>            
            @error('dureeMax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>    
    <div class=" form-group row">
        <label class="control-label col-md-3" for="image">image <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="file" id="image"  required="required" class="form-control  @error('image') is-invalid @enderror " name="image"  value="{{ old('image') }}" required autocomplete="image" autofocus>            
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class=" form-group row">
        <label class="control-label col-md-3" for="decription">Decription<span class="required">*</span></label>
        <div class="col-md-7">
            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
            @error('decription')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>    
    <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>
        </div>
    </div>
</form>
@endsection