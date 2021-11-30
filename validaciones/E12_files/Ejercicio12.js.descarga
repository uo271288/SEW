class Lector {

    validar() {
        var p = document.createElement("p")
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            p.textContent = "Este navegador soporta el API File";
            document.body.append(p);
        }
        else {
            p.textContent = "¡¡¡ Este navegador NO soporta el API File y este programa puede no funcionar correctamente !!!";
            document.body.append(p);
        }
    }

    calcularTamañoArchivos() {
        var nBytes = 0,
            archivos = document.getElementById("subirArchivos").files,
            nArchivos = archivos.length;
        for (var i = 0; i < nArchivos; i++) {
            nBytes += archivos[i].size;
        }
        var nombresTiposTamaños = "";
        for (var i = 0; i < nArchivos; i++) {
            nombresTiposTamaños += "Archivo[" + i + "] = " + archivos[i].name + " Tamaño: " + archivos[i].size + " bytes " + " Tipo: " + archivos[i].type;
        }

        document.querySelector("body > section > p:nth-child(4)").innerHTML += nArchivos;
        document.querySelector("body > section > p:nth-child(5)").innerHTML += nBytes + " bytes";
        document.querySelector("body > section > p:nth-child(6)").innerHTML += nombresTiposTamaños;
    }



    leerArchivoTexto(files) {
        var archivo = files[0];
        document.querySelector("body > section > p:nth-child(9)").innerText += archivo.name;
        document.querySelector("body > section > p:nth-child(10)").innerText += archivo.size + " bytes";
        document.querySelector("body > section > p:nth-child(11)").innerText += archivo.type;
        document.querySelector("body > section > p:nth-child(12)").innerText += archivo.lastModifiedDate;
        var lector = new FileReader();
        lector.onload = function () {
            document.querySelector("body > section > pre").innerText += lector.result;
        }
        lector.readAsText(archivo);
    };
}

var lector = new Lector();