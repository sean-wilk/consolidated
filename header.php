<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Go
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if (function_exists('ot_get_option')){
			$ot_favicon 								= ot_get_option('go_favicon');
			$display_socials_in_header 	= ot_get_option('display_socials_in_header');
			$linkedin_link    					= ot_get_option('linkedin_link');
			$youtube_link    						= ot_get_option('youtube_link');
			$linkedin_link    					= ot_get_option('linkedin_link');
			$facebook_link    					= ot_get_option('facebook_link');
			$css_content    						= ot_get_option('css_content');
	}

	if(!empty($ot_favicon)) {
	?>
	<link rel="icon" href="<?php _e($ot_favicon) ?>" type="image/gif" sizes="16x16">
	<?php } ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/1901518de9.js" crossorigin="anonymous"></script>
	<?php
  	if(!empty($css_content)) {
	?>
  <style>
    <?php _e($css_content) ?>
  </style>
  <?php } ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site push">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'go' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="primary-navigation">
			<div class="navigation-container container">
				<div class="site-branding">
					<?php
					if (function_exists('ot_get_option')){
							$ot_logo = ot_get_option('go_logo');
					}

					if(!empty($ot_logo)) {
					?>
							<div class="logo-container">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="go-logo"><img src='<?php _e($ot_logo) ?>' alt="Go Logo"></a>
							</div>
					<?php
					} elseif (has_custom_logo()){
						the_custom_logo();
					} elseif ( is_front_page() && is_home() ) {
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					} else {
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					}
					?>
				</div><!-- .site-branding -->
				<div class="site-menu">
					<div class="desktop-menu main-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'desktop-menu',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div>
					<div class="mobile-menu main-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'mobile-menu',
							'menu_id'        => 'mobile-menu',
						) );
						?>
					</div>
				</div>
				<div class="mobile-menu-right">
					<button class="hamburger hamburger--emphatic" type="button">
					  <span class="hamburger-box">
					    <span class="hamburger-inner"></span>
					  </span>
					</button>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
