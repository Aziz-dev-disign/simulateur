    
/*
*
*Ce JavaScript permet de calculer la simulation.
*
*/
    (function(window, $) {
        
        // Déclaration des variables 

        var $simul = $('#tx_bisimulcredit--3430');
        var $montant = $simul.find(".montant");
        var $duree = $simul.find(".duree");
        var $range2 = $simul.find(".range2");
        var $range3 = $simul.find(".range3"); 
        var $resultat = $simul.find(".resultat");
        var $DureeCred = $simul.find(".DureeCred");
        var isModeTranche = 0;
        var trancheDureeDatas = JSON.parse('[{"begin":"1","end":"24","taux":"7.5"},{"begin":"25","end":"600","taux":"7.5"}]');
        var contactLink = "fr/particuliers/credits/simulateurs/simulateur-pret-personnel-ordinaire/";

        // @function qui permet de récuperé le taux. 

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
        // Convertir en PDF
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

        $resultat.show();

//===========================================================================================================================//
        // Récuperé les données du simulateur rapide dans des variable.
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

//===========================================================================================================================//        

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


        //Récupere et affiche le montant lorsqu'on change les valeurs
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

        //Récupere et affiche la durée lorsqu'on change les valeurs
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

        // @Function CalculSimul permet d'effectuer le calcul lors de la simulation.

//===========================================================================================================================//        

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

            mensu = calculH / calculB;
            mensu = mensu.toFixed(2);

            var tauxA = (tauxDiv *100).toFixed(2);

            jQuery(".Taux-3430 .result").html(tauxA +'%');
                
            var CoutTotal = mensu * duree;
            CoutTotal = CoutTotal.toFixed(2);

            // frais des dossiers
            var fraisDoc = CoutTotal *(1.3/100);


            //Echéances
            
            // Affiche les resultats obtenus.
            jQuery(".Montant-3430 .result").html( format(parseInt($montant.val().replaceAll(' ','')),2,' ',',')+' FCFA');
            jQuery(".Mensu-3430 .result").text(format(mensu,2,' ',',') +' FCFA');
            jQuery(".CoutTotal-3430 .result").text( format(CoutTotal,2,' ',',') +' FCFA');
            jQuery("#Fdocs .result").text( format(fraisDoc,2,' ',',') +' FCFA');
               
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

//===========================================================================================================================//        
        // Le formatage.
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
