<div class="jumbotron">
  <h1>Contact</h1>
  <p>Pour toute information, vous pouvez contacter Mme Pichonnat</p>
</div>
&nbsp;
&nbsp;
<div id="map-canvas">
    <img src="img/polyMap.png"/>
</div>
<script>
	function initialize()
	{
		var mapCanvas = document.getElementById('map-canvas');
        mapCanvas.innerHTML = ''
        var polytechPos = new google.maps.LatLng(50.6074998, 3.1373338);
		var mapOptions =
		{
			center: polytechPos,
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
        var map = new google.maps.Map(mapCanvas, mapOptions)
        var marker = new google.maps.Marker({
            position: polytechPos,
            map: map,
            title:"Polytech Lille"
        });
	}
    initialize()
</script>
