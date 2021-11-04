"use strict";
class PilaLIFO {
    constructor() {
        this.pila = new Array();
    }
    apilar(valor) {
        this.pila.push(valor);
    }

    desapilar() {
        return (this.pila.pop());
    }

    vaciar() {
        var size = this.pila.length;
        for (var i = 0; i < size; i++)
            this.pila.pop();
    }

    mostrar() {
        var stringPila = '<table>';
        var j = this.pila.length;
        for (var i in this.pila)
            stringPila += "<tr><th>" + j-- + ":</th><td>" + this.pila[i] + "</td></tr>";
        stringPila += "</table>"

        return stringPila;
    }

    tamanno() {
        return this.pila.length;
    }
}

class CalculadoraRPN {

    constructor() {
        this.digitos = "";
        this.pila = new PilaLIFO();
    }

    digito(arg) {
        this.digitos += arg;
        document.getElementById("textarea").textContent = this.digitos;
    }

    punto() {
        this.digitos += ".";
        document.getElementById("textarea").textContent = this.digitos;
    }

    enter() {
        if (this.digitos) {
            this.pila.apilar(this.digitos);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
            document.getElementById("textarea").textContent = "";
            this.digitos = "";
        }
    }

    suma() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(a) + parseFloat(b);
            this.pila.apilar(c);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    resta() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(b) - parseFloat(a);
            this.pila.apilar(c);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    mult() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(a) * parseFloat(b);
            this.pila.apilar(c);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    div() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(b) / parseFloat(a);
            this.pila.apilar(c);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    x2() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = a ** 2;
            this.pila.apilar(b);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    sin() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.sin(a);
            this.pila.apilar(b);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    cos() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.cos(a);
            this.pila.apilar(b);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    tan() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.tan(a);
            this.pila.apilar(b);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    xy() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = b ** a;
            this.pila.apilar(c);
            document.getElementById("resultado").innerHTML = this.pila.mostrar();
        }
    }

    borrar() {
        this.pila.vaciar();
        document.getElementById("resultado").innerHTML = this.pila.mostrar();
    }

    retroceso() {
        var str = this.digitos.substring(0, this.digitos.length - 1);
        this.digitos = str;
        document.getElementById("textarea").textContent = str;
    }
}

var calculadora = new CalculadoraRPN();