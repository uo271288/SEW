import xml.etree.ElementTree as ET
import codecs

def verXML(archivoXML):
    try:
        arbol = ET.parse(archivoXML)
    except IOError:
        print ('No se encuentra el archivo ', archivoXML)
        exit()
    except ET.ParseError:
        print("Error procesando en el archivo XML = ", archivoXML)
        exit()
    raiz = arbol.getroot()
    file = codecs.open("arbol_genealogico.html","w", "utf-8")
    text = '<!DOCTYPE HTML><html lang="es-ES"><head><meta name="viewport" content="width=device-width"><meta charset="UTF-8"><meta name="author" content="Alejandro Álvarez Varela" /><meta name="description" content="'+raiz.tag.replace('_', ' ').capitalize()+'" /><meta name="keywords" content="'+raiz.tag.replace('_', ',')+'" /><title>'+raiz.tag.replace('_', ' ').capitalize()+'</title><link rel="stylesheet" type="text/css" href="estilo.css" /></head><body><h1>'+raiz.tag.replace('_', ' ').upper()+"</h1>"

    if raiz.text != None:
        print("Contenido = "    , raiz.text.strip('\n'))
    else:
        print("Contenido = "    , raiz.text)

    print("Atributos = "    , raiz.attrib)

    for hijo in raiz.findall('.//'):
        print("\nElemento = " , hijo.tag)
        if hijo.text != None:
            print("Contenido = ", hijo.text.strip('\n'))
        else:
            print("Contenido = ", hijo.text)
        print("Atributos = ", hijo.attrib)
    text+="</body></html>"
    file.write(text)
    file.close()
def main():

    print(verXML.__doc__)

    miArchivoXML = input('Introduzca un archivo XML = ')

    verXML(miArchivoXML)

if __name__ == "__main__":
    main()