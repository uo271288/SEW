"use strict"
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
        var stringPila = ""
        var j = this.pila.length;
        for (var i in this.pila)
            stringPila += j-- + ":" + this.pila[i] + " kw/h\n";

        return stringPila;
    }

    tamanno() {
        return this.pila.length;
    }
}

class Calculadora extends CalculadoraRPN {

    total() {

        var total = 0.0;
        for (var element of this.pila.pila) {
            total += parseFloat(element);
        }

        this.pila.vaciar();
        this.pila.apilar(total);
        document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar().split(":")[1];
    }

    precio() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = a * 0.29666;
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar().split(":")[1].split(" ")[0]+" €";
        }
    }
}
var calculadora = new Calculadora();