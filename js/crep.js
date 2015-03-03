function removeAfter(string, pattern) {
    var n = string.indexOf(pattern);
    return string.substring(0, n != -1 ? n : string.length);
}

function pageName(href) {
    console.debug(href)
    if (href.indexOf(window.location.host) >= 0) {
        href = removeAfter(removeAfter(href, '?'), '#')
        console.debug(href)
        hrefE = href.split('/')
        console.debug(hrefE)
        return hrefE[hrefE.length - 1]
    }
    return false
}

function pageSpecific(location) {
    if (pageName(location) == 'contact') {
        initializeMap()
    }
}

function actLink(ev) {
    var location = ev.currentTarget.href
    var page = pageName(location)
    if (page && page != pageName(window.location.href)) {
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

function loadDoc(location, callback) {
    if (!callback) {
        callaback = function () {
            return undefined
        }
    }
    $.get(location + '?c', function (data) {
        mainContainer = $("#mainContainer")
        mainContainer.html(data)
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