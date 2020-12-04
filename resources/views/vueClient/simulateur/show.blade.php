@include('vueClient.partials.head')
@include('vueClient.partials.menu')

<div class="container">
        <div class="col-md-12 mainCol" role="main">
            <h1 class="mainTitle page-section-heading text-uppercase text-secondary mb-5">{{$simulateur->typeSimulation->nom}}</h1>                
            <div  class="ttcContent  default" >
                <div id="c3430" class="frame frame-default frame-type-list frame-layout-0">
                    <div class="tx_bisimulcredit" id="tx_bisimulcredit--3430">
                        <div id="simulateurGlob" class="simulateur row">
                            <div class="col-md-12">
                                <div id="simulateur" class="col-md-6 simulateur pt-10  mr-0 d-inline">      
                                    <div id="MontantDuCredit" class="MontantDuCredit pt-2">
                                        <label for="montant">Salaire mensuel</label><span class="inputCred"><input type="text" class="inputMensu" placeholder="50 000" /><span>FCFA</span></span>
                                        <p class="font-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam at odio quod, doloribus dolor veniam voluptate suscipit rerum sed cum sint nulla animi iusto accusantium alias corrupti repellat! Beatae, rerum.</p>
                                    </div>
                                    <div id="DureeRange" class="DureeRange">
                                        <label for="duree">Date de demande</label><span class="inputCred"><input type="text" class="inputMensu" placeholder="02/2020" /><span>Mois</span></span>
                                        <p class="font-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et saepe consectetur, dicta aliquam autem a eligendi non, quibusdam harum, accusantium debitis ipsum architecto. Molestias, repudiandae velit modi sint mollitia corrupti?</p>
                                    </div>
                                    <input type="button" class="btn ButtonSimul ButtonSimul--launchSimul mb-2" value="Lancer la simulation" />
                                </div>
                                <div id="simulateur" class="col-md-6 simulateurs pt-10  mr-0 ml-2 d-inline">      
                                    <div id="MontantDuCredit" class="MontantDuCredit pt-2">
                                        <label for="montant">Montant crédit</label><span class="inputCred"><input type="text" value="{{$simulateur->montantMin}}" id="montant" class="montant" name="montant" /><span>FCFA</span></span>
                                        <input type="text" id="range2" class="range2 pl-5" value="" name="range2" />
                                        <input type="hidden" id="range4" class="range4" max="{{$simulateur->montantMax}}" min="{{$simulateur->montantMin}}" value="{{$simulateur->montantMax}}" name="range4" />
                                    </div>
                                    <div id="DureeRange" class="DureeRange">
                                        <label for="duree">Durée</label><span class="inputCred"><input type="text" value="{{$simulateur->dureeMin}}" id="duree" class="duree" name="duree" /><span>Mois</span></span>
                                        <input type="text" id="range3" class="range3" min="{{$simulateur->dureeMin}}" max="{{$simulateur->dureeMax}}" value="" name="range3" />
                                        <input type="hidden" id="range5" class="range5" value="{{$simulateur->dureeMax}}" name="range5" />
                                    </div>
                                    <input type="hidden" id="taux" name="taux" value="{{$simulateur->taux}}">
                                </div>
                            </div>
                            <div id="resultat" class="resultat col-md-12 float-right" >   
                                <p id="Montant" class="Montant-3430">
                                    <span class="label">Montant crédit</span>
                                    <span class="result"></span>
                                </p>
                                <p id="Mensu" class="Mensu-3430">
                                    <span class="label">Mensualités</span>
                                    <span class="result"></span>
                                </p>
                                <p id="Taux" class="Taux-3430">
                                    <span class="label">Taux</span>
                                    <span class="result"></span>
                                </p>
                                <p id="DureeCred" class="DureeCred">
                                    <span class="label">Durée</span>
                                    <span class="result"></span>
                                </p>
                                <p id="CoutTotal" class="CoutTotal-3430">
                                    <span class="label">Coût total hors taxes</span>
                                    <span class="result"></span>
                                </p>
                                <input type="button" class="ButtonSimul ButtonSimul--getPdf" value="Enregistrer au format pdf"  />
                                <a class="ButtonSimul" href="http://societegenerale.bf/fr/votre-banque/nous-contacter/">Contacter</a>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
