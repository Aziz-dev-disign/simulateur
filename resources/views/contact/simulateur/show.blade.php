@extends('contact.layouts.accueil')

@section('content')

<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{$simulateur->name}}</h3>

<div class="form-group">
    <div class="form-group">
        <a class="btn btn-primary" href="{{ route('admin.simulateur.edit',$simulateur->id) }}">
            Editer
        </a>
    </div>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>
                    Id
                </th>
                <td>
                    {{ $simulateur->id }}
                </td>
            </tr>
            <tr>
                <th>
                    Nom
                </th>
                <td>
                    {{ $simulateur->nom }}
                </td>
            </tr>
            <tr>
                <th>
                    Sous titre
                </th>
                <td>
                    {{ $simulateur->slug }}
                </td>
            </tr>
            <tr>
                <th>
                    Statut
                </th>
                <td>
                    {{ $simulateur->statut }}
                </td>
            </tr>
            <tr>
                <th>
                    Type de simulation
                </th>
                <td>
                    {{ $simulateur->typeSimulation->nom }}
                </td>
            </tr>
            <tr>
                <th>
                    Montant minimum
                </th>
                <td>
                    {{ $simulateur->montantMin }}
                </td>
            </tr>
            <tr>
                <th>
                    Montant maximum
                </th>
                <td>
                    {{ $simulateur->montantMax }}
                </td>
            </tr>
            <tr>
                <th>
                    Taux
                </th>
                <td>
                    {{ $simulateur->taux }}
                </td>
            </tr>
            <tr>
                <th>
                    Durée minimum
                </th>
                <td>
                    {{ $simulateur->dureeMin }}
                </td>
            </tr>
            <tr>
                <th>
                    Durée Maximum
                </th>
                <td>
                    {{ $simulateur->dureeMax }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <a class="btn btn-danger" href="{{ route('admin.simulateur.index') }}">
            Retour
        </a>
    </div>
</div>

@endsection