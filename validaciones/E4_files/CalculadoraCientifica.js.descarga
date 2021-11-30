"use strict";
class CalculadoraCientifica extends Calculadora {

    constructor() {
        super();
        this.radians = true;
        this.changed = false;
        this.h = false;
        this.notation = false;
    }

    mc() {
        this.memoria = "";
    }

    mr() {
        document.querySelector("body > form > textarea").textContent = this.memoria;
        this.operacion = this.memoria;
        this.operacionMostrada = this.memoria;
    }

    ms() {
        if (!isNaN(document.querySelector("body > form > textarea").textContent))
            this.memoria = document.querySelector("body > form > textarea").textContent;
    }

    x2() {
        this.operacion = Math.pow(new Number(this.operacion), 2);
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    x3() {
        this.operacion = Math.pow(new Number(this.operacion), 3);
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    xy() {
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "**"
        this.operacionMostrada += "^";
        Math.
            document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    sin() {
        this.operacion = Math.sin(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    cos() {
        this.operacion = Math.cos(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    tan() {
        this.operacion = Math.tan(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    sinh() {
        this.operacion = Math.sinh(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    cosh() {
        this.operacion = Math.cosh(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    tanh() {
        this.operacion = Math.tanh(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    asin() {
        this.operacion = Math.asin(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    acos() {
        this.operacion = Math.acos(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    atan() {
        this.operacion = Math.atan(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    sqrt() {
        this.operacion = Math.sqrt(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    inv() {
        this.operacion = 1 / new Number(this.operacion);
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    cbrt() {
        this.operacion = Math.cbrt(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    e10x() {
        this.operacion = Math.pow(10, new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    log10() {
        this.operacion = Math.log10(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    ln() {
        this.operacion = Math.log(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    ex() {
        this.operacion = Math.exp(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    mod() {
        this.operando1 = new Number(this.operacion)
        this.operacion = "";
        this.operador = "%"
        this.operacionMostrada += "Mod";
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    pi() {
        this.operacion += Math.PI;
        this.operacionMostrada += "π";
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    change() {
        if (!this.changed) {
            let b1 = document.createElement("button");
            b1.setAttribute("type", "button");
            b1.setAttribute("onclick", "calculadora.x3()");
            b1.innerHTML = "x<sup>3</sup>";
            document.querySelector("body > form > button:nth-child(10)").replaceWith(b1);


            let b2 = document.createElement("button");
            b2.setAttribute("type", "button");
            b2.setAttribute("onclick", "calculadora.cbrt()");
            b2.innerHTML = "&#8731;";
            document.querySelector("body > form > button:nth-child(11)").replaceWith(b2);

            let b3 = document.createElement("button");
            b3.setAttribute("type", "button");
            b3.setAttribute("onclick", "calculadora.asin()");
            b3.innerHTML = "sin<sup>-1</<sup>";
            document.querySelector("body > form > button:nth-child(12)").replaceWith(b3);

            let b4 = document.createElement("button");
            b4.setAttribute("type", "button");
            b4.setAttribute("onclick", "calculadora.acos()");
            b4.innerHTML = "cos<sup>-1</<sup>";
            document.querySelector("body > form > button:nth-child(13)").replaceWith(b4);

            let b5 = document.createElement("button");
            b5.setAttribute("type", "button");
            b5.setAttribute("onclick", "calculadora.atan()");
            b5.innerHTML = "tan<sup>-1</<sup>";
            document.querySelector("body > form > button:nth-child(14)").replaceWith(b5);

            let b6 = document.createElement("button");
            b6.setAttribute("type", "button");
            b6.setAttribute("onclick", "calculadora.inv()");
            b6.innerHTML = "1/x";
            document.querySelector("body > form > button:nth-child(15)").replaceWith(b6);

            let b7 = document.createElement("button");
            b7.setAttribute("type", "button");
            b7.setAttribute("onclick", "calculadora.ln()");
            b7.innerHTML = "ln";
            document.querySelector("body > form > button:nth-child(17)").replaceWith(b7);
            this.changed = true;
        }
        else {
            let b1 = document.createElement("button");
            b1.setAttribute("type", "button");
            b1.setAttribute("onclick", "calculadora.x2()");
            b1.innerHTML = "x<sup>2</sup>";
            document.querySelector("body > form > button:nth-child(10)").replaceWith(b1);


            let b2 = document.createElement("button");
            b2.setAttribute("type", "button");
            b2.setAttribute("onclick", "calculadora.xy()");
            b2.innerHTML = "x<sup>y</sup>";
            document.querySelector("body > form > button:nth-child(11)").replaceWith(b2);

            let b3 = document.createElement("button");
            b3.setAttribute("type", "button");
            b3.setAttribute("onclick", "calculadora.sin()");
            b3.innerHTML = "sin";
            document.querySelector("body > form > button:nth-child(12)").replaceWith(b3);

            let b4 = document.createElement("button");
            b4.setAttribute("type", "button");
            b4.setAttribute("onclick", "calculadora.cos()");
            b4.innerHTML = "cos";
            document.querySelector("body > form > button:nth-child(13)").replaceWith(b4);

            let b5 = document.createElement("button");
            b5.setAttribute("type", "button");
            b5.setAttribute("onclick", "calculadora.tan()");
            b5.innerHTML = "tan";
            document.querySelector("body > form > button:nth-child(14)").replaceWith(b5);

            let b6 = document.createElement("button");
            b6.setAttribute("type", "button");
            b6.setAttribute("onclick", "calculadora.sqrt()");
            b6.innerHTML = "&#x221A;";
            document.querySelector("body > form > button:nth-child(15)").replaceWith(b6);

            let b7 = document.createElement("button");
            b7.setAttribute("type", "button");
            b7.setAttribute("onclick", "calculadora.log10()");
            b7.innerHTML = "log";
            document.querySelector("body > form > button:nth-child(17)").replaceWith(b7);

            this.changed = false;
        }
    }

    invert() {
        this.operacion = - new Number(this.operacion)
        this.operacionMostrada = this.operacion
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    e() {
        this.operacion += Math.E;
        this.operacionMostrada += "e";
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    ln() {
        this.operacion = Math.log(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    pr() {
        let aux = this.operacionMostrada
        this.igual()
        this.operacionMostrada = aux + ")"
        this.operando1 = "";
        this.resuelto = false
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    pl() {
        this.operacionMostrada += "(";
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    deg() {
        if (this.radians) {
            this.operacion = new Number(this.operacion) * (180 / Math.PI);
            this.operacionMostrada = this.operacion
            document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
            this.radians = false;
        }
        else {
            this.operacion = new Number(this.operacion) * (Math.PI / 180);
            this.operacionMostrada = this.operacion
            document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
            this.radians = true;
        }
    }

    hyp() {
        if (!this.h) {
            let b1 = document.createElement("button");
            b1.setAttribute("type", "button");
            b1.setAttribute("onclick", "calculadora.sinh()");
            b1.innerHTML = "sinh";
            document.querySelector("body > form > button:nth-child(12)").replaceWith(b1);

            let b2 = document.createElement("button");
            b2.setAttribute("type", "button");
            b2.setAttribute("onclick", "calculadora.cosh()");
            b2.innerHTML = "cosh";
            document.querySelector("body > form > button:nth-child(13)").replaceWith(b2);

            let b3 = document.createElement("button");
            b3.setAttribute("type", "button");
            b3.setAttribute("onclick", "calculadora.tanh()");
            b3.innerHTML = "tanh";
            document.querySelector("body > form > button:nth-child(14)").replaceWith(b3);
            this.h = true;
        }
        else {
            let b1 = document.createElement("button");
            b1.setAttribute("type", "button");
            b1.setAttribute("onclick", "calculadora.sin()");
            b1.innerHTML = "sin";
            document.querySelector("body > form > button:nth-child(12)").replaceWith(b1);

            let b2 = document.createElement("button");
            b2.setAttribute("type", "button");
            b2.setAttribute("onclick", "calculadora.cos()");
            b2.innerHTML = "cos";
            document.querySelector("body > form > button:nth-child(13)").replaceWith(b2);

            let b3 = document.createElement("button");
            b3.setAttribute("type", "button");
            b3.setAttribute("onclick", "calculadora.tan()");
            b3.innerHTML = "tan";
            document.querySelector("body > form > button:nth-child(14)").replaceWith(b3);
            this.h = false;
        }
    }

    f_e() {
        if (!this.notation) {
            this.operacion = new Number(this.operacion).toExponential()
            this.operacionMostrada = this.operacion
            document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
            this.notation = true;
        }
        else {
            this.operacion = new Number(this.operacion)
            this.operacionMostrada = this.operacion
            document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
            this.notation = false;
        }
    }

    retroceso() {
        var str = this.operacion.substring(0, this.operacion.length - 1);
        this.operacion = str;
        str = this.operacionMostrada.substring(0, this.operacionMostrada.length - 1);
        document.querySelector("body > form > textarea").textContent = str;
        this.operacionMostrada = str;
    }

    fact(){
        this.operacion = this.factorial(new Number(this.operacion));
        this.operacionMostrada = this.operacion;
        document.querySelector("body > form > textarea").textContent = this.operacionMostrada;
    }

    factorial(n) {
        var f = [];
        if (n == 0 || n == 1)
            return 1;
        if (f[n] > 0)
            return f[n];
        return f[n] = this.factorial(n - 1) * n;
    }
}

var calculadora = new CalculadoraCientifica();