</div>
@include('vueClient.partials.footer')

<script>
    (function(window, $) {

        var $simul = $('#tx_bisimulcredit--3430');
        var $montant = $simul.find(".montant");
        var $duree = $simul.find(".duree");
        var $range2 = $simul.find(".range2");
        var $range3 = $simul.find(".range3"); 
        var $resultat = $simul.find(".resultat");
        var $DureeCred = $simul.find(".DureeCred");
        var isModeTranche = 0;
        var trancheDureeDatas = JSON.parse('[{"begin":"1","end":"24","taux":"7.5"},{"begin":"25","end":"84","taux":"7.5"}]');
        var contactLink = "fr/particuliers/credits/simulateurs/simulateur-pret-personnel-ordinaire/";

        function getTauxFromDuree(duree){
            var taux = false;
            trancheDureeDatas.forEach( function(tranche){
                if(duree >= tranche.begin && duree <= tranche.end){
                    if(isModeTranche){
                        var trancheId = $simul.find('#tranche').val();
                        taux = tranche['tauxTranche'+trancheId];
                    } else {
                        taux = tranche.taux;
                    }
                }
            });
            return taux;
        }

        $simul.find('.ButtonSimul--getPdf').on('click', function(){
            window.open(getAjaxLink(false));
            return false;
        });

        $simul.find('.ButtonSimul--sendPdf').on('click', function(){
            sendPdfLink();
        });

        function getAjaxLink(saveFile){
            return encodeURI(document.location.href + "?tx_bisimulcredit[tranche]=" + $simul.find('#tranche option:selected').text() + "&tx_bisimulcredit[MontantCredit]="+$(".Montant-3430 .result").html()+"&tx_bisimulcredit[Mensualite]="+$(".Mensu-3430 .result").html()+"&tx_bisimulcredit[Taux]="+$(".Taux-3430 .result").html()+"&tx_bisimulcredit[Duree]="+$DureeCred.find('.result').html()+"&tx_bisimulcredit[CoutTotal]="+$(".CoutTotal-3430 .result").html()+"&tx_bisimulcredit[savePdf]="+saveFile);
        }
        function sendPdfLink(){
            var link = getAjaxLink(true);
            $simul.find('.loader--sendPdf').addClass('loader--sendPdf--visible');
            $.post( link, function( data ) {
                document.location.href = contactLink;
            });
        }

        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };

        $resultat.hide();

        var minimum = $('#montant').val();
        var maximum= $('#range4').val();
        var dureemin = $('#duree').val();
        var dureeMax = $('#range5').val();
        var taux = $('#taux').val();
        dureemin = dureemin.replaceAll(' ','');
        dureeMax = dureeMax.replaceAll(' ','');
        minimum = minimum.replaceAll(' ','');
        maximum= maximum.replaceAll(' ',''); // @replaceAll() est une fonction Jquery qui remplace les éléments selectionner par de nouveaux html
        taux = taux.replaceAll(' ','');


        $range2.ionRangeSlider({
            grid: true,
            min: parseInt(minimum), //@parsenInt est une fonction js qui recupere une valeur et l'affiche
            max: parseInt(maximum),
            step: 1000
        });

        $range3.ionRangeSlider({
            grid: true,
            min: parseInt(dureemin),
            max: parseInt(dureeMax),
            step: 1
        });

        $montant.on("change", function() {
            var new_val = parseInt(String($(this).val()).replaceAll(' ',''));
            if(new_val < parseInt(minimum)){
                $(this).val(parseInt(minimum));
            } else if(new_val > parseInt(maximum)){
                $(this).val(parseInt(maximum));
            }

            $range2.data("ionRangeSlider").update({
                from: $montant.val(),
            });
            calculSimul();
        });

        $duree.on("change", function(){

            new_val = parseInt(String($(this).val()).replaceAll(' ',''));
            if(new_val < parseInt(dureemin)){
                $(this).val(dureemin);
            }

            $range3.data("ionRangeSlider").update({
                from: $duree.val(),
            });
            calculSimul();
        });

        $range2.on("change", function () {
            $montant.val($(this).prop("value")); // @val() renvoie ou définit l'attribut value des éléments sélectionnés
            calculSimul();
        });

        $range3.on("change", function () {
            $duree.val($(this).prop("value"));//jquery @prop() définie ou renvoie les propriétés et valeurs des léments sélectionnées
            calculSimul();
        });
 
        $simul.find('#trancheSalaire').on('change', function(){
            calculSimul();
        }); // renvoie les éléments descendants de l'élément sélectionné.
        $simul.find('.ButtonSimul--launchSimul').on('click', function(){
            calculSimul();
        });




        var valueMontantDuCredit = $simul.find('.MontantDuCredit').find('span.irs-single').html();
        $montant.attr('value',valueMontantDuCredit);

        var valueDureeRange = $simul.find('.DureeRange').find('span.irs-single').html();
        $duree.attr('value',valueDureeRange);

        function calculSimul(){

            console.log('calculSimul');

            $DureeCred.find('.result').html($duree.val()+' Mois');

            var duree = parseInt(String($duree.val()).replaceAll(' ',''));
            var montant = parseInt(String($montant.val()).replaceAll(' ',''));
            var tauxDiv = '';

            taux = getTauxFromDuree(duree);
            tauxDiv = taux * 0.01;


        

            var calculH = tauxDiv / 12;
            calculH = calculH * montant;

            var calculB = tauxDiv / 12;
            calculB = 1 + calculB;

            calculB = Math.pow(calculB, - duree);
            calculB = 1 - calculB;

            var mensu = calculH / calculB;
            mensu = mensu.toFixed(2);

            var tauxA = (tauxDiv *100).toFixed(2);

            
                    jQuery(".Taux-3430 .result").html(tauxA +'%');
                

                var CoutTotal = mensu * duree;
                CoutTotal = CoutTotal.toFixed(2);

            
                    jQuery(".Montant-3430 .result").html( format(parseInt($montant.val().replaceAll(' ','')),2,' ',',')+' FCFA');
                    jQuery(".Mensu-3430 .result").text(format(mensu,2,' ',',') +' FCFA');
                    jQuery(".CoutTotal-3430 .result").text( format(CoutTotal,2,' ',',') +' FCFA');
                

            if(isModeTranche) {
                $simul.find('#resultatTranche .result').html($simul.find('#tranche option:selected').text());
            }

            // sauvegardes des resutlats pour lévolution "demander un pret"
            var simulToSave = [];
            $simul.find('.resultat p').each(function(){
                simulToSave.push({
                    'label' : $(this).find('.label').html(),
                    'result' : $(this).find('.result').html(),
                });
            });
            localStorage.setItem('simulCredit', JSON.stringify(simulToSave));

            $resultat.show();
        }

        function format(valeur,decimal,separateur,dsep) {

            var deci=Math.round( Math.pow(10,decimal)*(Math.abs(valeur)-Math.floor(Math.abs(valeur)))) ;
            var val=Math.floor(Math.abs(valeur));
            if ((decimal==0)||(deci==Math.pow(10,decimal))) {val=Math.floor(Math.abs(valeur)); deci=0;}
            var val_format=val+"";
            var nb=val_format.length;
            for (var i=1;i<4;i++) {
                if (val>=Math.pow(10,(3*i))) {
                    val_format=val_format.substring(0,nb-(3*i))+separateur+val_format.substring(nb-(3*i));
                }
            }
            if (decimal>0) {
                var decim="";
                for (var j=0;j<(decimal-deci.toString().length);j++) {decim+="0";}
                deci=decim+deci.toString();
                val_format=val_format+dsep+deci;
            }
            if (parseFloat(valeur)<0) {val_format="-"+val_format;}
            return val_format;
        }


    })(window, jQuery)

</script>
