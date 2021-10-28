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
            list_circles.append(
                (
                    x,
                    level,
                    persona.attrib.get("nombre"),
                    persona.attrib.get("apellidos"),
                )
            )
            recursiveSvg(persona, bound / 2, level - 200, x, (x, level))

def ver_XML(archivo_XML):
    try:
        arbol = ET.parse(archivo_XML)
    except IOError:
        print ('No se encuentra el archivo ', archivo_XML)
        exit()
    except ET.ParseError:
        print("Error procesando en el archivo XML = ", archivo_XML)
        exit()

    raiz = arbol.getroot()
    svg = """<?xml version="1.0" encoding="utf-8"?>
             <svg width="1500" height="800" style="overflow:visible " version="1.1" xmlns="http://www.w3.org/2000/svg">"""
    recursiveSvg(raiz.findall("persona"), 700, 690, 1400, None)

    for circle in list_circles[::-1]:
        svg += (
            '<g><circle cx="'
            + str(circle[0])
            + '" cy="'
            + str(circle[1])
            + '" r="75" style="fill:rgb(0,0,0);"/><text x="'
            + str(circle[0])
            + '" y="'
            + str(circle[1])
            + '" text-anchor="middle" font-size="14" style="fill:white">'
            + circle[2]
            + " "
            + circle[3]
            + "</text></g>"
        )
    for line in list_lines:
        svg += (
            '<line x1="'
            + str(line[2])
            + '" y1="'
            + str(line[3]-75)
            + '" x2="'
            + str(line[1])
            + '" y2="'
            + str(line[0]+75)
            + '" stroke="black"/>'
        )

    svg += "</svg>"
    file = codecs.open(os.path.join(THIS_FOLDER,"arbol_genealogico.svg"), "w", "utf-8")
    file.write(svg)
    file.close()


def main():
    ver_XML(os.path.join(THIS_FOLDER,"arbol_genealogico.xml"))

main()
