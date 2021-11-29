"use strict";
class GeoLocalizacion {
    constructor() {
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this));
    }
    getPosicion(posicion) {
        this.longitud = posicion.coords.longitude;
        this.latitud = posicion.coords.latitude;
        this.precision = posicion.coords.accuracy;
        this.altitud = posicion.coords.altitude;
        this.precisionAltitud = posicion.coords.altitudeAccuracy;
        this.rumbo = posicion.coords.heading;
        this.velocidad = posicion.coords.speed;
    }
    getLongitud() {
        return this.longitud;
    }
    getLatitud() {
        return this.latitud;
    }
    getAltitud() {
        return this.altitud;
    }
    verTodo() {
        var ubicacion = document.querySelector("body > section");
        var datos = '';
        datos += '<h2>Mis datos de ubicación</h2>';
        datos += '<p>Longitud: ' + this.longitud + ' grados</p>';
        datos += '<p>Latitud: ' + this.latitud + ' grados</p>';
        datos += '<p>Precisión de la latitud y longitud: ' + this.precision + ' metros</p>';
        datos += '<p>Altitud: ' + this.altitude + ' metros</p>';
        datos += '<p>Precisión de la altitud: ' + this.precisionAltitud + ' metros</p>';
        datos += '<p>Rumbo: ' + this.rumbo + ' grados</p>';
        datos += '<p>Velocidad: ' + this.velocidad + ' metros/segundo</p>';
        ubicacion.innerHTML = datos;
    }
}
var miPosicion = new GeoLocalizacion();