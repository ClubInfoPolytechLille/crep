function loadDoc(ev) {
    var location = ev.currentTarget.href
    if (location.indexOf(window.location.host) >= 0) {
        $.get(location + '?c', function (data) {
            mainContainer = $("#mainContainer")
            mainContainer.html(data)
            // POST
            dynamiseLinks(mainContainer)
            pageSpecific(location)
        })
        return false
    }
}

function dynamiseLinks(el) {
    $("a", el).click(loadDoc)
}

function pageSpecific(location) {
    if (location.indexOf('contact') >= 0) {
        initializeMap()
    }
}

$(document).ready(function () {
    dynamiseLinks(document)
    pageSpecific(window.location.href)
})

function initializeMap() {
    var mapCanvas = document.getElementById('map-canvas');
    mapCanvas.innerHTML = ''
    var polytechPos = new google.maps.LatLng(50.6074998, 3.1373338);
    var mapOptions = {
        center: polytechPos,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
    var marker = new google.maps.Marker({
        position: polytechPos,
        map: map,
        title: "Polytech Lille"
    });
}