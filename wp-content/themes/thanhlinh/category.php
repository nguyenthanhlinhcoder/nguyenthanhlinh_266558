<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
//global $options;
//foreach ($options as $value) {
//    if (get_settings($value['id']) === FALSE || get_settings($value['id']) == '') {
//        $$value['id'] = stripslashes($value['value']);
//    } else {
//        $$value['id'] = get_settings($value['id']);
//    }
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
get_header(); ?>
<div class="content-box">
    <!--	--><?php //if($custom_pos_sidebar=="Hiện sidebar trái") get_sidebar(); ?>
    <section class="content-box-1">
        <div id="primary" class="site-content">
            <div id="content" role="main">
                <h1 class="page-title"><?php echo single_cat_title('', false); ?></h1>
                <!--				<div class="category-meta">--><?php //echo category_description(); ?><!--</div>-->

                <?php $category = get_the_category();
                $value = $category[0]->cat_ID;
                ?>

                <?php
                $args = array('posts_per_page' => 3, 'category' => $value);
                $posts_array = get_posts($args);
                ?>
                <div class="post_new_catgory">
                    <?php
                    foreach ($posts_array as $post) : setup_postdata($post);
                        ?>
                        <div class="item-post_cat_new">

                            <div class="thumbnail_item_post">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium", array("title" => get_the_title(), "alt" => get_the_title())); ?></a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>"> <img
                                                src="<?php bloginfo('template_directory'); ?>/img/default_img_news.png"
                                                alt="<?php the_title(); ?>">
                                    </a>

                                <?php endif;
                                /*
                                 * Posted by
                                 */
                                ?>
                            </div>
                            <div class="content_item_post">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                    <h2 class="title">
                                        <?php the_title(); ?>
                                    </h2>
                                </a>
                            </div>

                        </div>
                        <?php

                    endforeach;
                    ?>
                </div>
                <div class="post_news_header">
                    <?php
                    $args_slide = array('posts_per_page' => 3, 'category' => $value);
                    $posts_slide_array = get_posts($args);
                    ?>
                    <div class="post_new_slide_catgory ">
                        <div id="post_news_slide" class=" owl-carousel owl-theme">

                            <?php
                            foreach ($posts_slide_array as $post) : setup_postdata($post);
                                ?>
                                <div class="item-post_cat_slide">

                                    <div class="thumbnail_item_slide">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium", array("title" => get_the_title(), "alt" => get_the_title())); ?></a>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>"> <img
                                                        src="<?php bloginfo('template_directory'); ?>/img/default_img_news.png"
                                                        alt="<?php the_title(); ?>">
                                            </a>

                                        <?php endif;

                                        ?>
                                    </div>
                                    <div class="content_item_slide">
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                            <h2 class="title">
                                                <?php the_title(); ?>
                                            </h2>
                                            <?php the_excerpt();?>
                                        </a>
                                    </div>

                                </div>
                                <?php

                            endforeach;
                            ?>
                        </div>

                    </div>
                </div>
                <?php while (have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="thumbnail_post">
                            <a href="<?php the_permalink(); ?>">
                                <?php $args = array('post_type' => 'attachment', 'numberposts' => 5, 'post_parent' => get_the_ID());
                                $attachments = get_posts($args);
                                if ($attachments) {
                                    foreach ($attachments as $attachment) {
                                        echo wp_get_attachment_image($attachment->ID, 'full');
                                        break;
                                    }
                                } else {
                                    the_post_thumbnail();
                                }; ?>
                            </a>
                        </div>
                        <div class="entry-content">
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="title">
                                    <?php the_title(); ?>
                                </h2>
                                <i><?php the_time('j.m.Y '); ?></i>
                                <div class="excerpt_content_post">
                                    <?php the_excerpt(); ?>
                                </div>

                            </a>
                            <div class="share">
                                <p class="link_icon">
                                    <a href="<?php the_permalink() ?>#post_share">
                                        <i class="fa-share-alt fa"></i>
                                    </a>
                                    <a href="<?php the_permalink() ?>#comments">
                                        <i class="fa fa-comment"></i>
                                    </a>
                                    <?php
                                    //                                $comments_count = wp_count_comments();
                                    //                                echo $comments_count->total_comments;
                                    ?>
                                    <?php
                                    $my_var = get_comments_number();
                                    echo $my_var;
                                    ?>
                                </p>
                            </div>

                        </div>

                    </div><!-- #post-## -->
                <?php endwhile; ?>
            </div><!-- #content -->
            <?php wp_pagenavi(); ?>
        </div><!-- #primary -->
    </section>
    <?php if ($custom_pos_sidebar != "Hiện sidebar trái") get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
<script defer="defer" src="<?php bloginfo('template_url') ?>/slider/owl.carousel.min.js"></script>
<script>
    waitJquery(function () {
//        function getRandomAnimation(){
//            var animationList = ['slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight','rotateIn','bounceInDown'];
//            return animationList[Math.floor(Math.random() * animationList.length)];
//        }
        var owl = $('#post_news_slide');
        owl.owlCarousel({
            nav: false,
            dots: true,
            autoHeight: false,
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            loop: true,
            touchDrag: true,
            mouseDrag: true,

//            animateOut: 'fadeOut',
            /*	animateIn: 'slideInLeft'*/
        });
//        owl.on('changed.owl.carousel', function(event) {
//            $('.carousel-caption .large_text').css({"animation":"2s ease 0s "+getRandomAnimation()});
//            $('.carousel-caption .small-text').css({"animation":"2s ease 0s "+getRandomAnimation()});
//        });
    });
</script>
