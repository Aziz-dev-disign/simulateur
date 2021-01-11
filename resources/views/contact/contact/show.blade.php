@extends('contact.layouts.accueil')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand"><img src="{{asset('assets/images/imagelogo2.png')}}" width="160px" alt=""></a>
        </div>
    </nav>
    
    <div class="container mt-10">
        <div class="row">
            <div class="col-md-8">
                Salut ! <br><br><br>
                Moi c'est <b>{{$rdv->nom}} {{$rdv->prenom}}</b>, je souhaiterai prendre un rendez-vous dans votre agence <a href="mailto:{{$rdv->agence->email}}"><b>{{$rdv->agence->nom}}</b></a>.
                La date que je souhaiterai pour le rendez-vous est le <em>{{$rdv->dateRdv}}</em>. <br>
                Le motif du rendez-vous est : {{$rdv->motif}}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <h5><b>Informations supplémentaire :</b></h5><br>                
                <span><strong>Identifiant Client: </strong>{{$rdv->identifiantClient ?? 'n\'a pas un identifiant client de la banque'}}</span><br>
                <span><strong>E-mail: </strong>{{$rdv->email}}</span><br>
                <span><strong>Etat civil: </strong>{{$rdv->etatCivil}}</span><br>
                <span><strong>Montant du crédit: </strong>{{$rdv->montant ?? '0'}} FCFA</span><br>
                <span><strong>La mensualitée: </strong>{{$rdv->mensualite ?? '0'}} FCFA</span><br>
                <span><strong>Taux: </strong>{{$rdv->taux ?? '0'}}%</span><br>
                <span><strong>La date de naissance: </strong>{{$rdv->dateNaissance}}</span><br>
                <span><strong>Numéro de téléphone: </strong>{{$rdv->telephone}}</span><br>
                <span><strong>Pays/Ville: </strong>{{$rdv->pays}}, {{$rdv->ville}}</span><br>
            </div>
        </div>
    </div>
@endsection