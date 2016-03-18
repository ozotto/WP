<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package laTomate
 */

?>

	</div><!-- #content -->
</div>


	<footer class="footer-distributed">
		<div class="container">
			<div class="footer-left">

				<?php
				if(is_active_sidebar('footer-left')) :
					dynamic_sidebar('footer-left');
				endif;
				?>

			</div>

			<div class="footer-center">
				<?php
				if(is_active_sidebar('footer-center')) :
					dynamic_sidebar('footer-center');
				else :
				?>

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Route de Lentigny 17</span> Corserey, Suisse</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+41 840 0000 17</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:info@croa.ch">info@croa.ch</a></p>
				</div>
				<?php endif; ?>
			</div>

			<div class="footer-right">

				<?php
				if(is_active_sidebar('footer-right')) :
					dynamic_sidebar('footer-right');
				else :
				?>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>

				</div>
				<?php
				endif;
				?>

			</div>
		</div>
	</footer>

	<footer class="footer-basic-centered">
		<div class="container">
			<p class="footer-company-name">
				Copyright <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &copy; <?php echo date("Y"); ?> | Soported by <strong>CROA</strong>
			</p>
		</div>
	</footer>


<?php wp_footer(); ?>

</body>
</html>
