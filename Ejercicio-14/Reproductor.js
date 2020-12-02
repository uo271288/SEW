class Reproductor {

    toggleFullScreen() {
        var videoElement = document.getElementById("myvideo");
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
        var video = document.getElementById("myvideo"),
            track,
            track = video.addTextTrack("captions", "English", "en");
        track.mode = "showing";
        track.addCue(new VTTCue(0, 26, "* Music *"));
        track.addCue(new VTTCue(27, 28, "Tequila"));
        track.addCue(new VTTCue(29, 68, "* Music *"));
        track.addCue(new VTTCue(69, 70, "Tequila"));
        track.addCue(new VTTCue(71, 100, "* Music *"));
        track.addCue(new VTTCue(101, 102, "Tequila"));
    }



    leerArchivoTexto(files) {
        var archivo = files[0];
        var tipoTexto = 'video.*';
        if (archivo.type.match(tipoTexto)) {
            document.getElementById("reproductor").innerHTML = '<video controls id="myvideo"><source src="' + archivo.name + '"></video>';
        } else {
            errorArchivo.innerText = "Error : ¡¡¡ Archivo no válido !!!";
        }
    };
}
var reproductor = new Reproductor();