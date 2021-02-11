@include('vueClient.partials.head')
@include('vueClient.partials.menu')
<div class="container">
    <div class="col-md-12 mainCol" role="main">
        <h1 class="mainTitle psouscript-section-heading text-uppercase text-secondary mb-5">{{$simulateur->typeSimulation->nom}}</h1>                
        <div  class="ttcContent  default" >
            <div id="c3430" class="frame frame-default frame-type-list frame-layout-0">
                <div class="tx_bisimulcredit" id="tx_bisimulcredit--3430">
                    <div id="simulateurGlob" class="simulateur container">
                        <div class="row justify-content-between">
                            <div id="simulateur" class="col-md-5 pt-10  mr-0 ml-2">   
                                <div class="row smolMenu">
                                    <div class="col-md-6 mt-1 btnMenu"><a href="{{route('index')}}" class="btnMenu">Retour</a></div>    
                                </div><br>
<!-- ==================================== Le simulateur rapide =============================================================================-->
                                <h5>Simulation rapide</h5>
                                <div id="MontantDuCredit" class="col-md-12 MontantDuCredit pt-3">                                    
                                    <label for="montant">Montant capital</label><span class="inputCred"><input type="text" value="{{$simulateur->montantMin}}" id="montant" class="montant" name="montant" /><span>FCFA</span></span>
                                    <div class="pl-4">
                                        <input type="text" id="range2" class="range2" value="" name="range2" />
                                    </div>
                                    <input type="hidden" id="range4" class="range4" max="{{$simulateur->montantMax}}" min="{{$simulateur->montantMin}}" value="{{$simulateur->montantMax}}" name="range4" />
                                </div>
                                <div id="DureeRange" class="col-md-12 DureeRange">
                                    <label for="duree">Durée</label><span class="inputCred"><input type="text" value="{{$simulateur->dureeMin}}" id="duree" class="duree" name="duree" /><span>Mois</span></span>
                                    <input type="text" id="range3" class="range3" min="{{$simulateur->dureeMin}}" max="{{$simulateur->dureeMax}}" value="" name="range3" />
                                    <input type="hidden" id="range5" class="range5" value="{{$simulateur->dureeMax}}" name="range5" />
                                </div>
                                    <input type="hidden" id="taux" name="taux" value="{{$simulateur->taux}}">
                                    <input type="button" class="btn ButtonSimul ButtonSimul--launchSimul" value="Lancer la simulation" id="btnSimulHide1"/>
                                <div class="row smolMenu hideDiv">
                                </div><br> 
<!-- ==================================== Le simulateur rapide =============================================================================-->
                                <div class="hideDiv">                                    
                                    <h5 >Simulation Avancée</h5>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="nom">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="" classe="nom" placeholder="nom">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="prenom">Prénom (s)</label>
                                                <input type="text" class="form-control" id="prenom" name="" classe="prenom" placeholder="prénom">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="numero">Numéro cmpt</label>
                                                <input type="text" class="form-control" id="numero" name="" classe="numero" placeholder="Numéro compte">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="salaire">Salaire</label>
                                                <input type="number" class="form-control" id="salaire" name="" classe="salaire" placeholder="salaire">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="autreRevenu">Autres revenus</label>
                                                <input type="number" class="form-control" id="autreRevenu" name="" classe="autreRevenu" placeholder="Ex: un autre travail">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="engPP0">Engagement prêt&nbsp;ordinaire</label>
                                                <input type="number" class="form-control" id="engPP0" name="" classe="engPP0" placeholder="prêt personnel ordinaire">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="engPs">Engagement prêt scolaire</label>
                                                <input type="number" class="form-control" id="engPs" name="" classe="engPs" placeholder="prêt scolaire">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="autreEng">Autres Engagement</label>
                                                <input type="number" class="form-control" id="autreEng" name="" classe="autreEng" placeholder="Ex: loyer">
                                            </div>
                                        </div>
                                </div><br>                                
                                <div class="row smolMenu hideDiv">
                                </div><br> 
<!-- ==================================== L'assurance =============================================================================-->                              
                                <div class="hideDiv">
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="diff">Différé</label>
                                            <input type="text" class="form-control" id="diff" name="" classe="diff">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="dateNaiss">Date de naissance</label>
                                            <input type="date" class="form-control" id="dateNaiss" name="" classe="dateNaiss">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dateSouscript">Date de souscription</label>
                                            <input type="date" class="form-control" id="dateSouscript" name="" classe="dateSouscript">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row smolMenu">
                                    <div class="col-md-6 mt-1 btnMenu"><a href="#" class="btnMenu" id="btnMenuHide">Fermer&nbsp;la&nbsp;simulation&nbsp;avancée</a></div>    
                                    <div class="col-md-6 mt-1 btnMenu"><a href="#" class="btnMenu" id="btnMenu">Simulation avancée</a></div>    
                                </div><br>
                                <input type="button" class="btn ButtonSimul ButtonSimul--launchSimul" value="Lancer la simulation" id="btnSimulHide2"/>
                            </div>
