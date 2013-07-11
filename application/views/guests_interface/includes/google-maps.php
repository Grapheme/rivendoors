<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtgj1kQZnFLNOQaOkX1fB6Tu_ZeZXzGNI&sensor=false"></script>
<script type="text/javascript">
	function initialize() {
		var mapOptions = {
			zoom : 15,
			scrollwheel : false,
			center : new google.maps.LatLng(47.210275, 39.656423),
			mapTypeId : google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		var image = 'img/interface/map_button.png';
		var myLatLng = new google.maps.LatLng(47.210275, 39.656423);
		var beachMarker = new google.maps.Marker({
			position : myLatLng,
			map : map,
			icon : image
		});
	}
	initialize();
</script>