"use strict";
class Calculadora {

    constructor() {
        this.operacion = "";
        this.operacionMostrada = "";
        this.memoria = "";
        this.resuelto = false;
    }

    digitos(arg) {
        if (this.resuelto) {
            document.getElementById("resultado").textContent = "";
            this.resuelto = false;
        }
        this.operacion += arg;
        this.operacionMostrada += arg;
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    punto() {
        this.operacion += ".";
        this.operacionMostrada += ".";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    suma() {
        this.operacion += "+";
        this.operacionMostrada += "+";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    resta(resta) {
        this.operacion += "-";
        this.operacionMostrada += "-";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }
    
    mult(mult) {
        this.operacion += "*";
        this.operacionMostrada += "*";
        document.querySelector("body > div > textarea").textContent = this.operacionMostrada;
    }

    div(div) {
        this.operacion += "/";
        this.operacionMostrada += "/";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    igual() {
        this.operacion = eval(this.operacion);
        this.operacionMostrada = eval(this.operacion);
        document.getElementById("resultado").textContent = this.operacionMostrada;
        this.resuelto = false;
    }

    borrar() {
        document.getElementById("resultado").textContent = "";
        this.operacion = "";
        this.operacionMostrada = "";
    }

    mMenos() {
        if (!isNaN(document.getElementById("resultado").textContent))
            this.memoria = eval(this.memoria + "-" + document.getElementById("resultado").textContent);
    }

    mMas() {
        if (!isNaN(document.getElementById("resultado").textContent))
            this.memoria = eval(this.memoria + "+" + document.getElementById("resultado").textContent);
    }

    mrc() {
        var resultado = this.memoria;
        document.getElementById("resultado").textContent = resultado;
        this.operacion = resultado;
        this.operacionMostrada = resultado;
        this.memoria = "";
    }
}

var calculadora = new Calculadora();