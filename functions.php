<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mhuijser
 * Date: 17-05-13
 * Time: 11:28
 * To change this template use File | Settings | File Templates.
 */

// Set width/height of the header image
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'foursquare_header_image_width', 270 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'foursquare_header_image_height', 90 ) );

/*
 * Find a way to load the rafael-stylesheet
 */
function theme_styles()
{
  wp_register_style( 'custom-style', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');


/*
 * Nex code is needed to remove the admin-bar from the frontend
 */
add_action('init', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// Just override function to translate
function foursquare_posted_on() {
    printf( __( '<span class="%1$s">Geplaatst op </span> %2$s <span class="meta-sep">door</span> %3$s', 'foursquare' ),
        'meta-prep meta-prep-author',
        sprintf( '<span class="entry-date">%3$s</span>',
            get_permalink(),
            esc_attr( get_the_time() ),
            get_the_date()
        ),
        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
            get_author_posts_url( get_the_author_meta( 'ID' ) ),
            sprintf( esc_attr__( 'Bekijk alle berichten van  %s', 'foursquare' ), get_the_author() ),
            get_the_author()
        )
    );
}

function foursquare_posted_in() {
    // Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list( '', ', ' );
    if ( $tag_list ) {
        $posted_in = __( 'Tags: %2$s.');
    } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        $posted_in = __( 'Dit bericht is geplaatst in %1$s.', 'foursquare' );
    } else {
        $posted_in = __( '| <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>.', 'foursquare' );
    }
    // Prints the string, replacing the placeholders.
    printf(
        $posted_in,
        get_the_category_list( ', ' ),
        $tag_list,
        get_permalink(),
        the_title_attribute( 'echo=0' )
    );
}


// Override for NL Translation
// Returns a "Continue Reading" link for excerpts

function rafael_continue_reading_link() {
    return ' <p><a class="btn btn-primary" href="'. get_permalink() . '">' . __( 'Lees verder', 'foursquare' ) . '</a></p>';
}

function rafael_auto_excerpt_more( $more ) {
    return ' &hellip;' . rafael_continue_reading_link();
}

function my_child_theme_setup() {
    remove_filter( 'excerpt_more', 'foursquare_auto_excerpt_more' );
    add_filter( 'excerpt_more', 'rafael_auto_excerpt_more' );
}

// Execute the overrides after setting up the theme ...
add_action( 'after_setup_theme', 'my_child_theme_setup' );
