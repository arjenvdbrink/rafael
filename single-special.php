<?php
/**
 * Sample template for displaying single gemeente posts.
 * Save this file as as single-gemeente.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>&nbsp;
    <?php the_content(); ?> &nbsp;

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>