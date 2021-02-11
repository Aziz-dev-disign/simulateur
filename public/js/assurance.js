/**
 * 
 * Le script qui permet de calculer l'assurance !
 * 
 */





(function (window, $) {
    $('.ButtonSimul-launchSimul').click(function () {
        calculAss();
    });

    

    function calculAss() {
    var differe = $('#diff').val();
    var dateNaiss = $('#dateNaiss').val();
    var dateSouscript = $('#dateSouscript').val();
    var tdpcu = $('#tdpcu').val();
    var dcepcu = $('#dcepcu').val();
    valTD = JSON.parse(tdpcu);
    valDCE = JSON.parse(dcepcu);


    //calcul de l'age
    var sousDate = new Date(dateSouscript);
    var naissDate = new Date(dateNaiss);
    age = sousDate.getFullYear() - naissDate.getFullYear();
    var valeurTD = valTD[age].taux;
    var valeurDCE = valDCE[age].taux;
    if (age - 17 >= 0 && age <= 65) {
        let reste = duree % 12 ;
        if (reste = 0) {
            console.log(valeurTD)
            pret_in_fine = valeurTD * montant ;
            console.log(pret_in_fine);
            jQuery("#Assur .result").text(format(pret_in_fine,2,' ',',') +' FCFA');
        }
        else {
            console.log(valeurTD)
            pret_in_fine = valeurDCE * montant ;
            console.log(pret_in_fine);
            jQuery("#Assur .result").text(format(pret_in_fine,2,' ',',') +' FCFA');
        }
    }
    console.log(age);

    //calcul de la durée d'ammortissement
    var dureeAmor = duree - differe;
    console.log(dureeAmor);
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
})(window, jQuery);
