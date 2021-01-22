@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{$role->nom}}</h3>
<a href="{{route('admin.roles.index')}}" class="btn btn-danger">Retour</a>

    <form method="POST" action="{{ route("admin.roles.update",$role->id) }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
            <label  for="permissions">Permissions</label>
            <div style="padding-bottom: 4px">
                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Tout selectionner</span>
                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">Tout déselectionner</span>
            </div>
            <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple >
                @foreach($permissions as $id => $permissions)
                    <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                @endforeach
            </select>
            @if($errors->has('permissions'))
                <div class="invalid-feedback">
                    {{ $errors->first('permissions') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label  for="nom">Nom</label>
            <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $role->nom) }}" >
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