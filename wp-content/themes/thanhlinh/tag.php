<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="content-box">
<!--	--><?php //get_sidebar(); ?>
	<section class="content-box-1">
		<div id="primary" class="site-content">
			<div id="content" role="main">
				<h1 class="page-title"><?php echo single_tag_title( '', false ); ?></h1>
				<div class="category-meta"><?php echo tag_description(); ?></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
							<?php $args = array('post_type' => 'attachment','numberposts' => 5,'post_parent' => get_the_ID());
								$attachments = get_posts( $args );
								if( $attachments ){
									foreach( $attachments as $attachment ) {
										echo wp_get_attachment_image( $attachment->ID, 'full' );
										break;
									}
								}
								; ?>
							<?php the_excerpt(); ?> 
						</div>
					</div><!-- #post-## -->
				<?php endwhile; ?>
			</div><!-- #content -->
			<?php wp_pagenavi(); ?>
		</div><!-- #primary -->
	</section>
</div>
<?php get_footer(); ?>