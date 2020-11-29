@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{ $simulateur->nom }}</h3>



<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.simulateur.update', $simulateur->id)}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class=" form-group ">
        <label class="required" for="type_id">Type de simulateur <span class="required">*</span></label>
        <select name="type_id" id="type_id" class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
            @foreach ($types as $type)
                <option value="{{$type->id}} "{{$simulateur->type_id == $type->id ? "selected" : ' '}}>{{$type->nom}}</option>
            @endforeach
        </select>          
        @if($errors->has('type_id'))
            <div class="invalid-feedback">
                {{ $errors->first('type_id') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="nom">Nom du simulateur <span class="required">*</span></label>
        <input type="text" id="nom"  required="required" class="form-control  {{ $errors->has('nom') ? 'is-invalid' : '' }} " name="nom" placeholder="Veillez entrez un nom"  value="{{ old('nom') ?? $simulateur->nom }}" required autocomplete="nom" autofocus>            
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="slug">Sous titre <span class="required">*</span></label>
        <input type="text" id="slug"  required="required" class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }} " name="slug" placeholder="Veillez entrez un slug"  value="{{ old('slug') ?? $simulateur->slug }}" required autocomplete="slug" autofocus>            
        @if($errors->has('slug'))
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="Statut">Statut <span class="required">*</span></label>
        <select name="statut" id="statut" class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}">
            @foreach ($simulateur->getStatusOptions() as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
        @if($errors->has('slug'))
        <div class="invalid-feedback">
            {{ $errors->first('slug') }}
        </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="montantMin">Montant minmum <span class="required">*</span></label>
        <input type="number" id="montantMin"  required="required" class="form-control  {{ $errors->has('montantMin') ? 'is-invalid' : '' }} " name="montantMin" placeholder="Veillez entrez un Montant minmum"  value="{{ old('montantMin') ?? $simulateur->montantMin }}" required autocomplete="montantMin" autofocus>            
        @if($errors->has('montantMin'))
            <div class="invalid-feedback">
                {{ $errors->first('montantMin') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="montantMax">Montant maximum <span class="required">*</span></label>
        <input type="number" id="montantMax"  required="required" class="form-control  {{ $errors->has('montantMax') ? 'is-invalid' : '' }} " name="montantMax" placeholder="Veillez entrez un montant maximum"  value="{{ old('montantMax') ?? $simulateur->montantMax }}" required autocomplete="montantMax" autofocus>            
        @if($errors->has('montantMax'))
            <div class="invalid-feedback">
                {{ $errors->first('montantMax') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="taux">Taux <span class="required">*</span></label>
        <input type="text" id="taux"  required="required" class="form-control  {{ $errors->has('taux') ? 'is-invalid' : '' }} " name="taux" placeholder="Veillez entrez le taux"  value="{{ old('taux') ?? $simulateur->taux }}" required autocomplete="taux" autofocus>            
        @if($errors->has('taux'))
            <div class="invalid-feedback">
                {{ $errors->first('taux') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="dureeMin">Durée minimum <span class="required">*</span></label>
        <input type="number" id="dureeMin"  required="required" class="form-control  {{ $errors->has('dureeMin') ? 'is-invalid' : '' }} " name="dureeMin" placeholder="Veillez entrez une durée minimum"  value="{{ old('dureeMin') ?? $simulateur->dureeMin}}" required autocomplete="dureeMin" autofocus>            
        @if($errors->has('dureeMin'))
            <div class="invalid-feedback">
                {{ $errors->first('dureeMin') }}
            </div>
        @endif
    </div>
    <div class=" form-group ">
        <label class="required" for="dureeMax">Durée maximum <span class="required">*</span></label>
        <input type="number" id="dureeMax"  required="required" class="form-control  {{ $errors->has('dureeMax') ? 'is-invalid' : '' }} " name="dureeMax" placeholder="Veillez entrez une durée maximum"  value="{{ old('dureeMax') ?? $simulateur->dureeMax}}" required autocomplete="dureeMax" autofocus>            
        @if($errors->has('dureeMax'))
            <div class="invalid-feedback">
                {{ $errors->first('dureeMax') }}
            </div>
        @endif
    </div>     
    <div class="form-group ">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>
    </div>
</form>
@endsection