<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<!-- html goes here -->

<!-- HERO -->
<section id="mfadt-hero">
	<div class="in-between"></div>
	<div class="container">
		<div class="sixteen columns mfadt-box-hero">
			<img class="eleven columns img-hero" src>
			<div class="mfadt-box-hero-shadow"></div>
			<div class="five columns hero-detail">
				<h2>
				PARSONS MFADT THESIS SHOW 2014
				</h2>

				<h4>
					Join us this May for a week-long exhibition of 70+ projects by emerging artists, designers, coders, makers, hackers, educators, and thinkers.
				</h4>
				<br>
				<h4>
					See exhibition detail below
				</h4>

			</div>
		</div>
	</div>
</section>

<!-- END OF HERO -->
<div class="below-hero">
<!-- ABOUT PROGRAM & INFO -->
<section id="mfadt-info-container">
<div id="mfadt-info" class="container">
	<h3 class="sixteen columns text">
		The MFA DT program at Parsons examines and extends the intersection of design and technology for practical, playful, theoretical, and artistic impact. Students deepen their practice and theory of design as they critique, leverage, or develop emerging technologies for creative change.
	</h3>
	<div class="six columns below-hero-content">
	<h6 class="noBottom">Map</h6>
	<!-- embed google map -->
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
	<div class="four columns below-hero-content">
		<h6>Symposium</h6>
		<p>
			Fri. May 16 from 2-8pm<br>
            Sat. May 17 from 12-7pm<br>
            Theresa Lang Student &amp; <br>Community Center<br>
            55 West 13th Street, New York City
		</p>
	</div>
	<div class="three columns below-hero-content">
		<h6>Exhibition</h6>
		<p>
			May 17 - 25, 2014<br>
            Open daily 10am - 8pm<br>
            6 East 16th Street, 12th Floor<br>
            New York City
		</p>
	</div>
	<div class="three columns below-hero-content">
		<h6>Reception</h6>
		<p>
			Wed. May 21, 6-8pm<br>
            6 East 16th Street, 12th Floor<br>
            New York City
		</p>
	</div>
</div>
</section>
<section class="categories-container sixteen columns">
	<h3>Projects</h3>
	<div class="categories-list">

		<?php wp_list_categories('exclude=1&title_li='); ?>
	</div>
</section>
<section id="projects" class="container">
	

	<?php
	$args = array ('post_type' => 'project', 'posts_per_page' => '-1', 'orderby' => 'rand');
	$query = new WP_Query( $args );

	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

		// Set up student/s name
		$students_list = array();
		$students = types_child_posts('student');
		foreach ($students as $student) { $students_list[] = $student->post_title; }
		$students = join(" + ", $students_list);

		// Set up category name
		$category = get_the_category();
		$category = $category[0]->cat_name;

		// Set up tags
		$a = array();
		$tags = get_the_tags();
		foreach($tags as $t) {
			$a[] = $t->name;
		}
		$tags = join(', ', $a);

	?>

	<div class="masonry columns">
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<h5><?= $students ?></h5>

		<a href="<?php the_permalink() ?>"><? if (has_post_thumbnail()) : ?>
		<img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); print $src[0]; ?>">
		<? else: ?>
		<img class="projectThumb" src="assets/img/no-thumbnail-<? $r=rand(0,3);if($r>2)$o='sm';elseif($r>1)$o='md';else $o='lg'; print $o; ?>.jpg">
		<?php endif; ?></a>
	</div>

	<?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
