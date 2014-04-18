<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<!-- html goes here -->
<section id="mfadt-hero" class="hero">
	<!-- logo -->
	<img class="hero-logo four columns" src="assets/img/hero/dtlogo-white.png">
	<article class="hero-information six columns">
		<p>Join us for an exhibition featuring the graduating class of 2014 on May 19-22 at 6 East 16th Street.</p>
	</article>
</section>
<div class="sixteen columns below-hero">
	<div class="six columns below-hero-content">
		<h6 class="noBottom">Map</h6>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
		<div id="gmap_canvas" style="margin-top: -10px; height:150px; width:100%;"></div>
		<a href="http://www.map-embed.com" class="map-data">www.map-embed.com</a>
		<link rel="stylesheet" type="text/css" href="http://www.map-embed.com/maps.css">
		<script type="text/javascript">
			function init_map(){ 
				var myOptions=  { zoom:12, disableDefaultUI:true, center: new google.maps.LatLng (40.7370468,-73.99220600000001), 
					mapTypeId: google.maps.MapTypeId.ROADMAP}; 
					map = new google.maps.Map (document.getElementById("gmap_canvas"), myOptions); 
					marker = new google.maps.Marker({map: map, position: new google.maps.LatLng (40.7370468,-73.99220600000001)}); 
					infowindow = new google.maps.InfoWindow ({content:"<span><strong>Parsons MFADT Thesis Exhibition 2014</strong><br>6 East 16th St.<br>10003 New York</span>" }); 
					google.maps.event.addListener (marker, "click", function(){ 
						infowindow.open(map,marker);
					}); 
					// infowindow.open(map,marker);
					} 
					google.maps.event.addDomListener (window, "load", init_map);
		</script>
	</div>
	<div class="three columns below-hero-content">
		<h6>Exhibition</h6>
		<p>
			May 17 - 25, 2014<br>
			Open daily 10am - 8pm<br>
			–<br>
			6 East 16th Street<br>
			12th Floor<br>
			New York City
		</p>
	</div>
	<div class="three columns below-hero-content">
		<h6>Midweek Reception</h6>
		<p>
			12th Floor<br>
			Wednesday, May 21st, 6pm - 8pm<br>
		</p>
	</div>
	<div class="three columns below-hero-content">
		<h6>Symposium</h6>
		<p>
			Wollman Hall, Eugene Lang College<br>
			65 West 11th Street Room B500, New York, NY 10003
		</p>
	</div>
</div>
</div>
<div class="container">
	<h2>Projects</h2>
<?php get_footer(); ?>