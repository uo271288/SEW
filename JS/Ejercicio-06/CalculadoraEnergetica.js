class Electrodomestico {
    constructor(electrodomestico, potencia, precio) {
        this.electrodomestico = electrodomestico;
        this.potencia = potencia;
        this.precio = precio;
    }

    getNombre() {
        return this.electrodomestico;
    }

    getConsumo() {
        return this.potencia * this.precio;
    }
}

class Calculadora {
    constructor() {
        this.electrodomesticos = [];
    }

    annadir() {
        this.electrodomesticos.push(new Electrodomestico(document.getElementById("electrodomestico").value,
            document.getElementById("potencia").value, document.getElementById("precio").value));
        document.getElementById("electrodomestico").value = "";
        document.getElementById("potencia").value = "";
        document.getElementById("precio").value = "";
    }
    calcular() {
        var table = document.createElement('table');
        table.id = 'tabla';
        document.getElementsByTagName("body")[0].appendChild(table);
        document.getElementById("tabla").outerHTML = '<table id="tabla"><tr><th>Electrodoméstico</th><th>Precio</th></tr></table>';
        var total = 0.0;
        for (var electrodomestico of this.electrodomesticos) {

            document.getElementById("tabla").innerHTML += "<tr><td>" + electrodomestico.getNombre() + "</td><td>" + electrodomestico.getConsumo() + " €/h</td></tr>";
            total += electrodomestico.getConsumo();
        }
        document.getElementById("tabla").innerHTML += '<tr><th colspan="2">Total</th></tr><tr><td colspan="2">' + total + ' €/h</td></tr>';
    }
}
var calculadora = new Calculadora();