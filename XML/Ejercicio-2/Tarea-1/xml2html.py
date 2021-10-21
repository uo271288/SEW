import xml.etree.ElementTree as ET
import codecs


def verXML(archivoXML):
    try:
        arbol = ET.parse(archivoXML)
    except IOError:
        print("No se encuentra el archivo ", archivoXML)
        exit()
    except ET.ParseError:
        print("Error procesando en el archivo XML = ", archivoXML)
        exit()
    raiz = arbol.getroot()
    file = codecs.open("arbol_genealogico.html", "w", "utf-8")
    text = (
        "<!DOCTYPE HTML>"
        + '<html lang="es-ES">'
        + "<head>"
        + '<meta name="viewport" content="width=device-width">'
        + '<meta charset="UTF-8">'
        + '<meta name="author" content="Alejandro Álvarez Varela" />'
        + '<meta name="description" content="'
        + raiz.tag.replace("_", " ").capitalize()
        + '" />'
        + '<meta name="keywords" content="'
        + raiz.tag.replace("_", ",")
        + '" />'
        + "<title>"
        + raiz.tag.replace("_", " ").capitalize()
        + "</title>"
        + '<link rel="stylesheet" type="text/css" href="estilo.css" />'
        + "</head>"
        + "<body>"
        + "<header>"
        + "<h1>"
        + raiz.tag.replace("_", " ").upper()
        + "</h1>"
        + "</header>"
    )

    text += "<main>"
    for hijo in raiz.findall(".//"):
        if hijo.tag == "persona":
            text += (
                "<section><h2>"
                + hijo.attrib.get("nombre")
                + " "
                + hijo.attrib.get("apellidos")
                + "</h2>"
                + "<p> Fecha de nacimiento: "
                + hijo.attrib.get("fecha_nacimiento")
                + "</p>"
            )
            if hijo.attrib.get("fecha_fallecimiento") != None:
                text += (
                    "<p> Fecha de fallecimiento: "
                    + hijo.attrib.get("fecha_fallecimiento")
                    + "</p>"
                )

        if hijo.tag == "lugar_nacimiento":
            text += "<p>Lugar de nacimiento: " + hijo.attrib.get("lugar") + "</p>"
        if hijo.tag == "lugar_fallecimiento":
            text += "<p>Lugar de fallecimiento: " + hijo.attrib.get("lugar") + "</p>"
        if hijo.tag == "coordenadas":
            text += "<p>"
        if hijo.tag == "latitud":
            text += hijo.text + ","
        if hijo.tag == "longitud":
            text += hijo.text + " "
        if hijo.tag == "altitud":
            text += "altitud: " + hijo.text + "m</p>"
        if hijo.tag == "foto":
            text += (
                '<figure><img alt="'
                + hijo.text
                + '" src="Multimedia/'
                + hijo.attrib.get("url")
                + '" title="'
                + hijo.text
                + '"><figcaption>'
                + hijo.text
                + "</figcaption></figure>"
            )
        if hijo.tag == "video":
            text += (
                '<figure><video src="Multimedia/'
                + hijo.attrib.get("url")
                + '" controls></video><figcaption>'
                + hijo.text
                + "</figcaption></figure>"
            )
        if hijo.tag == "comentarios":
            text += "<p>" + hijo.text + "</p></section>"

    text += "</main></body></html>"
    file.write(text)
    file.close()


def main():

    print(verXML.__doc__)

    miArchivoXML = input("Introduzca un archivo XML = ")

    verXML(miArchivoXML)


if __name__ == "__main__":
    main()
