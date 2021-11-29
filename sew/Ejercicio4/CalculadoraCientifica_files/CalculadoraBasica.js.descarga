"use strict";
class Calculadora {

    constructor() {
        this.operando1 = 0;
        this.operando2 = 0;
        this.operador = "";
        this.operacion = "";
        this.operacionMostrada = "";
        this.memoria = 0;
        this.resuelto = false;

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
                this.digitos(event.key)
            }
            else if (event.key == "Enter") {
                this.igual()
            }
        })
    };

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
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "+"
        this.operacionMostrada += "+";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    resta() {
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "-"
        this.operacionMostrada += "-";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    mult() {
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "*"
        this.operacionMostrada += "*";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    div() {
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "/"
        this.operacionMostrada += "/";
        this.resuelto = false;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    igual() {
        this.operando2 = new Number(this.operacion)
        this.operacion = eval(this.operando1 + this.operador + this.operando2);
        this.operador = ""
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
        this.resuelto = true;
    }

    borrar() {
        document.querySelector("body > form > textarea").textContent = "";
        this.operando1 = 0;
        this.operando2 = 0;
        this.operador = "";
        this.operacion = "";
        this.operacionMostrada = "";
    }

    mMenos() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memoria = Number(this.memoria) - Number(document.querySelector("body > form > textarea").textContent);
            this.operacion = "";
            this.operacionMostrada = "";
        }
    }

    mMas() {
        if (!Number(document.querySelector("body > form > textarea").textContent).isNaN) {
            this.memoria = Number(this.memoria) + Number(document.querySelector("body > form > textarea").textContent);
            this.operacion = "";
            this.operacionMostrada = "";
        }
    }

    mrc() {
        var resultado = this.memoria;
        document.querySelector("body > form > textarea").textContent = resultado;
        this.operacion = resultado;
        this.operacionMostrada = resultado;
        this.memoria = 0;
        this.resuelto = true
    }
}

var calculadora = new Calculadora();