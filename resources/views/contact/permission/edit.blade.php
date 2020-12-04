@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}{{$permission->nom}}</h3>
<a href="{{route('admin.permissions.index')}}" class="btn btn-danger">Retour</a>

    <form method="POST" action="{{ route("admin.permissions.update",$permission->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="required" for="nom">Permission</label>
            <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $permission->nom) }}">
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