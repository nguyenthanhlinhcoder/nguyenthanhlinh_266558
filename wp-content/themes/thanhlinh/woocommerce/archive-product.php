<?php
global $options;
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE || get_option($value['id']) == '') {
        $$value['id'] = stripslashes($value['value']);
    } else {
        $$value['id'] = get_option($value['id']);
    }
}
?>
<?php
if (!defined('ABSPATH')) exit;
get_header(); ?>

    <div class="product-box">
        <?php woocommerce_breadcrumb(); ?>
        <?php
        //set banner shop and category
        if (is_product_category()) {
            global $wp_query;
            $cat = $wp_query->get_queried_object();
            $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            if ($image) {
                echo '<img class="banner-product" src="' . $image . '" alt="' . $cat->name . '" />';
            }
        }
        if (is_shop()) {
            $shop = get_option('woocommerce_shop_page_id');
            if (has_post_thumbnail($shop)) {
                echo get_the_post_thumbnail($shop);
            }
        }
        ?>
        <?php if ($custom_pos_sidebar == "Hiện sidebar trái") get_sidebar(); ?>
        <section class="product-shop">
            <div id="primary" class="site-content">
                <div id="content" role="main">


                    <?php if (have_posts()) : ?>
                        <?php do_action('woocommerce_before_shop_loop'); ?>
                        <?php woocommerce_product_loop_start(); ?>
                        <?php woocommerce_product_subcategories(); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                        <?php woocommerce_product_loop_end(); ?>
                        <?php do_action('woocommerce_after_shop_loop'); ?>
                    <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>
                        <?php wc_get_template('loop/no-products-found.php'); ?>
                    <?php endif; ?>

                    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
                    <?php do_action('woocommerce_archive_description'); ?>
                    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

                    <?php endif; ?>


                </div><!-- #content -->

                <script>
//                    waitJquery(function () {
//                        checkMinheight('#content .products li h3');
//                        checkMinheight('#content .products li');
//						$(document).ajaxSuccess(function() {
//							setTimeout(function () {
//								  checkMinheight('#content .products li h3');
//								  checkMinheight('#content .products li');
//							}, 500);
//						 });
//                    });
<!--                    --><?php //if($custom_show_popup_list_page == 'Show Popop Up'): ?>
////                    waitJquery(function () {
////                        callTooltip();
////                    });
//                    <?php //endif; ?>
                </script>
            </div><!-- #primary -->
        </section>
        <?php if ($custom_pos_sidebar != "Hiện sidebar trái") get_sidebar('right'); ?>
    </div>

<?php get_footer(); ?>