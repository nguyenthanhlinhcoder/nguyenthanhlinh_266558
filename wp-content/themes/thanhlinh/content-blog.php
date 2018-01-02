<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<?php
		 global $post;
		 $thumbnailcat = get_cat_ID('blog');
		 $limit = "5";
		 $products = get_posts('numberposts='.$limit.'&order=ASC&orderby=ASC&category='. $thumbnailcat);
	?>
	<?php $i=0; ?>
	<?php foreach($products as $post) :  ?>
	<?php $i++; ?>
	<?php setup_postdata($post); 
	?>
    
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
			<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-content">
				<?php the_excerpt(); ?> 
			</div>
		</div><!-- #post-## -->
		
	<?php endforeach; ?>
