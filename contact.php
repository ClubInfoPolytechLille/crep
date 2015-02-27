<div class="jumbotron">
  <h1>Contact</h1>
  <p>Pour toute information, vous pouvez contacter Mme Pichonnat</p>
</div>
&nbsp;
<div id="map-canvas"></div>
<script>
	function initialize()
	{
		var mapCanvas = document.getElementById('map-canvas');
		var mapOptions =
		{
			center: new google.maps.LatLng(50.6074998, 3.1373338),
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
        var map = new google.maps.Map(mapCanvas, mapOptions)
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
