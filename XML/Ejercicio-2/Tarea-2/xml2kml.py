import xml.etree.ElementTree as ET
import os
THIS_FOLDER = os.path.dirname(os.path.abspath(__file__))

class Kml(object):
    def __init__(self):
        self.root = ET.Element('kml')
        self.doc = ET.SubElement(self.root,'Document')

    def add_placemark(self,name,desc,coordinates):
        pm = ET.SubElement(self.doc,'Placemark')
        ET.SubElement(pm,'name').text = name
        ET.SubElement(pm,'description').text = desc
        pt = ET.SubElement(pm,'Point')
        ET.SubElement(pt,'coordinates').text = coordinates
        ET.SubElement(pt, "altitudeMode").text = "relativeToGround"

    def write(self,filename):
        tree = ET.ElementTree(self.root)
        tree.write(filename)

def verXML(archivo_XML):
    try:
        arbol = ET.parse(archivo_XML)
    except IOError:
        print ('No se encuentra el archivo ', archivo_XML)
        exit()
    except ET.ParseError:
        print("Error procesando en el archivo XML = ", archivo_XML)
        exit()


    raiz = arbol.getroot()
    kml = Kml()
    latitud = ""
    longitud = ""
    nombre = ""
    descripcion = ""
    for hijo in raiz.findall('.//'):
        if(hijo.tag == "persona"):
            nombre = hijo.attrib.get("nombre") + " " + hijo.attrib.get("apellidos")
            descripcion = "Nació en:" + hijo.find("lugar_nacimiento").attrib.get("lugar")
            latitud = hijo.find("lugar_nacimiento/coordenadas/latitud").text
            longitud = hijo.find("lugar_nacimiento/coordenadas/longitud").text
            kml.add_placemark(nombre, descripcion, longitud+","+latitud)
            if(hijo.find("lugar_fallecimiento")):
                descripcion = "Falleció en:" + hijo.find("lugar_nacimiento").attrib.get("lugar")
                latitud = hijo.find("lugar_fallecimiento/coordenadas/latitud").text
                longitud = hijo.find("lugar_fallecimiento/coordenadas/longitud").text
                kml.add_placemark(nombre, descripcion, longitud+","+latitud)
    kml.write(os.path.join(THIS_FOLDER,"arbol_genealogico.kml"))
        
    
    
def main():
    verXML(os.path.join(THIS_FOLDER,"arbol_genealogico.xml"))

main()