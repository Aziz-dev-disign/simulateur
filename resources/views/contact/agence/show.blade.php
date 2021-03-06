@extends('contact.layouts.accueil')

@section('content')

<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{$agence->code}}</h3>

<div class="form-group">
    <div class="form-group">
        <a class="btn btn-primary" href="{{ route('admin.agence.edit',$agence->id) }}">
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
                    {{ $agence->id }}
                </td>
            </tr>
            <tr>
                <th>
                    Code de l'agence
                </th>
                <td>
                    {{ $agence->code }}
                </td>
            </tr>
            <tr>
                <th>
                    Nom
                </th>
                <td>
                    {{ $agence->nom }}
                </td>
            </tr>
            <tr>
                <th>
                    Email
                </th>
                <td>
                    {{ $agence->email }}
                </td>
            </tr>
            <tr>
                <th>
                    Téléphone
                </th>
                <td>
                    {{ $agence->telephone }}
                </td>
            </tr>
            <tr>
                <th>
                    Ville
                </th>
                <td>
                    {{ $agence->ville }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <a class="btn btn-danger" href="{{ route('admin.agence.index') }}">
            Retour
        </a>
    </div>
</div>

@endsection