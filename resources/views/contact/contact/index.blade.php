@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>

<!-- Tables -->
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-hover" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nom et Prénom</th>
            <th>Motif</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $i = 0?>
            @foreach ($rdvs as $rdv)
            <?php $i++; ?>
                <tr data-entry-id="{{$rdv->id}}">
                    <td>{{$i}}</td>
                    <td>{{$rdv->nom}} {{$rdv->prenom}}</td>
                    <td><a href="{{route('admin.contact.show', $rdv->id)}}" class="rdvActive">{{$rdv->motif}}</a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.contact.show', $rdv->id)}}">Détail</a>
                                <div class="dropdown-divider"></div>
                                <div> 
                                    <form action="{{ route('admin.contact.destroy', $rdv->id) }}" method="POST" onsubmit="return confirm('Etes vous sur'" style="display: inline-block;">
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