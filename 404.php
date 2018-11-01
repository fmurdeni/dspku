<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package diamondstar
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php echo do_shortcode('[vc_row full_width="stretch_row_content" content_placement="middle" el_class="banner banner-page banner-404"][vc_column][vc_row_inner content_placement="middle" el_class="banner-inner ui container"][vc_column_inner][vc_column_text el_class="page-title"]
			<h1>'.__('404','pku').'</h1>
			[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]'); ?>

			<section class="error-404 not-found section">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Maaf, halaman yang anda minta, tidak dapat ditemukan.', 'pku' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Sepertinya sudah tidak ada. jika anda membutuhkan bantuan, silakan', 'pku' ); ?> <a href="/kontak-kami/"><?php echo __('kontak kami.', 'pku') ?></a></p>					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			<?php wp_reset_query(); wp_reset_postdata();
	 			/*# saya menggunakan visual composer untuk merender bannernya
				# silakan pergi ke dashboard > layout dan edit "single-footer".*/
				$get = new WP_Query(array('name' => 'footer-single', 'post_type' => 'layout') );		
				if( $get->have_posts() ){$get->the_post(); 
					the_content();
				}
				wp_reset_query(); 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
