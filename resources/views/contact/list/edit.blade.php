@extends('contact.layouts.accueil')

@section('content')
    <h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>
    <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>

    <form method="POST" action="{{ route("admin.list-document.update",$listDocument->id) }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="type_id">Type de documents</label>
            <select class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}" name="type_id" id="type_id"  >
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{$listDocument->type_id == $type->id ? 'selected' : ' '}}>{{ $type->nom }}</option>
                @endforeach
            </select>
            @if($errors->has('type_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('type_id') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie de document</label>
            <select class="form-control {{ $errors->has('categorie_id') ? 'is-invalid' : '' }}" name="categorie_id" id="categorie_id"  >
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{$listDocument->categorie_id == $categorie->id ? 'selected' : ' '}}>{{ $categorie->nom }}</option>
                @endforeach
            </select>
            @if($errors->has('categorie_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('categorie_id') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="nomDoc">nomDoc</label>
            <input class="form-control {{ $errors->has('nomDoc') ? 'is-invalid' : '' }}" type="text" name="nomDoc" id="nomDoc" value="{{ old('nomDoc', $listDocument->nomDoc) }}" >
            @if($errors->has('nomDoc'))
                <div class="invalid-feedback">
                    {{ $errors->first('nomDoc') }}
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