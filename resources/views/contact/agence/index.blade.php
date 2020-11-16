@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<div class="col-md-6">
    <a href="{{route('admin.agence.create')}}" class="btn btn-primary">Ajouter une catégorie</a>
</div><br><br><br>
<div class="ln_solid"></div>
<!-- Formulaire -->
<form class="form-horizontal form-label-left"  method="POST" action="#" enctype="multipart/form-data">
    @csrf
    <div class="item form-group row">
        <label class="control-label col-md-3" for="nom">Nom <span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="nom"  required="required" class="form-control  @error('nom') is-invalid @enderror " name="nom" placeholder="Veillez entrez un nom"  value="{{ old('nom') }}" required autocomplete="nom" autofocus>            
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="email">Email<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="email" id="email"  required="required" class="form-control @error('email') is-invalid @enderror " name="email" placeholder="veillez entrez un email"  value="{{ old('email') }}" required autocomplete="email" autofocus>            
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="telephone">Téléphone<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="telephone"  required="required" class="form-control @error('telephone') is-invalid @enderror" name="telephone"  value="{{ old('telephone') }}" placeholder="Entrez un téléphone" required autofocus>            
            @error('telephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="item form-group row">
        <label class="control-label col-md-3" for="ville">Ville<span class="required">*</span></label>
        <div class="col-md-7">
            <input type="text" id="ville" name="ville"  required="required" class="form-control @error('ville') is-invalid @enderror" placeholder="Entrez la ville" required autofocus>            
            @error('ville')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-9 col-sm-9  offset-md-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button class="btn btn-primary" type="reset">Réinitialiser</button>
        </div>
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
            <th>Email</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i = 0?>
            @foreach ($agences as $agence)
            <?php $i++; ?>
                <tr data-entry-id="{{$agence->id}}">
                    <td>{{$i}}</td>
                    <td>{{$agence->nom}}</td>
                    <td>{{$agence->email}}</td>
                    <td>{{$agence->telephone}}</td>
                    <td>{{$agence->ville}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.agence.edit', $agence->id)}}">Edit</a>
                            <div class="dropdown-divider"></div>
                                <div> 
                                    <form action="{{ route('admin.agence.destroy', $agence->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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