"use strict";
class Ejercicio7 {
    constructor() {}
    mostrar() {
        $("p").show();
        $("table").show();
    }
    ocultar() {
        $("p").hide();
        $("table").hide();
    }
    modificar() {
        $("h2").text("Reconocimientos");
        $("p").text("La trilogía tuvo un gran éxito de taquilla, alcanzando las tres películas los puestos 26.º, 19.º y 6.º de las más taquilleras de la historia. También fueron aclamadas por la crítica, obteniendo un total de diecisiete premios Óscar, diez premios BAFTA y cuatro premios Globo de Oro, así como amplias alabanzas hacia el reparto y las innovaciones en lo referente a efectos especiales digitales. Cada película de la trilogía tuvo una «edición especial extendida», lanzada un año después del lanzamiento en DVD de la versión proyectada en las salas de cine.");
    }
    add() {
        $("table").after("<footer><address>uo271288@uniovi.es</address></footer>");
        $("p").before("<p>La trilogía cinematográfica de El Señor de los Anillos, basada en la novela homónima del escritor británico J. R. R. Tolkien, comprende tres películas épicas de fantasía, acción y aventuras: El Señor de los Anillos: la Comunidad del Anillo (2001), El Señor de los Anillos: las dos torres (2002) y El Señor de los Anillos: el retorno del Rey (2003). Las tres películas fueron escritas, producidas y dirigidas por Peter Jackson, coescritas por Fran Walsh y Philippa Boyens y distribuidas por New Line Cinema. Considerado como uno de los mayores proyectos cinematográficos nunca acometidos, con una recaudación global de más de 2900 millones USD, el proyecto completo duró ocho años, con la filmación simultánea de las tres películas y rodadas enteramente en la tierra natal de Jackson, Nueva Zelanda.</p>");
    }
    eliminar() {
        $("h1").remove();
        $("footer").remove();
    }
    recorrer() {
        $("*", document.body).each(function() {
            var etiquetaPadre = $(this).parent().get(0).tagName;
            $(this).prepend(document.createTextNode("Etiqueta padre : <" + etiquetaPadre + "> elemento : <" + $(this).get(0).tagName + "> valor: "));
        });
    }

    suma() {
        $("body").append('<textarea id="total"></textarea>');
        $(document).ready(function() {
            var total = 0;
            $("table td").each(function() {
                if (!isNaN($(this).text()))
                    total += parseInt($(this).text());
            });
            $("#total").text("El total es: " + total);
        });
    }
}
var ejercicio7 = new Ejercicio7();