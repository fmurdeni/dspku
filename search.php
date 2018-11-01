<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package diamondstar
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php echo do_shortcode('[vc_row full_width="stretch_row_content" content_placement="middle" el_class="banner banner-page banner-search"][vc_column][vc_row_inner content_placement="middle" el_class="banner-inner ui container"][vc_column_inner][vc_column_text el_class="page-title"]
			<h1>'. __( "Search Results for: ", "dspku" ).' <span>' . get_search_query() . '</span></h1>
			[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]'); ?>
		<?php if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
