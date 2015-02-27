<div class="jumbotron">
  <h1>Contact</h1>
  <p>Pour toute information, vous pouvez contacter Mme Pichonnat</p>
</div>
&nbsp;
<div class="jumbotron">
	<h1>Comment y accéder ?</h1>
	<p>
		<div id="map-canvas"></div>
	</p>
</div>
<script>
	function initialize()
	{
		var mapCanvas = document.getElementById('map-canvas');
		var mapOptions =
		{
			center: new google.maps.LatLng(50.6080275, 3.1401501),
			zoom: 8,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
        var map = new google.maps.Map(mapCanvas, mapOptions)
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
