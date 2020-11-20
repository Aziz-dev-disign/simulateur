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
    
    <div class="item form-group row">
        <label class="control-label col-md-3" for="type">Type de documents <span class="required">*</span></label>
        <div class="col-md-7">
            <select name="type_id" id="type" class="form-control">
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
    <div class="item form-group row">
        <label class="control-label col-md-3" for="categorie">Catégorie de documents <span class="required">*</span></label>
        <div class="col-md-7">
            <select name="categorie_id" id="categorie" class="form-control">
                <option value="">Choisir...</option>
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                @endforeach
            </select>
            @error('categorie_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nomDoc">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nomDoc"  required="required" class="form-control @error('nomDoc') is-invalid @enderror " name="nomDoc" placeholder="Veillez entrer le nom du document"  value="{{ old('nomDoc') }}" required autocomplete="nomDoc" autofocus>            
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
        </div>
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