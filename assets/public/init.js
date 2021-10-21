jQuery(function($){
    var price = {
        "secilla": {
            "24h": 60,
            "2-4d": 40,
            "5-8": 35,
            "15d":25
        },
        "media":{
            "24h": 75,
            "2-4d": 50,
            "5-8": 45,
            "15d":35
        },
        "profunda":{
            "24h": 85,
            "2-4d": 60,
            "5-8": 55,
            "15d":45
        }
    }
    var select1 = $('#select1');
    var select2 = $('#select2');
    var showPrice = $('.afp_price-label');
    var inpPrice = $('#afp_price');
    $(select1).change(function(){
        selection_price();
    })
    $(select2).change(function(){
        selection_price();
    })
    function selection_price(){
        switch ($(select2).val()) {
            case "Una Explicación breve":
                switch ($(select1).val()) {
                    case "24 Horas":
                        $(showPrice).html('€ '+price.secilla["24h"]+',00');
                        $(inpPrice).val(price.secilla["24h"]+'.00');
                        break;
                    case "2 días":
                        $(showPrice).html('€ '+price.secilla["2-4d"]+',00')
                        $(inpPrice).val(price.secilla["2-4d"]+'.00')
                        break;
                    case "3 días":
                        $(showPrice).html('€ '+price.secilla["5-8"]+',00')
                        $(inpPrice).val(price.secilla["5-8"]+'.00')
                        break;
                    case "5 días":
                        $(showPrice).html('€ '+price.secilla["15d"]+',00')
                        $(inpPrice).val(price.secilla["15d"]+'.00')
                        break;
                }
                break;
            case "Una Consulta detallada":
                switch ($(select1).val()) {
                    case "24 Horas":
                        $(showPrice).html('€ '+price.media["24h"]+',00')
                        $(inpPrice).val(price.media["24h"]+'.00')
                        break;
                    case "2 días":
                        $(showPrice).html('€ '+price.media["2-4d"]+',00')
                        $(inpPrice).val(price.media["2-4d"]+'.00')
                        break;
                    case "3 días":
                        $(showPrice).html('€ '+price.media["5-8"]+',00')
                        $(inpPrice).val(price.media["5-8"]+'.00')
                        break;
                    case "5 días":
                        $(showPrice).html('€ '+price.media["15d"]+',00')
                        $(inpPrice).val(price.media["15d"]+'.00')
                        break;
                }
                break;
            case "Mucho profundidad y detalle":
                switch ($(select1).val()) {
                    case "24 Horas":
                        $(showPrice).html('€ '+price.profunda["24h"]+',00')
                        $(inpPrice).val(price.profunda["24h"]+'.00')
                        break;
                    case "2 días":
                        $(showPrice).html('€ '+price.profunda["2-4d"]+',00')
                        $(inpPrice).val(price.profunda["2-4d"]+'.00')
                        break;
                    case "3 días":
                        $(showPrice).html('€ '+price.profunda["5-8"]+',00')
                        $(inpPrice).val(price.profunda["5-8"]+'.00')
                        break;
                    case "5 días":
                        $(showPrice).html('€ '+price.profunda["15d"]+',00')
                        $(inpPrice).val(price.profunda["15d"]+'.00')
                        break;
                }
                break;
        }
    }
})
