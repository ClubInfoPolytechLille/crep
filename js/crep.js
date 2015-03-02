function loadDoc(ev) {
    var location = ev.currentTarget.href
    if (location.indexOf(window.location.host) >= 0) {
        $.get(location + '?c', function (data) {
            mainContainer = $("#mainContainer")
            mainContainer.html(data)
            dynamiseLinks(mainContainer)
        })
        return false
    }
}

function dynamiseLinks(el) {
    $("a", el).click(loadDoc)
}

$(document).ready(function () {
    dynamiseLinks(document)
})