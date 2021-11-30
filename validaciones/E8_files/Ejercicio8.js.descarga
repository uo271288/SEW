"use strict";
class Meteo {
    constructor(ciudad) {
        this.apikey = "041a43573582af70aa2bf15c729cfa48";
        this.ciudad = ciudad;
        this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "&APPID=" + this.apikey;
        this.correcto = "¡Todo correcto! JSON recibido de <a href='http://openweathermap.org'>OpenWeatherMap</a>"
    }
    cargarDatos() {
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: function(datos) {
                $("pre").text(JSON.stringify(datos, null, 2));

                var stringDatos = '<li><img alt="Imagen del tiempo" src="http://openweathermap.org/img/w/' + datos.weather[0].icon + '.png"></li>';
                stringDatos += "<li>Ciudad: " + datos.name + "</li>";
                stringDatos += "<li>País: " + datos.sys.country + "</li>";
                stringDatos += "<li>Latitud: " + datos.coord.lat + " grados</li>";
                stringDatos += "<li>Longitud: " + datos.coord.lon + " grados</li>";
                stringDatos += "<li>Temperatura: " + datos.main.temp + " grados Celsius</li>";
                stringDatos += "<li>Temperatura máxima: " + datos.main.temp_max + " grados Celsius</li>";
                stringDatos += "<li>Temperatura mínima: " + datos.main.temp_min + " grados Celsius</li>";
                stringDatos += "<li>Presión: " + datos.main.pressure + " milibares</li>";
                stringDatos += "<li>Humedad: " + datos.main.humidity + " %</li>";
                stringDatos += "<li>Amanece a las: " + new Date(datos.sys.sunrise * 1000).toLocaleTimeString() + "</li>";
                stringDatos += "<li>Oscurece a las: " + new Date(datos.sys.sunset * 1000).toLocaleTimeString() + "</li>";
                stringDatos += "<li>Dirección del viento: " + datos.wind.deg + " grados</li>";
                stringDatos += "<li>Velocidad del viento: " + datos.wind.speed + " metros/segundo</li>";
                stringDatos += "<li>Hora de la medida: " + new Date(datos.dt * 1000).toLocaleTimeString() + "</li>";
                stringDatos += "<li>Fecha de la medida: " + new Date(datos.dt * 1000).toLocaleDateString() + "</li>";
                stringDatos += "<li>Descripción: " + datos.weather[0].description + "</li>";
                stringDatos += "<li>Visibilidad: " + datos.visibility + " metros</li>";
                stringDatos += "<li>Nubosidad: " + datos.clouds.all + " %</li>";

                $("body").append('<ul></ul>');
                $("ul").html(stringDatos);
            },
            error: function() {
                $("h3").html("¡Tenemos problemas! No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>");
                $("h4").remove();
                $("pre").remove();
                $("ul").remove();
            }
        });
    }
    crearElemento(tipoElemento, texto) {
        var elemento = document.createElement(tipoElemento);
        elemento.innerHTML = texto;
        $("section").append(elemento);
    }
    verJSON() {
        $("ul").remove();
        $("section").empty();
        this.crearElemento("h2", "Datos en JSON desde <a href='http://openweathermap.org'>OpenWeatherMap</a>");
        this.crearElemento("h3", this.correcto);
        this.crearElemento("h4", "JSON");
        this.crearElemento("pre", "");
        this.crearElemento("h4", "Datos");
        this.cargarDatos();
    }
}