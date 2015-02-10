function file(fichier) {
    if (window.XMLHttpRequest)
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject)
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    else
        return (false);
    xhr_object.open("GET", fichier, false);
    xhr_object.send(null);
    if (xhr_object.readyState == 4)
        return (xhr_object.responseText);
    else
        return (false);
}

function loadNewDoc(doc) {
    $("#mainContainer").html(file(doc));
    return false
}

function addNews()
{
	var elem = "<div class=\"panel panel-default\"><div class=\"panel-heading\"><h3 class=\"panel-title\"><input type=text class=\"form-control\" placeholder=\"Nouvel article\"/></h3></div><div class=\"panel-body\"><textarea class=\"form-control\"></textarea></div><div class=\"panel-footer\"><p>En cours d'édition</p></div></div>";
	$("#mainContainer").append(elem);
}

$().ready(function() {
    // Navigue vers la page indiquée dans l'URL en cas de refresh
    if (window.location.hash) {
        $('ul.nav a').each(function() {
            if ($(this).attr('href') == window.location.hash) {
                loadNewDoc($(this).attr('onclick').replace(/loadNewDoc\(\'(.+)\'\);?/, '$1'))
            }
        })
    }
})
