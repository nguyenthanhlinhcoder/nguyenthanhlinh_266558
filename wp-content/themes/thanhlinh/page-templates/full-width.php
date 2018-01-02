<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div class="content-box">
		<section class="span12">
			<div id="primary" class="site-content">
				<div id="content" role="main">
			<?php if(is_front_page()){?>
				<?php get_template_part( 'content', 'home' ); ?>
			<?php }elseif (is_page('blog')){?>
				<?php get_template_part( 'content', 'blog' ); ?>
			<?php }elseif(is_page('cua-hang')){?>
				<?php get_template_part( 'content', 'cua-hang' ); ?>
            <?php }elseif(is_page('lien-he')){?>
                <?php get_template_part( 'content', 'lien-he' ); ?>
			<?php }else{?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php }?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</section>
	</div>

<?php get_footer(); ?>