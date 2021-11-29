"use strict";
class GeoLocalizacion {
    constructor() {
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }
    getPosicion(posicion) {
        this.mensaje = "Se ha realizado correctamente la petición de geolocalización";
        this.longitud = posicion.coords.longitude;
        this.latitud = posicion.coords.latitude;
        this.zoom = 12;
        this.rotacion = 0;
    }
    verErrores(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                this.mensaje = "El usuario no permite la petición de geolocalización"
                break;
            case error.POSITION_UNAVAILABLE:
                this.mensaje = "Información de geolocalización no disponible"
                break;
            case error.TIMEOUT:
                this.mensaje = "La petición de geolocalización ha caducado"
                break;
            case error.UNKNOWN_ERROR:
                this.mensaje = "Se ha producido un error desconocido"
                break;
        }
    }

    getMapaEstatico() {
        var ubicacion = document.querySelector("body > section");

        var apiKey = "?access_token=pk.eyJ1IjoidW8yNzEyODgiLCJhIjoiY2t3Ynk2YjhvM29xbzJvcm9lYnBidnFoZiJ9.hmiazSSrkMwSbBryHqHZcQ";
        var url = "https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/";
        var centro = this.longitud + "," + this.latitud + "," + this.zoom + "," + this.rotacion;
        var tamaño = "/500x500";
        var marker = "pin-s+000000(" + this.longitud + "," + this.latitud + ")/";

        this.imagenMapa = url + marker + centro + tamaño + apiKey;
        ubicacion.innerHTML = "<h2>Representa la imagen de un mapa estático con los alrededores de la posición del usuario</h2><img alt='mapa estatico' src='" + this.imagenMapa + "'/>";
    }
}
var miMapa = new GeoLocalizacion();