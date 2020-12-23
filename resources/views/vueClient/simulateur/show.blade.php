@include('vueClient.partials.head')
@include('vueClient.partials.menu')

<div class="container">
    <div class="col-md-12 mainCol" role="main">
        <h1 class="mainTitle page-section-heading text-uppercase text-secondary mb-5">{{$simulateur->typeSimulation->nom}}</h1>                
        <div  class="ttcContent  default" >
            <div id="c3430" class="frame frame-default frame-type-list frame-layout-0">
                <div class="tx_bisimulcredit" id="tx_bisimulcredit--3430">
                    <div id="simulateurGlob" class="simulateur container">
                        <div class="row">
                            <div id="simulateur" class="col-md-5 pt-10">      
                                <div id="MontantDuCredit" class="MontantDuCredit pt-2">
                                    <label for="montant">Salaire mensuel</label><span class="inputCred"><input type="text" id="inputMensu" class="inputMensu" placeholder="50 000" /><span>FCFA</span></span>
                                    <p class="font-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam at odio quod, doloribus dolor veniam voluptate suscipit rerum sed cum sint nulla animi iusto accusantium alias corrupti repellat! Beatae, rerum.</p>
                                </div>
                                <div id="DureeRange" class="DureeRange">
                                    <label for="duree">Date de demande</label><span class="inputCred"><input type="text" class="inputMensu" placeholder="02/2020" /><span>Mois</span></span>
                                    <p class="font-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et saepe consectetur, dicta aliquam autem a eligendi non, quibusdam harum, accusantium debitis ipsum architecto. Molestias, repudiandae velit modi sint mollitia corrupti?</p>
                                </div>
                                <input type="button" class="btn ButtonSimul ButtonSimul--launchSimu mb-2" value="Calculer la quotitée mensuelle" />
                            </div>
                            <div id="simulateur" class="col-md-6 pt-10  mr-0 ml-2">      
                                <div id="MontantDuCredit" class="col-md-12 MontantDuCredit pt-2">
                                    <p class="inputMensu-001">
                                        <span id="qte"><b>NB:</b><em>la Mensualitée ne doit pas être supperieur cette somme = </em></span><span class="result" style="color: red"></span>
                                    </p>
                                    <label for="montant">Montant crédit</label><span class="inputCred"><input type="text" value="{{$simulateur->montantMin}}" id="montant" class="montant" name="montant" /><span>FCFA</span></span>
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
                                <input type="button" class="btn ButtonSimul ButtonSimul--launchSimul mb-2" value="Lancer la simulation" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">                                
                                <div id="resultat" class="resultat w-100 mt-3" >   
                                    <p id="Montant" class="col-md-12 Montant-3430">
                                        <span class="label">Montant crédit</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Mensu" class="col-md-12 Mensu-3430">
                                        <span class="label">Mensualités</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="Taux" class="col-md-12 Taux-3430">
                                        <span class="label">Taux</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="DureeCred" class="col-md-12 DureeCred">
                                        <span class="label">Durée</span>
                                        <span class="result"></span>
                                    </p>
                                    <p id="CoutTotal" class="col-md-12 CoutTotal-3430">
                                        <span class="label">Coût total hors taxes</span>
                                        <span class="result"></span>
                                    </p>
                                    <input type="button" class="col-md-6 ButtonSimul ButtonSimul--getPdf" value="Enregistrer au format pdf"  />
                                    <a class="col-md-3 ml-4 btn ButtonSimul" href="{{route('simulateur.credits.index')}}">Contacter</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</div>
@include('vueClient.partials.footer')

<script src="{{asset('js/qte.js')}}"></script>
<script src="{{asset('js/simulateurJS.js')}}"></script>
<script src="{{asset('js/TableauDarmortissement.js')}}"></script>
