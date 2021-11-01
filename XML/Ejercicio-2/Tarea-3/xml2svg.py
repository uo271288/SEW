import xml.etree.ElementTree as ET
import codecs
import os

THIS_FOLDER = os.path.dirname(os.path.abspath(__file__))


list_circles = []
list_lines = []


def recursiveSvg(hijo, bound, level, center, lines):
    padre = True
    for persona in hijo:
        if persona.tag == "persona":
            x = center
            if padre:
                x -= bound
                padre = False
            else:
                x += bound
            if lines != None:
                list_lines.append((level, x, lines[0], lines[1]))
            list_circles.append((x, level, persona))
            recursiveSvg(persona, bound / 2, level - 300, x, (x, level))


def ver_XML(archivo_XML):
    try:
        arbol = ET.parse(archivo_XML)
    except IOError:
        print("No se encuentra el archivo ", archivo_XML)
        exit()
    except ET.ParseError:
        print("Error procesando en el archivo XML = ", archivo_XML)
        exit()

    raiz = arbol.getroot()
    svg = """<?xml version="1.0" encoding="utf-8"?>
             <svg width="2500" height="1300" style="overflow:visible " version="1.1" xmlns="http://www.w3.org/2000/svg">"""
    recursiveSvg(raiz.findall("persona"), 1200, 1100, 2500, None)

    for circle in list_circles[::-1]:
        i = -45
        svg += (
            '<g><circle cx="'
            + str(circle[0])
            + '" cy="'
            + str(circle[1])
            + '" r="135" style="fill:rgb(100,100,100);"/><text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2].attrib.get("nombre")
            + " "
            + circle[2].attrib.get("apellidos")
            + "</text>"
            + '<text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i + 15)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2].attrib.get("fecha_nacimiento")
        )
        if circle[2].attrib.get("fecha_fallecimiento") != None:
            svg += " " + circle[2].attrib.get("fecha_fallecimiento")
        svg += "</text>"
        i += 30
        svg += (
            '<text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2].find("lugar_nacimiento").attrib.get("lugar")
            + "</text>"
            + '<text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i + 15)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2]
            .find("lugar_nacimiento")
            .find("coordenadas")
            .find("longitud")
            .text
            + ","
            + circle[2]
            .find("lugar_nacimiento")
            .find("coordenadas")
            .find("latitud")
            .text
            + " "
            + circle[2]
            .find("lugar_nacimiento")
            .find("coordenadas")
            .find("altitud")
            .text
            + "m"
            + "</text>"
        )
        if circle[2].find("lugar_fallecimiento"):
            i += 30
            svg += (
                '<text x="'
                + str(circle[0])
                + '" y="'
                + str(circle[1] + i)
                + '" text-anchor="middle" font-size="16" style="fill:black">'
                + circle[2].find("lugar_fallecimiento").attrib.get("lugar")
                + "</text>"
                + '<text x="'
                + str(circle[0])
                + '" y="'
                + str(circle[1] + i + 15)
                + '" text-anchor="middle" font-size="16" style="fill:black">'
                + circle[2]
                .find("lugar_fallecimiento")
                .find("coordenadas")
                .find("longitud")
                .text
                + ","
                + circle[2]
                .find("lugar_fallecimiento")
                .find("coordenadas")
                .find("latitud")
                .text
                + " "
                + circle[2]
                .find("lugar_fallecimiento")
                .find("coordenadas")
                .find("altitud")
                .text
                + "m"
                + "</text>"
            )
        i += 30
        svg += (
            '<text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2].find("comentarios").text
            + "</text>"
        )
        i += 15
        svg += (
            '<text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1] + i)
            + '" text-anchor="middle" font-size="16" style="fill:black">'
            + circle[2].find("foto").attrib.get("url")
            + "</text>"
        )
        if circle[2].find("video") != None:
            i += 15
            svg += (
                '<text x="'
                + str(circle[0])
                + '" y="'
                + str(circle[1] + i)
                + '" text-anchor="middle" font-size="16" style="fill:black">'
                + circle[2].find("video").attrib.get("url")
                + "</text>"
            )
        svg += "</g>"
    for line in list_lines:
        svg += (
            '<line x1="'
            + str(line[2])
            + '" y1="'
            + str(line[3] - 135)
            + '" x2="'
            + str(line[1])
            + '" y2="'
            + str(line[0] + 135)
            + '" stroke="black"/>'
        )

    svg += "</svg>"
    file = codecs.open(os.path.join(THIS_FOLDER, "arbol_genealogico.svg"), "w", "utf-8")
    file.write(svg)
    file.close()


def main():
    ver_XML(os.path.join(THIS_FOLDER, "arbol_genealogico.xml"))


main()
