@extends('contact.layouts.accueil')

@section('content')
<div class="preview">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand"><img src="{{asset('assets/images/imagelogo2.png')}}" width="160px" alt=""></a>
        </div>
    </nav><br><br><hr>
    
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
    <br><br>
</div>

    <div class="row">
        <a href="{{route('admin.contact.index')}}" class="btn btn-danger">Retour</a>
        <a href="{{route('admin.print_page', $rdv->id)}}" class="btn btn-info printPage">Imprimer le rendez-vous</a>
    </div>
@endsection

@section('script')
<script type="text/javascript">

    // When the document is ready, initialize the link so
    // that when it is clicked, the printable area of the
    // page will print.
    $(document).ready(function () {
        $('.printPage').click(function () {
            $('.preview').print();            
        });
    });

</script>
@endsection