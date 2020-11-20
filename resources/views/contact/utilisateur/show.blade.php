@extends('contact.layouts.accueil')

@section('content')

<h3 style="margin-bottom: 10px;">{{$titre ?? ''}} {{$user->name}}</h3>

<div class="form-group">
    <div class="form-group">
        <a class="btn btn-primary" href="{{ route('admin.user.edit',$user->id) }}">
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
                    {{ $user->id }}
                </td>
            </tr>
            <tr>
                <th>
                    Nom
                </th>
                <td>
                    {{ $user->name }}
                </td>
            </tr>
            <tr>
                <th>
                    Email
                </th>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            <tr>
                <th>
                    Statut
                </th>
                <td>
                    {{ $user->status }}
                </td>
            </tr>
            <tr>
                <th>
                    Role
                </th>
                <td>
                    {{ $user->roles->nom }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <a class="btn btn-danger" href="{{ route('admin.user.index') }}">
            Retour
        </a>
    </div>
</div>

@endsection