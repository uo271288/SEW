"use strict";
class MapaKML {
    initMap(files) {
        var archivo = files[0];
        var mapa = new google.maps.Map(document.querySelector("body > section > p"));
        mapa.setCenter({ lat: 43.2185, lng: -6.87628 });
        mapa.setZoom(4);
        mapa.setMapTypeId(google.maps.MapTypeId.HYBRID);
        var xml = new geoXML3.parser({ map: mapa });

        if (archivo.name.endsWith(".kml")) {
            var reader = new FileReader();
            reader.readAsText(archivo);
            reader.onload = function(evento) {
                xml.parseKmlString(reader.result);
            }
        }
    }
}

var kml = new MapaKML();