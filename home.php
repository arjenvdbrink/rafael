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

<section id="content" class="row">

	<div class="news span5">
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
				<hr />
			</article>

		<?php endwhile; ?>
	</div><!--end news-->

	<div class="info span6">

				<?php
		  $page = get_post(9);
		$content = $page->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		  ?>

		<h2><?php echo $page->post_title;?></h2>
		<article>
		<?php echo $page->post_content;?>
		</article>

		<? /* This code retrieves our admin options from Maps and Services. */ ?>
		<?
		global $options;
		foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
		}
		?>
		<br />

		<h2><?php echo get_option('nt_maptitle'); ?></h2>
		<iframe width="570" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo get_option('nt_maplink'); ?>&output=embed"></iframe>


	</div><!--end info-->
</div><!--end content-->

<?php include ('sidebar-footer.php'); ?>

</div><!--end container (in header.php)-->
<?php get_footer(); ?>
