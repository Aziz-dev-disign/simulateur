@include('vueClient.partials.head')
@include('vueClient.partials.menu')

<div class="container">
    <div class="col-md-12 mainCol" role="main">
        <h1 class="mainTitle page-section-heading text-uppercase text-secondary mb-5">{{$simulateur->typeSimulation->nom}}</h1>                
        <div  class="ttcContent  default" >
            <div id="c3430" class="frame frame-default frame-type-list frame-layout-0">
                <div class="tx_bisimulcredit" id="tx_bisimulcredit--3430">
                    <div id="simulateurGlob" class="simulateur container">
                        <div class="row justify-content-between">
                            <div id="simulateur" class="col-md-5 pt-10  mr-0 ml-2">   
                                <div class="row smolMenu">
                                    <div class="col-md-6 mt-1 btnMenu"><a href="{{route('index')}}" class="btnMenu">Retour</a></div>    
                                </div><br>

                                <h5>Simulation rapide</h5>
                                <div class="borderCaption">
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
                                </div><br>

                                <div class="row smolMenu hideDiv">
                                </div><br> 

                                <div class="hideDiv">                                    
                                    <h5 >Simulation Avancée</h5>
                                    <div class="borderCaption">                                    
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
                                                <label for="engagementPPO">Engagement PPO</label>
                                                <input type="number" class="form-control" id="engagementPPO" name="" classe="engagementPPO" placeholder="prêt personnel ordinaire">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="engagementPs">engagement PS</label>
                                                <input type="number" class="form-control" id="engagementPs" name="" classe="engagementPs" placeholder="prêt scolaire">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="autrEngagement">Autres engagement</label>
                                                <input type="number" class="form-control" id="autrEngagement" name="" classe="autrEngagement" placeholder="Ex: loyer">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                
                                <div class="row smolMenu hideDiv">
                                </div>  
                                
                                <div class="hideDiv">
                                    <h5 >Assurance</h5>
                                    <div class="borderCaption">   
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="montantAss">Montant</label>
                                                <input type="number" class="form-control" id="montantAss" name="" classe="montantAss" placeholder="montant">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dureeAss">Durée</label>
                                                <input type="number" class="form-control" id="dureeAss" name="" classe="dureeAss" placeholder="Durée">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="dateAss">Age (s)</label>
                                                <input type="number" class="form-control" id="dateAss" name="" classe="dateAss" placeholder="Ex: 38">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row smolMenu">
                                    <div class="col-md-6 mt-1 btnMenu"><a href="#" class="btnMenu" id="btnMenuHide">Fermer&nbsp;la&nbsp;simulation&nbsp;avancée</a></div>    
                                    <div class="col-md-6 mt-1 btnMenu"><a href="#" class="btnMenu" id="btnMenu">Simulation avancée</a></div>    
                                </div><br>
                                <input type="button" class="btn ButtonSimul ButtonSimul--launchSimul" value="Lancer la simulation" id="btnSimulHide2"/>
                            </div>
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
                                        <span class="label">Total Engagements :</span>
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
</div>
@include('vueClient.partials.footer')

<script src="{{asset('js/simulateurJS.js')}}"></script>
<script src="{{asset('js/qte.js')}}"></script>
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
