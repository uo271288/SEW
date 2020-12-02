"use strict"
class Mapa {

    procesar(files) {
        var archivo = files[0];
        var mapa = new google.maps.Map(document.getElementById("map"));
        mapa.setCenter({ lat: 43.2185, lng: -6.87628 });
        mapa.setZoom(4);
        mapa.setMapTypeId(google.maps.MapTypeId.HYBRID);

        if (archivo.name.endsWith(".kml")) {
            var src = archivo;

            var kmlLayer = new google.maps.KmlLayer(src, {
                suppressInfoWindows: true,
                preserveViewport: false,
                map: mapa
            });
        }
    }

    initMap() {

    }
}
var mapa = new Mapa();