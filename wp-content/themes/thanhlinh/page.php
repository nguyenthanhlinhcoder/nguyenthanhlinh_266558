<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
<?php if(is_front_page()){?>
    <?php get_template_part( 'content', 'home' ); ?>
<?php }else{ ?>
    <!--		--><?php //if($custom_pos_sidebar=="Hiện sidebar trái") get_sidebar(); ?>
    <section class="content-box-1">
        <div id="primary" class="site-content">
            <div id="content" role="main">
                <?php if (is_page('blog')){?>
                    <?php get_template_part( 'content', 'blog' ); ?>
                <?php }elseif (is_page('tin_tuc')){?>
                    <?php get_template_part( 'content', 'tintuc' ); ?>
                <?php }elseif (is_page('lien-he')){?>
                    <?php get_template_part( 'content', 'lien-he' ); ?>
                <?php }elseif (is_page('cua-hang')){?>
                    <?php get_template_part( 'content', 'cua-hang' ); ?>
                <?php } else{?>
                    <?php get_template_part( 'content', 'page' ); ?>
                <?php } ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </section>

    <!--		--><?php //if($custom_pos_sidebar!="Hiện sidebar trái") get_sidebar('right'); ?>
<?php }?>
<?php get_footer(); ?>