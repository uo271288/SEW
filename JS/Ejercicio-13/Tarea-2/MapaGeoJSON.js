"use strict";
class GeoJSON {

    initMap() {
        document.body.querySelector("article").appendChild(document.createElement("section"))
        var centro = { lat: 43.3672702, lng: -5.8502461 };
        this.map = new google.maps.Map(document.querySelector("body > article > section"), {
            zoom: 8,
            center: centro,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        });

    }

    load(files) {
        var archivo = files[0];
        var lector = new FileReader();
        var oThis = this;
        lector.onload = function (event) {
            var text = lector.result;
            var obj = JSON.parse(text);
            oThis.map.data.addGeoJson(obj);
        }

        lector.readAsText(archivo);

    }
}
var verJson = new GeoJSON();