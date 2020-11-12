@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<form class="form-horizontal form-label-left"  method="POST" action="#" enctype="multipart/form-data">
    @csrf
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nomDoc">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nomDoc"  required="required" class="form-control col-md-7 @error('nomDoc') is-invalid @enderror " name="nomDoc" placeholder="Veillez entrer le nom du document"  value="{{ old('nomDoc') }}" required autocomplete="nomDoc" autofocus>            
            @error('nomDoc')
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