class GeoLocalizacion {
    initMap() {
        document.body.appendChild(document.createElement("section"))
        var centro = { lat: 43.3588903, lng: -5.8482582999999995 };
        var mapaGeoposicionado = new google.maps.Map(document.querySelector("body > section"), {
            zoom: 14,
            center: centro,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(mapaGeoposicionado);

    }
}
var miMapa = new GeoLocalizacion();