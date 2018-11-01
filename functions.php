<?php
/**
 * diamondstar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package diamondstar
 */

if ( ! function_exists( 'dspku_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dspku_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on diamondstar, use a find and replace
		 * to change 'dspku' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dspku', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'dspku' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'dspku_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'dspku_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dspku_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dspku_content_width', 640 );
}
add_action( 'after_setup_theme', 'dspku_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dspku_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dspku' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dspku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dspku_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dspku_scripts() {
	wp_enqueue_style('font-awesome','https://use.fontawesome.com/releases/v5.4.1/css/all.css');
	wp_enqueue_style('bootstrap','//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style( 'dirumah-style', get_stylesheet_uri() );
	wp_enqueue_script( 'dirumah-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('propper-js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', true);
	wp_enqueue_script('bootstrap','//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', true);
	wp_enqueue_script( 'dirumah-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dspku_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/*upgrade jquery*/
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.1.min.js", array(), '3.0.1' );
}

function get_footer_layout() {
		global $post;
		$page_title = 'footer';
		$post_type = 'layout';
		
			$get = new WP_Query(
		        array(
		            'name' => $page_title,
		            'post_type' => $post_type
		        )
		    );
		    $get->the_post();
		    $post_id = get_the_ID();		
			wp_reset_query();		
		
		

		$args = array(
				'post_type' => $post_type,
				'post_status' => 'publish',
				'post__in' => array($post_id)            
		);


		$query = new WP_Query( $args );
		if( $query->have_posts() ){
			$query->the_post();
			return the_content();       
		}
		wp_reset_query();
}      

add_shortcode('breadcrumbs','breadcrumbs');
function breadcrumbs(){
	echo "<div class='site-breadcrumbs'>";
		bcn_display();
	echo "</div>";
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
add_action('woocommerce_after_shop_loop_item',function(){
	echo '<a href="'.get_the_permalink().'" class="button button-detail">'.__('Lihat detail','dspku').'</a>';
});

add_action('woocommerce_after_shop_loop_item_title', function(){
	echo '<p>'.get_the_excerpt().'</p>';
});

// Add Shortcode
function testimoni_slider( $atts ) {
	wp_enqueue_style('owl-carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel/assets/owl.carousel.min.css');
	wp_enqueue_style('owl-carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel/assets/owl.theme.default.min.css');
	wp_enqueue_script('owl-carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel/owl.carousel.min.js');
	extract( shortcode_atts(
               array(
                       'id' => '',                                          
               ),
               $atts
       ));
	
	$items = get_field('testimoni_galeri', $id);
	if( $items ): ?>
		<div class="owl-carousel owl-theme">
        <?php foreach( $items as $item ): ?>
			<div class="item"><?php echo wp_get_attachment_image( $item['ID'], 'full' ); ?></div>
        <?php endforeach; ?>
   
		</div>
<style type="text/css">

.owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
}	
.owl-carousel .owl-nav button span {
    font-size: 70px;
    color: #000;
    line-height: 0;
}
.owl-carousel .owl-nav button.owl-next span {
    margin-right: -50px;
}
.owl-carousel .owl-nav button.owl-prev span {
    margin-left: -50px;
}

.owl-carousel:hover .owl-nav button span {
    margin: 0;
}

.owl-carousel {
    overflow: hidden;
}


</style>
<script type="text/javascript">
	jQuery(document).ready(function(){
		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		            items:4,
		            nav:true,
		            loop:true
		        }
		    }
		})
	})
</script>
<?php endif; 

}
add_shortcode( 'testimoni-slider', 'testimoni_slider' );


add_shortcode('artikel-archive','artikel_archive');
function artikel_archive($atts) {
	extract( shortcode_atts(
               array(
                       'count' => '',                                          
               ),
               $atts
   	));		

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'post_type' => 'post' ,
		'posts_per_page' => $post_count,
		'post_status' => 'publish',
		'paged' => $paged,
        'ignore_sticky_posts' => true,
        'order' => 'DESC', // 'ASC'
        'orderby' => 'date' // modified | title | name | ID | rand
	 );

	$query = new WP_Query($args);
	?> 
	<div class="article-container">
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<div class="article-item">
				<div class="thumb-img">
					 <a href="<?php echo get_permalink(); ?>">  
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } else { 
                           echo '<img src="'. get_template_directory_uri().'/assets/images/placeholder.png"/>';} ?>                               
                    </a>
				</div>
				<div class="article-content">
					<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
						the_excerpt();
					 ?>
					  <a href="<?php echo get_permalink(); ?>" class="read-more" ><?php echo __('Baca lebih lanjut','pku');?></a>

				</div>
			</div>
		<?php endwhile; endif; ?>
		
	</div>
		
<?php 
}