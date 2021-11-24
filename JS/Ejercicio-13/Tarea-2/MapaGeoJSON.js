"use strict";
class GeoJSON {

    load(files) {
        var archivo = files[0];
        var lector = new FileReader();
        lector.onload = function (event) {
            var text = lector.result;
            var geojson = JSON.parse(text);
            L.mapbox.accessToken = 'pk.eyJ1IjoidW8yNzEyODgiLCJhIjoiY2t3Ynk2YjhvM29xbzJvcm9lYnBidnFoZiJ9.hmiazSSrkMwSbBryHqHZcQ';
            L.mapbox.map('map')
                .setView([40.451389, -5.378333], 6)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'))
                .featureLayer.setGeoJSON(geojson);
        }

        lector.readAsText(archivo);
    }
}
var verJson = new GeoJSON();