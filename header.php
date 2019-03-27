<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">
<div class="wrapper-fluid brandingbar" id="wrapper-navbar">
						<!-- Your site title as branding in the menu -->
 <div class="row">
    <div class="col">
						 	<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
						 </div>
						  <div class="col">
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<span class="desc"><a href="/about"><?php bloginfo( 'description' ); ?></a></span>
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							<?php bloginfo( 'description' ); ?>
						
						<?php endif; ?>
						
					<span class="desc">
					<?php } else {
						the_custom_logo();
					} ?><br>
					<a href="/about"><?php bloginfo( 'description' ); ?></a></span><!-- end custom logo -->
						</div>
						 <div class="col">
						 					<?php wp_nav_menu(
					array(
						'theme_location'  => 'acct_nav',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav ml-auto',
						'container_id'    => 'navbarNavDropdown',	
						'menu_id'         => 'main-menu',			
						'fallback_cb'     => '',
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
						 </div>
						 </div>
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">



				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'mainnav navbar-nav ml-auto ',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>


		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
