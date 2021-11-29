class Reproductor {

    toggleFullScreen() {
        var videoElement = document.querySelector("body > section > video");
        if (!document.mozFullScreen && !document.webkitFullScreen) {
            if (videoElement.mozRequestFullScreen) {
                videoElement.mozRequestFullScreen();
            } else {
                videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else {
                document.webkitCancelFullScreen();
            }
        }
    }

    cargarSubtitulos() {
        var video = document.querySelector("body > section > video"),
            track,
            track = video.addTextTrack("captions", "Spanish", "es");
        track.mode = "showing";
        track.addCue(new VTTCue(0, 2, "La vi con otra paloma"));
        track.addCue(new VTTCue(2.5, 4, "* inspira lastimosamente * me wa matar"));
        track.addCue(new VTTCue(5, 6.5, "Me wa matar [lenguaje ininteligible] wee"));
        track.addCue(new VTTCue(7, 8, "Wee"));
        track.addCue(new VTTCue(8.5, 9.5, "Wee"));
        track.addCue(new VTTCue(10.5, 11.5, "Me wa matar wee"));
        track.addCue(new VTTCue(12, 13, "Weeee"));
    }

    leerArchivoTexto(files) {
        document.body.appendChild(document.createElement("section"))
        var archivo = files[0];
        var tipoTexto = 'video.*';
        if (archivo.type.match(tipoTexto)) {
            document.querySelector("body > section").innerHTML = '<video controls><source src="' + archivo.name + '"></video>';
        } else {
            errorArchivo.innerText = "Error : ¡¡¡ Archivo no válido !!!";
        }
    };
}
var reproductor = new Reproductor();