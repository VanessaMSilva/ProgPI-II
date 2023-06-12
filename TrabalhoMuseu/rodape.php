<footer>
    <div class="d-lg-flex justify-content-around footer">
        <div>
            <h3>Museu</h3>
            <p>Horario: 09:00 - 18:00</p>
        </div>
        <div>
            <h3>Links</h3>
           <div> <a href="index.php">Home</a></div>
            <div><a href="#Obras.php">Obras</a></div>
            <div><a href="./membros.php">Membros</a></div>
        </div>
      
        <div>
            <h3>Localização</h3>
            <div id="map"></div>
        </div>
    </div>
</footer>
<script>
    let map, infoWindow;
    // Inicialize o mapa
    function initMap() {
        // Crie um objeto de mapa e especifique o elemento div e as opções
        const myLatLng = {
            lat: -18.169874,
            lng: -47.945884
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 8
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Museu PI II",
        });
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");

        locationButton.textContent = "Ver localização atual";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Sua localização");
                        infoWindow.open(map);
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }

    window.initMap = initMap;
</script>

<!-- Inclua a biblioteca do Google Maps JavaScript e a chave de API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqv2BrZZO0ErioBxkxoYE_QSsZ941V2gY&callback=initMap" async defer></script>

</body>

</html>

<!--
src="AIzaSyCqv2BrZZO0ErioBxkxoYE_QSsZ941V2gY" -->