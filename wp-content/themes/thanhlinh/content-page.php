<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="entry-title padding-10"><?php the_title(); ?></h1>
	<div class="entry-content padding-10">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
<?php endwhile; // end of the loop. ?>