<!-- ==================================== Les resultats =============================================================================-->
                            <div class="col-md-6" id="contenu">                                
                                <div id="resultat" class="resultat w-100" >   
                                    <p id="Montant" class="col-md-12 Montant-3430">
                                        <span class="label">Montant crédit :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Mensu" class="col-md-12 Mensu-3430">
                                        <span class="label">Mensualités :</span>
                                        <span class="result" id="mensu"></span>
                                    </p>
                                    <p id="Taux" class="col-md-12 Taux-3430">
                                        <span class="label">Taux :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="DureeCred" class="col-md-12 DureeCred">
                                        <span class="label">Durée :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="TotalRevenu" class="col-md-12 TotalRevenu hideDiv">
                                        <span class="label">Total revenus :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="QteCessible" class="col-md-12 QteCessible hideDiv">
                                        <span class="label">Quotité cessible :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="TotEngagement" class="col-md-12 TotEngagement hideDiv">
                                        <span class="label">Total Engagement :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="MargeQte" class="col-md-12 MargeQte hideDiv">
                                        <span class="label">Marge sur Quotité :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Echeance" class="col-md-12 Echeance hideDiv">
                                        <span class="label">Echéance :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Fdocs" class="col-md-12 Fdocs hideDiv">
                                        <span class="label">Frais de dossiers :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Assur" class="col-md-12 Assur hideDiv">
                                        <span class="label">Assurance :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="CoutTotal" class="col-md-12 CoutTotal-3430">
                                        <span class="label">Coût total hors taxes :</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="DesLog" class="col-md-12 DesLog hideDiv">
                                        <span class="label">Descision logique :</span>
                                        <span class="result"></span>
                                    </p>
                                    <input type="button" class="col-md-6 ButtonSimul ButtonSimul--getPdf" value="Enregistrer au format pdf"  id="ButtonSimul--getPdf"/>
                                    <a class="col-md-3 ml-4 btn ButtonSimul" href="{{route('simulateur.credits.index')}}">Contacter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 docs">
           <img src="{{asset('assets/images/attention.png')}}" alt="attention"> Frais de dossier :  1,30% avec un minimum de 35 000 FCFA <br><br>
            Le prêt est accordé sous réserve d’acceptation de Société Générale Burkina Faso. Le résultat de cette simulation est non contractuel et revêt un caractère informatif. Elle ne prend pas en compte le coût des assurances nécessaires au crédit ni la taxe des Opérations bancaires. Il ne s’agit en aucun cas d’un engagement de la part de Société Générale Burkina Faso qui se réserve le droit de modifier à tout moment l’une ou l’autre des données et des conditions de financement de ses offres de crédits.
        </div>
        <div class="col-md-6 docs">
            <h5 class="text-uppercase">Liste des documents à fournir</h5>
            <ul class="list-group">
                @foreach ($docs as $doc)
                    <h6>{{$doc->type->nom}}</h6> 
                    <li class="list-group-item">
                        {{$doc->nomDoc}}
                    </li>                     
                @endforeach
            </ul>
            {{$docs->links()}}
        </div>
    </div>
    <div class="row hide">
        <div class="col-md-6">
            <input type="text" name="" id="tdpcu" value="{{$tdpcus}}">
        </div>
        <div class="col-md-6">
            <input type="text" name="" id="dcepcu" value="{{$dcepcus}}">
        </div>
    </div>
</div>

@include('vueClient.partials.footer')
<!-- xlsx JS-->
<script src="{{asset('js/assurance.js')}}"></script>

<!-- ==================================== Script bouttons =============================================================================-->

<script>
    $(document).ready(function() {
        $('.hideDiv').hide();
        $('#btnSimulHide2').hide();
        $('#btnMenuHide').hide();
        $('#btnMenu').click(function () {
            $('.hideDiv').show();
            $('#btnMenuHide').show();
            $('#btnMenu').hide();
            $('#btnSimulHide2').show();
            $('#btnSimulHide1').hide();
        });
        $('#btnMenuHide').click(function () {
            $('.hideDiv').hide();
            $('#btnMenu').show();
            $('#btnMenuHide').hide();
            $('#btnSimulHide1').show();
            $('#btnSimulHide2').hide();
        });
    });
</script>

<!-- ==================================== script pdf=============================================================================-->

<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
    '#contenu': function (element, renderer) {
        return true;
    }
    };
 
    $('#ButtonSimul--getPdf').click(function () {  
        doc.fromHTML($('#contenu').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('simulation.pdf');
    });
</script>



