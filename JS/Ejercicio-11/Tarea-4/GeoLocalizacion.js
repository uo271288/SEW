class MapaDinamico {

    constructor() {
        this.oviedo = [-5.8502461,43.3672702];
        this.apiKey = "pk.eyJ1IjoidW8yNzEyODgiLCJhIjoiY2t3Ynk4bG5hMGZhdjJwbjJzNjZwMHI2OCJ9.4VqHsw5zVVkrOGjQLn3doA";
        this.container = "mapaDinamico";
        this.mapStyle = "mapbox://styles/mapbox/dark-v10";
        this.zoom = 8;
    }

    mapaDinamico(){       
        mapboxgl.accessToken = this.apiKey;
        let map = new mapboxgl.Map({
          container: this.container,
          style: this.mapStyle,
          center: this.oviedo,
          zoom: this.zoom
        });
        let marker1 = new mapboxgl.Marker()
            .setLngLat(this.oviedo)
            .addTo(map);
    }     
}

var mapaDinamico = new MapaDinamico();