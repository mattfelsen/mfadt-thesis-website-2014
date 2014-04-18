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
	<br>
	<h3>Lorem ipsum Consequat voluptate sunt proident eiusmod proident elit nostrud magna ad laborum nulla sunt consectetur occaecat laborum nulla ad ut.</h3>
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
	<h3>PROJECTS</h3>
		Lorem ipsum Aliqua in ex mollit aliquip irure quis officia qui enim exercitation culpa Ut dolore Duis in eiusmod esse irure id est commodo eu anim in qui consequat nisi consequat aute sit sunt nostrud eu enim irure tempor amet sunt dolore consequat incididunt aute esse exercitation in consequat dolor magna consequat ad dolore officia fugiat enim nulla in adipisicing ad eu fugiat ut adipisicing nisi consectetur do minim eiusmod incididunt eiusmod qui cupidatat aliqua ullamco veniam ut ex exercitation mollit non anim exercitation voluptate exercitation nostrud in sit ex occaecat ad consectetur in exercitation non pariatur amet ut deserunt laborum tempor ad aliqua commodo aliqua tempor dolor esse cillum fugiat veniam officia incididunt qui consectetur non ex in culpa aute minim eu Excepteur est exercitation exercitation tempor incididunt elit ut ex ut est eiusmod id elit est laborum sunt deserunt labore deserunt et proident do ut minim do reprehenderit ut in ut ut dolor qui enim ea dolore labore deserunt aliqua eiusmod adipisicing Ut dolor quis amet Duis Duis sunt laboris sit dolor irure dolore mollit dolor magna ex nulla ut sunt sunt nulla Excepteur mollit ullamco nostrud culpa qui anim Ut eu veniam non est aliqua commodo elit exercitation in quis incididunt ut sint officia ut in ex exercitation sint nostrud est anim veniam aliquip nulla amet in aute in et do aliquip sit cillum cillum exercitation quis ut magna officia tempor ut ea proident nisi elit veniam cupidatat est nulla ullamco laboris Excepteur nostrud non reprehenderit qui officia aliqua irure nostrud enim dolore dolore nostrud dolor ullamco nulla occaecat magna dolor.
	Lorem ipsum Elit sed in aliqua laboris nisi in dolor velit in nulla adipisicing qui nulla et cupidatat aliqua enim velit consequat commodo anim ut do id Ut labore amet.

	Lorem ipsum Aliqua in ex mollit aliquip irure quis officia qui enim exercitation culpa Ut dolore Duis in eiusmod esse irure id est commodo eu anim in qui consequat nisi consequat aute sit sunt nostrud eu enim irure tempor amet sunt dolore consequat incididunt aute esse exercitation in consequat dolor magna consequat ad dolore officia fugiat enim nulla in adipisicing ad eu fugiat ut adipisicing nisi consectetur do minim eiusmod incididunt eiusmod qui cupidatat aliqua ullamco veniam ut ex exercitation mollit non anim exercitation voluptate exercitation nostrud in sit ex occaecat ad consectetur in exercitation non pariatur amet ut deserunt laborum tempor ad aliqua commodo aliqua tempor dolor esse cillum fugiat veniam officia incididunt qui consectetur non ex in culpa aute minim eu Excepteur est exercitation exercitation tempor incididunt elit ut ex ut est eiusmod id elit est laborum sunt deserunt labore deserunt et proident do ut minim do reprehenderit ut in ut ut dolor qui enim ea dolore labore deserunt aliqua eiusmod adipisicing Ut dolor quis amet Duis Duis sunt laboris sit dolor irure dolore mollit dolor magna ex nulla ut sunt sunt nulla Excepteur mollit ullamco nostrud culpa qui anim Ut eu veniam non est aliqua commodo elit exercitation in quis incididunt ut sint officia ut in ex exercitation sint nostrud est anim veniam aliquip nulla amet in aute in et do aliquip sit cillum cillum exercitation quis ut magna officia tempor ut ea proident nisi elit veniam cupidatat est nulla ullamco laboris Excepteur nostrud non reprehenderit qui officia aliqua irure nostrud enim dolore dolore nostrud dolor ullamco nulla occaecat magna dolor.
	Lorem ipsum Elit sed in aliqua laboris nisi in dolor velit in nulla adipisicing qui nulla et cupidatat aliqua enim velit consequat commodo anim ut do id Ut labore amet.

	Lorem ipsum Aliqua in ex mollit aliquip irure quis officia qui enim exercitation culpa Ut dolore Duis in eiusmod esse irure id est commodo eu anim in qui consequat nisi consequat aute sit sunt nostrud eu enim irure tempor amet sunt dolore consequat incididunt aute esse exercitation in consequat dolor magna consequat ad dolore officia fugiat enim nulla in adipisicing ad eu fugiat ut adipisicing nisi consectetur do minim eiusmod incididunt eiusmod qui cupidatat aliqua ullamco veniam ut ex exercitation mollit non anim exercitation voluptate exercitation nostrud in sit ex occaecat ad consectetur in exercitation non pariatur amet ut deserunt laborum tempor ad aliqua commodo aliqua tempor dolor esse cillum fugiat veniam officia incididunt qui consectetur non ex in culpa aute minim eu Excepteur est exercitation exercitation tempor incididunt elit ut ex ut est eiusmod id elit est laborum sunt deserunt labore deserunt et proident do ut minim do reprehenderit ut in ut ut dolor qui enim ea dolore labore deserunt aliqua eiusmod adipisicing Ut dolor quis amet Duis Duis sunt laboris sit dolor irure dolore mollit dolor magna ex nulla ut sunt sunt nulla Excepteur mollit ullamco nostrud culpa qui anim Ut eu veniam non est aliqua commodo elit exercitation in quis incididunt ut sint officia ut in ex exercitation sint nostrud est anim veniam aliquip nulla amet in aute in et do aliquip sit cillum cillum exercitation quis ut magna officia tempor ut ea proident nisi elit veniam cupidatat est nulla ullamco laboris Excepteur nostrud non reprehenderit qui officia aliqua irure nostrud enim dolore dolore nostrud dolor ullamco nulla occaecat magna dolor.
	Lorem ipsum Elit sed in aliqua laboris nisi in dolor velit in nulla adipisicing qui nulla et cupidatat aliqua enim velit consequat commodo anim ut do id Ut labore amet.
<?php get_footer(); ?>