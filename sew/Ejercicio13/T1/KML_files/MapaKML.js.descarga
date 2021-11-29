"use strict";
class MapaKML {
    initMap() {
        L.mapbox.accessToken = 'pk.eyJ1IjoidW8yNzEyODgiLCJhIjoiY2t3Ynk2YjhvM29xbzJvcm9lYnBidnFoZiJ9.hmiazSSrkMwSbBryHqHZcQ';
        var map = L.mapbox.map('map')
            .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

        var runLayer = omnivore.kml('arbol_genealogico.kml')
            .on('ready', function () {
                map.fitBounds(runLayer.getBounds());
            })
            .addTo(map);
    }
}

var kml = new MapaKML();