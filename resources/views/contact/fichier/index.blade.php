@extends('contact.layouts.accueil')

@section('content')

<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.fichier.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="required" for="fichierTD">GRILLE DE TARIF DE LA TEMPORAIRE DECES - PRIME COMMERCIALE UNIQUE<span>*</span></label>
        <input class="form-control {{ $errors->has('fichierTD') ? 'is-invalid' : '' }}" type="file" name="fichierTD" id="fichierTD">
        @if($errors->has('fichierTD'))
            <div class="invalid-feedback">
                {{ $errors->first('fichierTD') }}
            </div>
        @endif
    </div>
    @can('permission_create')        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Importer TD PCU</button>
        </div>
    @endcan
</form>

<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.store_dce')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="required" for="fichierDCE">GRILLE DE TARIF PUR DE LA COLLECTIVE DECES EMPRUNTEURS - PRIME UNIQUE COMMERCIALE<span>*</span></label>
        <input class="form-control {{ $errors->has('fichierDCE') ? 'is-invalid' : '' }}" type="file" name="fichierDCE" id="fichierDCE">
        @if($errors->has('fichierDCE'))
            <div class="invalid-feedback">
                {{ $errors->first('fichierDCE') }}
            </div>
        @endif
    </div>
    @can('permission_create')        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Importer DCE PCU</button>
        </div>
    @endcan
</form>
@endsection