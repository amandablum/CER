<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway:300,500|Vollkorn:400,600i', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/******************************************************************************************************
// Adding breadcrumb nav
/******************************************************************************************************/

function understrap_breadcrumb() {
    if (!is_home()) {
        echo '<div class="breadcrumb-nav"><a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name'); // der Blogname als Startseite, ansonsten vlt. Home oder Startseite schreiben
        echo " » </a>";
        if (is_category() || is_single()) {
            the_category();
            if (is_single()) {
                echo " » ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
        echo '</div>';
    }
}

/******************************************************************************************************
// Add Acct Menu
/******************************************************************************************************/

if ( ! function_exists( 'acct_menu' ) ) {

// Register Navigation Menus
function acct_menu() {

    $locations = array(
        'acct_nav' => __( 'Acct Menu)', 'text_domain' ),
    );
    register_nav_menus( $locations );

}
add_action( 'init', 'acct_menu' );

}


/******************************************************************************************************
* Initializes themes widgets and overwrites the parent theme function.
******************************************************************************************************/
if ( ! function_exists( 'understrap_widgets_init' ) ) {
    function understrap_widgets_init() {

        register_sidebar( array(
            'name'          => __( 'Footer Left', 'core-understrap' ),
            'id'            => 'left-footer',
            'before_widget' => '<aside id="%1$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Center', 'core-understrap' ),
            'id'            => 'center-footer',
            'before_widget' => '<aside id="%1$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => __( 'Footer Right', 'core-understrap' ),
            'id'            => 'right-footer',
            'before_widget' => '<aside id="%1$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        
    }
} // endif function_exists( 'understrap_widgets_init' ).
add_action( 'widgets_init', 'understrap_widgets_init' );


add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_custom_action', 15 );
 
function bbloomer_custom_action() {
echo ' <input type="hidden" name="wlid" id="wlid"><input type="hidden" name="wl_from_single_product" value="1"><input type="hidden" name="add-to-wishlist-type" value="simple"><div id="wl-wrapper" class="woocommerce wl-button-wrap wl-row wl-clear">
    
    <a rel="nofollow" href="/product/artichoke-vessels/?add-to-wishlist-itemid='.get_the_id().'" data-productid="'.get_the_id().'" data-listid="" class="wl-add-to wl-add-to-single  wl-add-link present"></a>
</div>' ;
}
