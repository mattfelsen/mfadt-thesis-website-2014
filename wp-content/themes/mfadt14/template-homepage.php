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
    		<!-- <img class="eleven columns img-hero" src="assets/img/hero/hero-1.png"> -->
			<img class="eleven columns img-hero" src="assets/img/hero/hero-<?= rand(1,5);  ?>.png">
			<!-- <img class="eleven columns img-hero" src="assets/img/hero/dt-box-hero-no-shadow.png"> -->
			
			<div class="mfadt-box-hero-shadow"></div>
			<div class="five columns hero-detail">
				<h2>
				PARSONS MFADT THESIS SHOW 2014
				</h2>
				<h4>Join us this May for a week-long exhibition of 70+ world-changing projects by emerging artists, designers, coders, makers, hackers, educators, and thinkers.</h4>
                <div class="dates-n-things">
                    <div>
                        <h6>Symposium</h6>
                		<p>
                			Wollman Hall, Eugene Lang College<br>
                			65 West 11th Street Room B500, New York, NY 10003
                		</p>
                    </div>
    				<div>
    				    <h6>Exhibition</h6>
                		<p>
                			May 17 - 25, 2014<br>
                			Open daily 10am - 8pm<br>
                			6 East 16th Street, 12th Floor<br>
                			New York City
                		</p>
                    </div>
                    <div>
                        <h6>Opening Reception</h6>
                		<p>
                			12th Floor<br>
                			Wednesday, May 21st, 6pm - 8pm<br>
                		</p>
                    </div>
                    
                </div>	
			</div>
		</div>
	</div>
</section>
