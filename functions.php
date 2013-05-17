<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mhuijser
 * Date: 17-05-13
 * Time: 11:28
 * To change this template use File | Settings | File Templates.
 */

// Set width/height of the header image
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'foursquare_header_image_width', 360 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'foursquare_header_image_height', 120 ) );

/*
 * Find a way to load the rafael-stylesheet
 */
function theme_styles()
{
  wp_register_style( 'custom-style', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
