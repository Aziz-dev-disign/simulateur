@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<div class="col-md-12">
    <a href="{{route('admin.simulateur.create')}}" class="btn btn-primary">Ajouter un simulateur</a>
    <a href="{{route('admin.type-simulateur.index')}}" class="btn btn-primary">Ajouter une catégorie de simulateur</a>
</div>
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Type de simulateur</th>
            <th>Statut</th>
            <th>Montant maximum</th>
            <th>Montant minimum</th>
            <th>Taux</th>
            <th>Durée maximum</th>
            <th>Durée minimum</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i = 0?>
            @foreach ($simulateurs as $simulateur)
            <?php $i++;?>
                <tr data-entry-id="{{$simulateur->id}}">
                    <td>{{$i}}</td>
                    <td>{{$simulateur->typeSimulation->nom}}</td>
                    <td>{{$simulateur->statut}}</td>
                    <td>{{$simulateur->montantMin}}</td>
                    <td>{{$simulateur->montantMax}}</td>
                    <td>{{$simulateur->taux}}</td>
                    <td>{{$simulateur->dureeMax}}</td>
                    <td>{{$simulateur->dureeMin}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.simulateur.edit', $simulateur->id)}}">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('admin.simulateur.show', $simulateur->id)}}">Détail</a>
                                <div class="dropdown-divider"></div>
                                <div> 
                                    <form action="{{ route('admin.simulateur.destroy', $simulateur->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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

