@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}{{$categorieList->nom}}</h3>
<a href="{{route('admin.categorie.index')}}" class="btn btn-danger">Retour</a>
    <form method="POST" action="{{ route('admin.categorie.update', $categorieList->id) }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
            <label class="required" for="nom">Categorie</label>
            <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom') ?? $categorieList->nom }}" required>
            @if($errors->has('nom'))
                <div class="invalid-feedback">
                    {{ $errors->first('nom') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                Modifier
            </button>
        </div>
    </form>
@endsection