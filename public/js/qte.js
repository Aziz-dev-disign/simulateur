/*
*
*Le JavaScript qui permet de caluler la quotitée.
*
*/

    (function (window, $) {
            
            $('.ButtonSimul--lauimul').click(function () {
                calculQte();
            });

            function calculQte() {
                var inputMensu = $('#inputMensu').val();
                var test = inputMensu / 2 ;
                    jQuery(".inputMensu-001 .result").text(format(test,2,' ',',') +' FCFA');
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