<?php
/**
 * Template Name: Home
 *
 * The homepage template for the theme
 *
 * @package WordPress
 * @subpackage Foursquare Two
 * @since Foursquare Two 1.0
 */

get_header(); ?>


<section id="hero" class="masthead">
    <?php echo do_shortcode("[flexslider]"); ?>
</section>

<section id="content" class="row">

	<div class="news span8">
		<h1>Laatste nieuws</h1>
		<?php
		// The Query
		query_posts( 'showposts=3&posts_per_page=4&paged=' .$paged );
		// The Loop
		while ( have_posts() ) : the_post(); ?>
    
			<article>
				<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $id, 'thumbnail' ); ?></a>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?>
				<a class="btn btn-primary" > Lees verder</a>
				<hr />
			</article>

		<?php endwhile; ?>
	</div><!--end news-->

    <aside class="span3">
        <div class="info">

            <?php
                    // Get the the id of the page that is set as homepage.
                    $frontpage_id = get_option('page_on_front');

                    // ... and place the contents on the frontpage
                    $page = get_post($frontpage_id);
                    $content = $page->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
             ?>

            <h2><?php echo $page->post_title;?></h2>
            <article>
                <?php echo $page->post_content;?>
            </article>


        </div><!--end info-->

        <div class="info">
            <h2>Agenda: </h2>
            <article>
                <?php the_widget('TribeEventsListWidget'); ?>
            </article>
        </div>

    </aside>

</section><!--end content-->

<?php include ('sidebar-footer.php'); ?>

</div><!--end container (in header.php)-->
<?php get_footer(); ?>
