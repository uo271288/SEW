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
        var stringPila = ""
        var j = this.pila.length;
        for (var i in this.pila)
            stringPila +=j-- + ":" + this.pila[i]+"\n";

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

        this.inputkey();
    }

    inputkey() {
        document.addEventListener("keydown", (event) => {
            if (["*", "/", "-", "+", "."].some(el => event.key.includes(el))) {
                switch (event.key) {
                    case "+":
                        this.suma()
                        break;
                    case "-":
                        this.resta()
                        break;
                    case "*":
                        this.mult()
                        break;
                    case "/":
                        this.div()
                        break;
                    case ".":
                        this.punto()
                        break;
                }
            }
            else if (!isNaN(event.key)) {
                this.digito(event.key)
            }
            else if (event.key == "Enter") {
                this.enter()
            }
        })
    };

    digito(arg) {
        this.digitos += arg;
        document.querySelector("body > form > textarea:nth-child(2)").textContent = this.digitos;
    }

    punto() {
        this.digitos += ".";
        document.querySelector("body > form > textarea:nth-child(2)").textContent = this.digitos;
    }

    enter() {
        if (this.digitos) {
            this.pila.apilar(this.digitos);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
            document.querySelector("body > form > textarea:nth-child(2)").textContent = "";
            this.digitos = "";
        }
    }

    suma() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(a) + parseFloat(b);
            this.pila.apilar(c);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    resta() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(b) - parseFloat(a);
            this.pila.apilar(c);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    mult() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(a) * parseFloat(b);
            this.pila.apilar(c);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    div() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = parseFloat(b) / parseFloat(a);
            this.pila.apilar(c);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    x2() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = a ** 2;
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    sin() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.sin(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    cos() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.cos(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    tan() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.tan(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    asin() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.asin(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    acos() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.acos(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    atan() {
        if (this.pila.tamanno() >= 1) {
            var a = this.pila.desapilar();
            var b = Math.atan(a);
            this.pila.apilar(b);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    xy() {
        if (this.pila.tamanno() >= 2) {
            var a = this.pila.desapilar();
            var b = this.pila.desapilar();
            var c = b ** a;
            this.pila.apilar(c);
            document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
        }
    }

    borrar() {
        this.pila.vaciar();
        document.querySelector("body > form > textarea:nth-child(1)").innerHTML = this.pila.mostrar();
    }

    retroceso() {
        var str = this.digitos.substring(0, this.digitos.length - 1);
        this.digitos = str;
        document.querySelector("body > form > textarea:nth-child(2)").textContent = str;
    }
}

var calculadora = new CalculadoraRPN();