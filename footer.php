<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">



		<div class="row">

			<div class="col-md-12">
				<div class="row">
					<div class="col"><?php dynamic_sidebar( 'left-footer' ); ?></div>
					<div class="col"><?php dynamic_sidebar( 'center-footer' ); ?></div>
					<div class="col">
						<footer class="site-footer" id="colophon">
						<div class="site-info">
						<?php dynamic_sidebar( 'right-footer' ); ?>
						</div>
					</div>
				</div><!-- .site-info -->
				<hr>
				<div class="row">
					<span class="footerstuff">
					Follow  <a href="https://www.instagram.com/ceremonyclay/" target="_blank">CERemony</a> on our irreverant journey. If you require more daily snark in your life, we recommend our <a href="https://www.instagram.com/ceremonyclay/" target="_blank">instagram feed</a> (if by recommend we mean, you *definitely* should not). We promise endless obscenities, repetitive photos of our dog, and news commentary unlikely to influence you to purchase ceramics. <br>We are also on <a href=https://www.facebook.com/ceremonyclay/" target="_blank">Facebook</a>. We don't love it.</span></div>
					<div class="row">
						<?php juicer_feed("name=ceremonyclay"); ?>
					</div>
				<div class="row">
					<span class="footerstuff">
					 
					<br></span></div>
				</div>
				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->



</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

