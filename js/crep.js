function file(fichier)
{
	if(window.XMLHttpRequest)
		xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject)
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else
		return(false);
	xhr_object.open("GET", fichier, false);
	xhr_object.send(null);
	if(xhr_object.readyState == 4)
		return(xhr_object.responseText);
    else
		return(false);
}

function loadNewDoc(doc)
{
	$("#mainContainer").html(file(doc));
}
