<?php

$args = array ('post_type' => 'faculty', 'posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC');
$query = new WP_Query( $args );

?>

<div class="clear"></div>

<div id="footer-background">

	<footer class="container" role="contentinfo">
		<h3 class="sixteen columns">ACKNOWLEDGEMENTS</h3>

		<div class="four columns">
			<h6>Faculty</h6>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br>
			<?php endwhile; ?>
		</div>

		<div class="three columns">
			<h6>Thesis Show Committees</h6>

			<h5>Co-Chairs</h5>
			<a href="project/title">Salome Asega</a><br>
			<a href="project/title">Justin Charles</a><br>
			<br>

			<h5>Curation/Symposium</h5>
			<a href="project/title">Albert Kim</a><br>
			<a href="project/title">Bernardo Santos Schorr</a><br>
			<a href="project/title">Clarisa Diaz<br>
			<a href="project/title">Jennifer Presto</a><br>
			<a href="project/title">Joe Moore</a><br>
			<a href="project/title">Sarah Wever</a><br>
			<a href="project/title">Susse Sønderby Jensen</a><br>
			<br>

			<h5>Design</h5>
			<a href="project/title">Decho Pitukcharoen</a><br>
			<a href="project/title">Francesca Castelli<a><br>
			<a href="project/title">Gustavo Faria</a><br>
			<a href="project/title">Mennie Shen</a><br>
			<a href="project/title">Napangsiri Wanpen</a><br>
			<a href="project/title">Yi-Ning Huang</a><br>
			<br>

			<h5>Design/Web Liaison</h5>
			<a href="project/title">Owen Herterich</a><br>
			<br>

		</div>

		<div class="three columns">
			<h6>&nbsp;</h6>

			<h5>Event Production</h5>
			<a href="project/title">Aneta Genova</a><br>
			<a href="project/title">Jason Lalor</a><br>
			<a href="project/title">Namreta Kumar</a><br>
			<a href="project/title">Veronica Black</a><br>
			<br>

			<h5>Marketing</h5>
			<a href="project/title">Agustina Jacobi</a><br>
			<a href="project/title">Alex Samuel</a><br>
			<a href="project/title">Huy Nguyen</a><br>
			<a href="project/title">Jorge Proano</a><br>
			<a href="project/title">Kristen Kersh</a><br>
			<br>

			<h5>Installation</h5>
			<a href="project/title">Adiel Fernandez</a><br>
			<a href="project/title">Amp Thongtawach</a><br>
			<a href="project/title">Chy Narkvichetr</a><br>
			<a href="project/title">Julie Huynh</a><br>
			<a href="project/title">Mauricio Sanchez</a><br>
			<a href="project/title">Mehdi Supertramp</a><br>
			<a href="project/title">Mirte Becker</a><br>
			<a href="project/title">Norihito Yuki</a><br>
			<br>

		</div>

		<div class="three columns">
			<h6>&nbsp;</h6>

			<h5>Peer Reviews</h5>
			<a href="project/title">Namreta Kumar</a><br>
			<a href="project/title">Salome Asega</a><br>
			<a href="project/title">Susse Sønderby Jensen</a><br>
			<br>

			<h5>Venue</h5>
			<a href="project/title">Bobby Fata</a><br>
			<a href="project/title">Justin Charles</a><br>
			<a href="project/title">Matt Felsen</a><br>
			<a href="project/title">Or Leviteh</a><br>
			<a href="project/title">Salome Asega</a><br>
			<br>

			<h5>Web</h5>
			<a href="project/title">Apon Palanuwech</a><br>
			<a href="project/title">Fei Liu</a><br>
			<a href="project/title">Kamilla Kielbowska</a><br>
			<a href="project/title">Matt Felsen</a><br>
			<a href="project/title">Quincy Bock</a><br>
			<br>
		</div>
		<div class="three columns">
			<h6>Thanks</h6>
		</div>
		<div class="clear"></div>
	</footer>

</div>
</div>
<?php wp_footer(); ?>

<!-- load scripts -->
<script src="assets/js/d3.min.js"></script>
<script src="assets/js/underscore.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>

</body>

</html>
