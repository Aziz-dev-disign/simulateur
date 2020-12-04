@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>
<div class="col-md-6">
    <a href="{{route('admin.type-simulateur.index')}}" class="btn btn-danger">Retour</a>
    <a href="{{route('admin.categorie.index')}}" class="btn btn-primary">Ajouter une catégorie de documents</a>
</div><br><br><br>
<div class="ln_solid"></div>

<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.list-document.store')}}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <label for="type">Type de documents <span class="required">*</span></label>        
            <select name="type_id" id="type" class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
                <option value="">Choisir...</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->nom}}</option>
                @endforeach
            </select>
            @if($errors->has('type_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('type_id') }}
                </div>
            @endif
    </div>    
    <div class="form-group">
        <label for="categorie">Catégorie de documents <span class="required">*</span></label>        
            <select name="categorie_id" id="categorie" class="form-control {{ $errors->has('categorie_id') ? 'is-invalid' : '' }}">
                <option value="">Choisir...</option>
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                @endforeach
            </select>
            @if($errors->has('categorie_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('categorie_id') }}
                </div>
            @endif
    </div>
    <div class="form-group">
        <label for="nomDoc">Nom <span class="required">*</span></label>        
        <input type="text" id="nomDoc" class="form-control{{ $errors->has('nom') ? 'is-invalid' : '' }} " name="nomDoc" value="{{ old('nomDoc') }}" autocomplete="nomDoc" autofocus>            
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</form>
<div class="ln_solid"></div>


<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Type de simulateur</th>
            <th>Catégorie de document</th>
            <th>documents</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i=0 ?>
            @foreach($listDocuments as $listDocument)
                <?php $i++; ?>
            <tr datea-entry-id="{{$listDocument->id}}">
                <td>{{$i}}</td>
                <td>{{$listDocument->type->nom}}</td>
                <td>{{$listDocument->categorie->nom}}</td>
                <td>{{$listDocument->nomDoc}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">Action</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.list-document.edit', $listDocument->id)}}">Edit</a>
                        <div class="dropdown-divider"></div>
                        <div> 
                            <form action="{{ route('admin.list-document.destroy', $listDocument->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="dropdown-item" value="Supprimer">
                            </form>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection