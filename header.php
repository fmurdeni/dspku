<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diamondstar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dspku' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-wrapper">
			<nav class="mobile-menu">
				<div id="menuToggle">    
				    <input type="checkbox" />  
				    <span></span>
				    <span></span>
				    <span></span> 
				    <?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'menu',
							'container'	=> 'ul',
							//'container_id' =>'menu'
						) );
				?>
				</div>
			</nav>
			
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation">				

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
				

				<ul class="contact-menu">
					<li>
						<a href="https://wa.me/6285271870950?text=Hallo%20sist,%20Saya%20mau%20konsultasi%20tentang%20DS%20Serum%20nya%20dong?" class="button"><i class="fa fa-whatsapp"></i><span><?php echo __('WhatsApp','pku') ?></span></a>
					</li>
				</ul>
				
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
