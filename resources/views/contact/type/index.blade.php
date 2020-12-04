@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<div class="col-md-12">
    <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>
    <a href="{{route('admin.list-document.index')}}" class="btn btn-primary float-rigth">Ajouter un documents</a>
</div><br><br><br>
<div class="ln_solid"></div>

<form class="form-horizontal form-label-left type"  method="POST" action="{{route('admin.type-simulateur.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label class="required" for="nom">Type de simulateur</label>
        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom')}}">
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
<div class="ln_solid type"></div>


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
            <?php $i=0 ?>
            @foreach($typeSimulations as $typeSimulation)
                <?php $i++; ?>
                <tr data-entry-id="{{$typeSimulation->id}}">
                    <td>{{$i}}</td>
                    <td>{{$typeSimulation->nom}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item editer" id="edit" href="{{route('admin.type-simulateur.edit', $typeSimulation->id)}}">Edit</a>
                            <div class="dropdown-divider"></div>
                            <div> 
                                <form action="{{ route('admin.type-simulateur.destroy', $typeSimulation->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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
