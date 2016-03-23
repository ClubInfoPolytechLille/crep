$(document).ready(function() {
    // enhance tel-links (from http://stackoverflow.com/a/18921965/2766106)
    $("a[href^='tel:']").each(function() {
        var target = "call-" + this.href.replace(/[^a-z0-9]*/gi, "");
        var link = this;

        // load in iframe to supress potential errors when protocol is not available
        $("body").append("<iframe name=\"" + target + "\" style=\"display: none\"></iframe>");
        link.target = target;

        // replace tel with callto on desktop browsers for skype fallback
        if (!navigator.userAgent.match(/(mobile)/gi)) {
            link.href = link.href.replace(/^tel:/, "callto:");
        }
    });

    // Carte
    var mapCanvas = document.getElementById('map-canvas');
    mapCanvas.innerHTML = '';
    var polytechPos = new google.maps.LatLng(50.6074998, 3.1373338);
    var mapOptions = {
        center: polytechPos,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
        place: {
            location: polytechPos,
            query: "Polytech Lille"
        },
        attribution: {
            source: "Coupe de Robotique des Écoles Primaires",
            webUrl: window.location.host
        },
        map: map,
        title: "Polytech Lille"
    });
    var infowindow = new google.maps.InfoWindow({
        content: "<strong>Polytech Lille</strong><br/>Lieux des évènements de la Coupe de Robotique des Écoles Primaires"
    });
    marker.addListener('click', function() {
        infowindow.open(map, this);
    });
});
