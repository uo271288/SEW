"use strict";
class CalculadoraCientifica extends Calculadora {

    mc() {
        this.memoria = "";
    }

    mr() {
        document.getElementById("resultado").textContent = this.memoria;
        this.operacion = this.memoria;
        this.operacionMostrada = this.memoria;
    }

    ms() {
        if (!isNaN(document.getElementById("resultado").textContent))
            this.memoria = document.getElementById("resultado").textContent;
    }

    x2() {
        this.operacion += "**2";
        this.operacionMostrada += "^2";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    xy() {
        this.operacion += "**";
        this.operacionMostrada += "^";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    sin() {
        this.operacion += "Math.sin(";
        this.operacionMostrada += "sin(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    cos() {
        this.operacion += "Math.cos(";
        this.operacionMostrada += "cos(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    tan() {
        this.operacion += "Math.tan(";
        this.operacionMostrada += "tan(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    sqrt() {
        this.operacion += "Math.sqrt(";
        this.operacionMostrada += "√(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    e10x() {
        this.operacion += "10**";
        this.operacionMostrada += "10^";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    log10() {
        this.operacion += "Math.log10(";
        this.operacionMostrada += "log(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    ex() {
        this.operacion += "Math.exp(";
        this.operacionMostrada += "e^";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    mod() {
        this.operacion += "%";
        this.operacionMostrada += " Mod ";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    pi() {
        this.operacion += Math.PI;
        this.operacionMostrada += "π";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    e() {
        this.operacion += Math.E;
        this.operacionMostrada += "e";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    abs() {
        this.operacion += "Math.abs(";
        this.operacionMostrada += "abs(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    cbrt() {
        this.operacion += "Math.cbrt(";
        this.operacionMostrada += "∛(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    ln() {
        this.operacion += "Math.log(";
        this.operacionMostrada += "ln(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    pr() {
        this.operacion += ")";
        this.operacionMostrada += ")";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    pl() {
        this.operacion += "(";
        this.operacionMostrada += "(";
        document.getElementById("resultado").textContent = this.operacionMostrada;
    }

    retroceso() {
        var str = this.operacion.substring(0, this.operacion.length - 1);
        this.operacion = str;
        str = this.operacionMostrada.substring(0, this.operacionMostrada.length - 1);
        document.getElementById("resultado").textContent = str;
        this.operacionMostrada = str;
    }
}

var calculadora = new CalculadoraCientifica();