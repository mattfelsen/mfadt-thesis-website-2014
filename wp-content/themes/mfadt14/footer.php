<?php

$args = array ('post_type' => 'faculty', 'posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC');
$query = new WP_Query( $args );

?>

<div class="clear"></div>

<div id="footer-background">

	<footer class="container" role="contentinfo">
		<!-- <h3 class="sixteen columns">ACKNOWLEDGEMENTS</h3> -->

		<div class="three columns">
			<h6>Faculty</h6>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br>
			<?php endwhile; ?>
		</div>

		<div class="three columns">
			<h6>Thesis Show Committees</h6>

			<h5>Co-Chairs</h5>
			<a href="student/salome-asega">Salome Asega</a><br>
			<a href="student/justin-charles">Justin Charles</a><br>
			<br>

			<h5>Curation/Symposium</h5>
			<a href="student/clarisa-diaz">Clarisa Diaz</a><br>
			<a href="student/susse-sonderby-jensen">Susse Sønderby Jensen</a><br>
			<a href="student/albert-kim">Albert Kim</a><br>
			<a href="student/joseph-moore">Joe Moore</a><br>
			<a href="student/jennifer-presto">Jennifer Presto</a><br>
			<a href="student/bernardo-schorr">Bernardo Santos Schorr</a><br>
			<a href="student/sarah-wever">Sarah Wever</a><br>
			
			<br>
		</div>

		<div class="three columns">
			<h6>&nbsp;</h6>
			<h5>Design</h5>

			<a href="student/francesca-maria-castelli">Francesca Castelli</a><br>
			<a href="student/gustavo-faria">Gustavo Faria</a><br>
			<a href="student/yi-ning-huang">Yi-Ning Huang</a><br>
			<a href="student/decho-pitukcharoen">Decho Pitukcharoen</a><br>
			<a href="student/jorge-proano">Jorge Proano</a><br>
			<a href="student/mennie-hsiu-ying-shen">Mennie Shen</a><br>
			<a href="student/napangsiri-wanpen">Napangsiri Wanpen</a><br>
			
			<br>
			<h5>Peer Reviews</h5>
			<a href="http://www.fabiolaeinhorn.com/" target="_blank">Fabiola Einhorn</a><br>
			<a href="student/susse-sonderby-jensen">Susse Sønderby Jensen</a><br>
			Namreta Kumar<br>
			<a href="http://yuchenzhang.com/" target="_blank">Yuchen Zhang</a><br>

			<br>
		</div>

		<div class="three columns">
			<h6>&nbsp;</h6>
			<h5>Installation</h5>

			<a href="student/mirte-becker">Mirte Becker</a><br>
			<a href="student/adiel-fernandez">Adiel Fernandez</a><br>
			Julie Huynh<br>
			<a href="student/jomkwan-narkvichetr">Chy Narkvichetr</a><br>
			<a href="student/mauricio-sanchez-duque">Mauricio Sanchez</a><br>
			<a href="student/mehdi-salehi">Mehdi Supertramp</a><br>
			<a href="student/anantapa-thongtawach">Amp Thongtawach</a><br>
			<a href="student/nori-yuki">Norihito Yuki</a><br>
			<br>
			<h5>Design/Web Liaison</h5>

			<a href="student/owen-herterich">Owen Herterich</a><br>
			<br>
		</div>

		<div class="two columns">
			<h6>&nbsp;</h6>
			<h5>Venue</h5>
			<a href="student/salome-asega">Salome Asega</a><br>
			<a href="student/justin-charles">Justin Charles</a><br>
			<a href="student/bobby-fata">Bobby Fata</a><br>
			<a href="student/matt-felsen">Matt Felsen</a><br>
			<a href="student/or-leviteh">Or Leviteh</a><br>
			<br>

			<h5>Marketing</h5>
			<a href="student/agustina-jacobi">Agustina Jacobi</a><br>
			<a href="student/kristen-kersh">Kristen Kersh</a><br>
			<a href="student/huy-nguyen">Huy Nguyen</a><br>
			<a href="student/jorge-proano">Jorge Proano</a><br>
			<a href="student/alex-samuel">Alex Samuel</a><br>
			<br>
			
		</div>
		<div class="two columns">
			<h6>&nbsp;</h6>
			<h5>Web</h5>

			<a href="student/quincy-bock">Quincy Bock</a><br>
			<a href="student/matt-felsen">Matt Felsen</a><br>
			<a href="student/kamilla-kielbowska">Kamilla Kielbowska</a><br>
			<a href="student/fei-liu">Fei Liu</a><br>
			<a href="student/apon-palanuwech">Apon Palanuwech</a><br>
			<br>

			<h5>Event Production</h5>
			<a href="student/veronica-black">Veronica Black</a><br>
			<a href="student/aneta-genova">Aneta Genova</a><br>
			Namreta Kumar<br>
			<a href="student/jason-lalor">Jason Lalor</a><br>
			<br>
		</div>
		<div class="clear"></div>
	</footer>

</div>
</div>
<?php wp_footer(); ?>

<!-- load scripts -->
<script src="assets/js/fss.min.js"></script>
<script src="assets/js/mfadt-shader.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/profilePage.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50437222-1', 'parsons.edu');
  ga('send', 'pageview');
</script>

</body>

</html>
