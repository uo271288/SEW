"use strict";
class Calculadora {

    constructor() {
        this.operacion = "";
        this.operacionMostrada = "";
        this.memoria = "";
        this.resuelto = false

        document.addEventListener("keydown", (event) => {
            const keyName = event.key.replace(/[^\d.\-\/\*\+]/g, '');
            if (this.resuelto && !["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                document.querySelector("body > form > textarea").textContent = "";
                this.resuelto = false;
                this.operacion = "";
                this.operacionMostrada = ""
            }
            if (["*", "/", "-", "+"].some(el => keyName.includes(el))) {
                this.resuelto = false;
            }
            document.querySelector("body > form > textarea").textContent += keyName;
            this.operacion += keyName
            this.operacionMostrada += keyName
            if (event.code.match("Enter")) {
                this.igual();
                this.resuelto = true;
            }
        });
    }

    digitos(arg) {
        if (this.resuelto) {
            document.querySelector("body > form > textarea").textContent = "";
            this.resuelto = false;
            this.operacion = "";
            this.operacionMostrada = ""
        }
        this.operacion += arg;
        this.operacionMostrada += arg;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    punto() {
        this.operacion += ".";
        this.operacionMostrada += ".";
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    suma() {
        this.operacion += "+";
        this.operacionMostrada += "+";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    resta() {
        this.operacion += "-";
        this.operacionMostrada += "-";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    mult() {
        this.operacion += "*";
        this.operacionMostrada += "*";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    div() {
        this.operacion += "/";
        this.operacionMostrada += "/";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    igual() {
        this.operacion = Number(eval(this.operacion));
        this.operacionMostrada = Number(eval(this.operacion));
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
        this.resuelto = true;
    }

    borrar() {
        document.querySelector("body > form > textarea").textContent = "";
        this.operacion = "";
        this.operacionMostrada = "";
    }

    mMenos() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memoria = Number(eval(this.memoria + "-" + document.querySelector("body > form > textarea").textContent));
            this.operacion = "";
            this.operacionMostrada = "";
        }
    }

    mMas() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memoria = Number(eval(this.memoria + "+" + document.querySelector("body > form > textarea").textContent));
            this.operacion = "";
            this.operacionMostrada = "";
        }
    }

    mrc() {
        var resultado = this.memoria;
        document.querySelector("body > form > textarea").textContent = resultado;
        this.operacion = resultado;
        this.operacionMostrada = resultado;
        this.memoria = "";
        this.resuelto = true
    }

}

var calculadora = new Calculadora();