<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div class="content-box">
		<?php get_sidebar(); ?>
		<section class="content-box-1">
			<div id="primary" class="site-content">
				<div id="content" role="main">
			<?php if(is_front_page()){?>
				<?php get_template_part( 'content', 'home' ); ?>
			<?php }elseif (is_page('blog')){?>
				<?php get_template_part( 'content', 'blog' ); ?>
			<?php }else{?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php }?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</section>
	</div>

<?php get_footer(); ?>