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
                <div class="teaser-title">
				<h2>
				PARSONS MFADT THESIS SHOW 2014
				</h2>
				<h4>Join us this May for a week-long exhibition of 70+ world-changing projects by emerging artists, designers, coders, makers, hackers, educators, and thinkers.</h4>
                </div>
                <div class="dates-n-things">
                    <div class="symposium">
                        <h6>Symposium</h6>
                		<p>
                		    Fri. May 16 from 2-8pm<br>
                			Sat. May 17 from 12-7pm<br>
                			Theresa Lang Student & Community Center<br>
                			55 West 13th Street, New York City
                			
                		</p>
                    </div>
    				<div class="exhibition">
    				    <h6>Exhibition</h6>
                		<p>
                			May 17 - 25, 2014<br>
                			Open daily 10am - 8pm<br>
                			6 East 16th Street, 12th Floor<br>
                			New York City
                		</p>
                    </div>
                    <div class="opening">
                        <h6>Opening Reception</h6>
                		<p>
                		    Wed. May 21, 6-8pm<br>
                			6 East 16th Street, 12th Floor<br>
                			New York City
                			
                		</p>
                    </div>
                    
                </div>	
			</div>
		</div>
	</div>
</section>
