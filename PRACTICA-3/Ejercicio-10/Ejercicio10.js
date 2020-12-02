"use strict";
class Cambio {
    cambio(arg) {
        var currConvAPI = "https://free.currconv.com/api/v7/convert?q=" + arg + "&compact=ultra&apiKey=a0252d8be6d130f52dc9";
        $.getJSON(currConvAPI, {
                tagmode: "any",
                format: "json"
            })
            .done(function(data) {
                $.each(data, function(i, item) {
                    $("table").append("<tr><td>" + i + "</td><td>" + item + "</td></tr>");
                });
            });
        $("#" + arg).attr("disabled", "disabled");
    }
}

var cambio = new Cambio();