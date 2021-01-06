/**
 * Le javaScript qui permet de calculer le tableau d'amortissement.
 * 
 * @function
 */

(function (window, $) {

    var montant = $('.Montant-3430 .result').val();
    var mensualite = $('#mensu').val();
    var taux = $('.Taux-3430 .result').val();
    var duree = $('.DureeCred .result').val();
    var coutTotal = $('.CoutTotal-3430 .result').val();
    var date = $('#inputDate').val();
    
    
    //Variable globale 
    
    $('.ButtonSimul--launchSimuoo').click(function () {
        calculTA();
    });
    function calculTA() {
        //Date de dernier payement et interet payé
            var datepay = date + duree;
            var interetPay = montant * (taux / 12);
        //capital payé
            var capitalPAy = mensualite - interetPay;
        //Solde restant
            var soldeRestant = montant - capitalPAy;
        //Afficher le resultat
            jQuery(".interetPayTA .result").text(format(interetPay,2,' ',',') +' FCFA');
            jQuery(".soldeRestantTA .result").text(format(soldeRestant,2,' ',',') +' FCFA');

        while (soldeRestant >= 0) {
             datepay = date + duree;
             interetPay = montant * (taux / 12);
             capitalPAy = mensualite - interetPay;
             soldeRestant = montant - capitalPAy;

            jQuery(".interetPayTA .result").text(format(interetPay,2,' ',',') +' FCFA');
            jQuery(".soldeRestantTA .result").text(format(soldeRestant,2,' ',',') +' FCFA');
 
        }
    };        
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
