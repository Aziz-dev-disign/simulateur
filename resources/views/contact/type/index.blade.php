@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<div class="col-md-12">
    <a href="{{route('admin.simulateur.index')}}" class="btn btn-danger">Retour</a>
    <a href="{{route('admin.list-document.index')}}" class="btn btn-primary float-rigth">Ajouter un documents</a>
    <button type="submit" class="btn btn-success" id="ajouter">Ajouter une catéforie de simulateur</button>
</div><br><br><br>
<div class="ln_solid"></div>


<form class="form-horizontal form-label-left type"  method="POST" action="{{route('admin.type-simulateur.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nom">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nom"  required="required" class="form-control  @error('nom') is-invalid @enderror " name="nom" placeholder="Veillez entrer un nom"  value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button type="submit" class="btn btn-danger" id="fermer">Fermer</button>
        </div>
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
                                <a class="dropdown-item" id="edit" href="{{route('admin.type-simulateur.edit', $typeSimulation->id)}}">Edit</a>
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

@section('script')
    <script>
        $(document).ready(function () {
           // Afficher le formulaire d'ajout

            $('.type').hide();
            $('#ajouter').click(function () {
                $('.type').show();
            });
            $('#fermer').click(function () {
                $('.type').hide();
            });

            // Editer le document

            $('#edit').click(function () {
                alert([
                    'test'
                ]);
            });
        });
    </script>
@endsection