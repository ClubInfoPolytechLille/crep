function pageSpecific(location) {
    if (location.indexOf('contact') >= 0) {
        initializeMap()
    }
}

function actLink(ev) {
    var location = ev.currentTarget.href
    if (location.indexOf(window.location.host) >= 0) {
        loadDoc(location, function () {
            history.pushState({
                loc: location
            }, document.title, location)
        })
        return false
    }
}

function dynamiseLinks(el) {
    $("a", el).click(actLink)
}

function loadDoc(location, callback)) {
    if (!callback) {
        callaback = function () {
            return undefined
        }
    }
    $.get(location + '?c', function (data) {
        mainContainer = $("#mainContainer")
        mainContainer.html(data)
        document.title = location
        dynamiseLinks(mainContainer)
        pageSpecific(location)
        callback()
    })

}

function historyChange(ev) {
    loadDoc(ev.state.loc)
}

$(document).ready(function () {
    dynamiseLinks(document)
    pageSpecific(window.location.href)
    window.onpopstate = historyChange
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