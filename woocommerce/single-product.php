<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) { 
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action('woocommerce_single_product_summary','woocommerce_single_button',30,2);

function woocommerce_single_button(){
	echo '<a href="#order" class="button button-order">'.__('Pesan Produk ini','dspku').'</a>';
	echo '<a href="https://wa.me/6285271870950?text=Hallo%20sist,%20Saya%20mau%20memesan%20'.get_the_title() .'%20DS%20sekarang%20ya,%20mohon bantuannya.." class="button button-wa">'.__('Hubungi via WA','dspku').'</a>';
}

add_action('woocommerce_after_single_product_summary','woocommerce_single_contact_order', 11);
function woocommerce_single_contact_order(){ ?>
	<div id="order" class="section single-oder-form">
		<div class="order-form-wrapper">
			<div class="title-h2">
				<h2><?php echo __('Order disini') ?></h2>
				<p>Silakan isi data dan jumlah pesanan anda pada form berikut. Kami akan segera menghubungi anda untuk melanjutkan proses pembayaran dan pengiriman melalui whatsapp.</p>
			</div>
				
			<?php echo do_shortcode('[contact-form-7 id="251" title="Single oder"]') ?>
		</div>
	</div>
	<script type="text/javascript">
		var product_name = "<?php echo get_the_title(get_the_ID())?>";
		$('#order input[name="produk"]').val(product_name);
		$('#order input[name="jumlah"]').val(1);
	</script>
<?php }
?>


	<?php

		echo do_shortcode('[vc_row full_width="stretch_row" content_placement="middle" el_class="banner banner-page banner-shop"][vc_column][vc_row_inner][vc_column_inner][vc_column_text el_class="page-title"] '.get_the_title() .'  [/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]');
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
