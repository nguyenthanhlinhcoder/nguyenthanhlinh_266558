<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
				<div class="category-meta"><?php echo category_description(); ?></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
							<?php $args = array('post_type' => 'attachment','numberposts' => 5,'post_parent' => get_the_ID());
								$attachments = get_posts( $args );
								if( $attachments ){
									foreach( $attachments as $attachment ) {
										echo wp_get_attachment_image( $attachment->ID, 'full' );
										//break;
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
	<?php if($custom_pos_sidebar!="Hiện sidebar trái") get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>