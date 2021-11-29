"use strict";
class Ejercicio7 {
    constructor() { }
    mostrar() {
        $("p").show();
        $("table").show();
    }
    ocultar() {
        $("p").hide();
        $("table").hide();
    }
    modificar() {
        $("h2").text("Premios");
    }
    add() {
        $("table").after("<footer><address>uo271288@uniovi.es</address></footer>");
    }
    eliminar() {
        $("h1").remove();
        $("footer").remove();
    }
    recorrer() {
        $("*", document.body).each(function () {
            var etiquetaPadre = $(this).parent().get(0).tagName;
            $(this).prepend(document.createTextNode("Etiqueta padre : <" + etiquetaPadre + "> elemento : <" + $(this).get(0).tagName + "> valor: "));
        });
    }

    suma() {
        $("body").append('<textarea></textarea>');
        $(document).ready(function () {
            var total = 0;
            $("table td").each(function () {
                if (!isNaN($(this).text()))
                    total += parseInt($(this).text());
            });
            $("textarea").text("El total es: " + total);
        });
    }
}
var ejercicio7 = new Ejercicio7();