@extends('contact.layouts.accueil')

@section('content')
<h3 style="margin-bottom: 10px;">{{$titre ?? ''}}</h3>
<div class="card-box table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Type de simulateur</th>
            <th>Montant maximum</th>
            <th>Montant minimum</th>
            <th>Taux</th>
            <th>Durée maximum</th>
            <th>Durée minimum</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
                <td>test 1</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection