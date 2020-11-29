@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>
<!-- bouttons -->
<div class="col-md-6">
    <a href="{{route('admin.list-document.index')}}" class="btn btn-danger">Retour</a>
</div><br><br><br>
<div class="ln_solid"></div>

<!-- Formulaire -->
<form class="form-horizontal form-label-left"  method="POST" action="{{route('admin.categorie.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="required" for="nom">Nom <span class="required">*</span></label>
        <input type="text" id="nom" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
        @if($errors->has('nom'))
            <div class="invalid-feedback">
                {{ $errors->first('nom') }}
            </div>
        @endif
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</form>

<div class="ln_solid"></div>
<!-- Tables -->
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i=0?>
            @foreach ($categorieLists as $categorieList)
                <?php $i++; ?>
                <tr data-entry-id="{{$categorieList->id}}">
                    <td>{{$i}}</td>
                    <td>{{$categorieList->nom}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.categorie.edit', $categorieList->id)}}">Edit</a>
                            <div class="dropdown-divider"></div>
                                <div> 
                                    <form action="{{ route('admin.categorie.destroy', $categorieList->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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