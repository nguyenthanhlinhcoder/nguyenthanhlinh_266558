<?php
//global $options;
//foreach ($options as $value) {
//    if (get_settings($value['id']) === FALSE || get_settings($value['id']) == '') {
//        $$value['id'] = stripslashes($value['value']);
//    } else {
//        $$value['id'] = get_settings($value['id']);
//    }
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
?>
	<div id="row-wrap-content" class="">
        <div class="content-box">
            <?php if($custom_slide=="Sử dụng Plugin slide"):?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                <?php endwhile; // end of the loop. ?>
            <?php else:
                get_template_part('slide');
            endif;
            ?>
        </div>
        <section class="content-box-1">
            <div id="primary" class="site-content">
                <div id="content" role="main">
                    <?php get_template_part('box-home')?>
                    <div id="row-banner">
                        <div class="banner-item">
                            <div class="wrap-banner-item">
                            <a href="<?php echo get_permalink( woocommerce_get_page_id('shop'));?>">
                                <div class="img-banner-item">
                                    <img src="<?php echo get_template_directory_uri();?>/css/images/index_banner_1.jpg" alt="banner1">
                                </div>
                                <div class="content-banner-item">
                                    <div class="wrap-content-banner-item">
                                        <h2><?php echo $custom_title_banner_left?></h2>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="banner-item">
                            <div class="wrap-banner-item">
                            <a href="<?php echo get_permalink( woocommerce_get_page_id('shop'));?>">
                                <div class="img-banner-item">
                                    <img src="<?php echo get_template_directory_uri();?>/css/images/index_banner_2.jpg" alt="banner2">
                                </div>
                                <div class="content-banner-item">
                                    <div class="wrap-content-banner-item">
                                        <h2><?php echo $custom_title_banner_mid?></h2>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>


                        <div class="banner-item">
                            <div class="wrap-banner-item">
                            <a href="<?php echo get_permalink( woocommerce_get_page_id('shop'));?>">
                                <div class="img-banner-item">
                                    <img src="<?php echo get_template_directory_uri();?>/css/images/index_banner_3.jpg" alt="banner3">
                                </div>
                                <div class="content-banner-item">
                                    <div class="wrap-content-banner-item">
                                        <h2><?php echo $custom_title_banner_right?></h2>
                                    </div>
                                </div>
                            </a>
                            </div>

                        </div>
                    </div>

                        <?php
                        // if ($custom_category_home != '') {$ids = $custom_category_home;}
                        $args = array('hide_empty' => true);
                        $product_categories = get_terms('product_cat', $args);
                        ?>
                        <div class="box-category">
                            <?php
                            foreach ($product_categories as $item) {

                                if ($item->parent == 0):
                                    $catid = $item->term_id;
                                    $catid = $catid + 0; //Fix error Catchable
                                    ?>
                                    <div class="item-category">
                                        <div class="title-cat"><h4><a
                                                        href="<?php echo get_term_link($catid, 'product_cat'); ?>"><?php echo $item->name; ?></a>
                                            </h4></div>
                                        <div class="index-product">
                                            <?php wp_nav_menu(array('container' => false, 'menu' => 'index_menu_product', 'fallback_cb' => 'nav_fallback')); ?>
                                        </div>
                                        <?php echo do_shortcode('[product_category category="' . $item->slug . '" per_page="12" orderby="date" order="desc"]') ?>
                                    </div>
                                    <?php
                                endif;
                            } ?>
                        </div>
                    </div>
                    <div class="trademark">
                        <div class="title_trademark">
                            <h2>
                                <?php echo $custom_title_trademark;?>
                            </h2>
                        </div>
                        <div class="inner_trademark">
                            <div class="wrap_trademark">
                            <ul id="owl-thuonghieu" class="owl-carousel owl-theme" >
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_1.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_2.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_3.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_4.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_5.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_6.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_7.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_8.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_9.png'; ?>" alt=""></li>
                                <li><img src="<?php echo bloginfo('template_url').'/css/images/popular_brand_img_10.png'; ?>" alt=""></li>

                            </ul>
                            </div>
                        </div>
<!--                    </div>-->
<!--                footer_social-->
                </div><!-- #content -->
            </div><!-- #primary -->
        </section>
<!--        --><?php //if ($custom_pos_sidebar != "Hiện sidebar trái") get_sidebar('right'); ?>
    </div>
<script defer="defer" src="<?php bloginfo('template_url') ?>/slider/owl.carousel.min.js"></script>
<script>
    // waitJquery(function () {
    //     checkMinheight('.row-new-product .products li h3');
    //     checkMinheight('.box-category .products li h3');
    // });
    // <?php if($custom_show_popup_list_page == 'Show Popop Up'): ?>
    // waitJquery(function () {
    //     callTooltip();
    // });
    // <?php endif; ?>


    waitJquery(function(){
//        function getRandomAnimation(){
//            var animationList = ['slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight','rotateIn','bounceInDown'];
//            return animationList[Math.floor(Math.random() * animationList.length)];
//        }
        var owl = jQuery('#owl-thuonghieu');
        owl.owlCarousel({
            nav:false,
            dots:false,
            autoHeight:true,
            items:6,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            loop:true,
            touchDrag:true,
            mouseDrag:true,
            margin:9,
            responsive: {
                0: {
                    items: 1

                },
                320: {
                    items: 2

                },
                600: {
                    items: 3

                },
                800: {
                    items: 5

                },
                992: {
                    items: 6

                }
            }
//            animateOut: 'fadeOut',
            /*	animateIn: 'slideInLeft'*/
        });
//        owl.on('changed.owl.carousel', function(event) {
//            $('.carousel-caption .large_text').css({"animation":"2s ease 0s "+getRandomAnimation()});
//            $('.carousel-caption .small-text').css({"animation":"2s ease 0s "+getRandomAnimation()});
//        });
    });

</script>