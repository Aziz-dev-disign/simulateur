/*
*
*Le JavaScript qui permet de caluler la quotitée.
*
*/

    (function (window, $) {
            
            $('.ButtonSimul--launchSimul').click(function () {
                calculQte();
            });

//===========================================================================================================================//
        // Récuperé les données du simulateur avancé dans des variable.

//===========================================================================================================================//        
            // Calcul de la quotitée mensuelle.

            export function calculQte() 
            {
                var salaire = $('#salaire').val();
                var autreRevenu = $('#autreRevenu').val();
                var engagementPPO = $('#engagementPPO').val();
                var engagementPs = $('#engagementPs').val();
                var autrEngagement = $('#autrEngagement').val();
                var qte;
                var marge;
                var TotalRevenu = (parseInt(salaire) + parseInt(autreRevenu));
                var TotEngagement = parseInt(engagementPs) + parseInt(engagementPPO) + parseInt(autrEngagement);
//===========================================================================================================================//        
// Calcul de la Quotitée cessible en fonction du salaire.

                var montantRestant = TotalRevenu - TotEngagement;
                console.log(montantRestant);

                if (montantRestant>=1 && montantRestant<=75000) {
                    qte = montantRestant* (33/100);
                    marge = -(mensu - qte);
                    jQuery("#QteCessible .result").text(format(qte,2,' ',',') +' FCFA');
                    jQuery("#MargeQte .result").text(format(marge,2,' ',',') +' FCFA');
                    if (marge >0 && mensu<qte) {
                        jQuery("#DesLog .result").text('Prêt accordé');
                    }
                    else{
                        jQuery("#DesLog .result").text('Prêt refusé');
                    }
                }
                else if(montantRestant>=75001 && montantRestant<=100000){
                    qte = montantRestant* (40/100);
                    marge = -(mensu - qte);
                    jQuery("#QteCessible .result").text(format(qte,2,' ',',') +' FCFA');
                    jQuery("#MargeQte .result").text(format(marge,2,' ',',') +' FCFA');
                    if (marge >0 && mensu<qte) {
                        jQuery("#DesLog .result").text('Prêt accordé');
                    }
                    else{
                        jQuery("#DesLog .result").text('Prêt refusé');
                    }
                }
                else if(montantRestant>=100001 && montantRestant<=200000){
                    qte = montantRestant* (45/100);
                    marge = -(mensu - qte);
                    jQuery("#QteCessible .result").text(format(qte,2,' ',',') +' FCFA');
                    jQuery("#MargeQte .result").text(format(marge,2,' ',',') +' FCFA');
                    if (marge >0 || mensu<qte) {
                        jQuery("#DesLog .result").text('Prêt accordé');
                    }
                    else{
                        jQuery("#DesLog .result").text('Prêt refusé');
                    }
                }
                else if(montantRestant>=200001 && montantRestant<=300000){
                    qte = montantRestant* (50/100);
                    marge = -(mensu - qte);
                    jQuery("#QteCessible .result").text(format(qte,2,' ',',') +' FCFA');
                    jQuery("#MargeQte .result").text(format(marge,2,' ',',') +' FCFA');
                    if (marge >0 && mensu<qte) {
                        jQuery("#DesLog .result").text('Prêt accordé');
                    }
                    else{
                        jQuery("#DesLog .result").text('Prêt refusé');
                    }
                }
                else if(montantRestant>=300000){
                    qte = montantRestant* (55/100);
                    marge = -(mensu - qte);
                    jQuery("#QteCessible .result").text(format(qte,2,' ',',') +' FCFA');
                    jQuery("#MargeQte .result").text(format(marge,2,' ',',') +' FCFA');
                    if (marge >0 && mensu<qte) {
                        jQuery("#DesLog .result").text('Prêt accordé');
                    }
                    else{
                        jQuery("#DesLog .result").text('Prêt refusé');
                    }
                }
                else{
                    return null;
                }
//===========================================================================================================================//        



                console.log(TotalRevenu);
                jQuery("#TotalRevenu .result").text(format(TotalRevenu,2,' ',',') +' FCFA');
                jQuery("#TotEngagement .result").text(format(TotEngagement,2,' ',',') +' FCFA');
            }
//===========================================================================================================================//        

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