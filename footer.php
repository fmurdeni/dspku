<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diamondstar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-row clear">
			<div class="footer-content">
			<?php if (function_exists('get_footer_layout'))get_footer_layout() ; ?>
			</div>
			 
		</div>		
		<div class="copyright">Copyright © <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.  Semua hak dilindungi Undang undang </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
