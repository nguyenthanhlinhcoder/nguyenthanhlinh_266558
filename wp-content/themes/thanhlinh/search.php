<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
//global $options;
//foreach ($options as $value) {
//	if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//		$$value['id'] = stripslashes($value['value']);
//	}else{
//		$$value['id'] = get_settings( $value['id'] );
//	}
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
get_header(); ?>
	<div class="content-box">
		<?php if($custom_pos_sidebar=="Hiện sidebar trái") get_sidebar(); ?>
		<section class="content-box-1">
			<div id="primary" class="site-content">
				<div id="content" role="main">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
								<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry-content">
									<?php the_excerpt(); ?> 
								</div>
							</div><!-- #post-## -->
						<?php endwhile; ?>
					<?php else : ?>
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
							</header>
							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->
					<?php endif; ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</section>
		<?php if($custom_pos_sidebar!="Hiện sidebar trái") get_sidebar('right'); ?>
	</div>
<?php get_footer(); ?>