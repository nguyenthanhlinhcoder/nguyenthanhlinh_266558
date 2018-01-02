<h1 class="title_category_page">Tạp chí</h1>
<div class="top_news_page">

    <div class="new_post_header">
        <div id="post_new" class="owl-carousel owl-theme">
            <?php
            global $post;
            $args = array('posts_per_page' => 6, 'order' => 'DESC', 'orderby' => 'date');
            $post_sliebar = get_posts($args);
            ?>
            <?php foreach ($post_sliebar as $post) : ?>
                <?php setup_postdata($post); ?>
                <?php
                $image = get_bloginfo('template_url') . '/css/images/no-images.jpg';
                $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => $post->ID
                );

                $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                if ($thumbnail != '') {
                    $image = $thumbnail;
                } else {
                    $attachments = get_posts($args);
                    if ($attachments) {
                        foreach ($attachments as $attachment) {
                            $image = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
                            $image = $image[0];
                            break;
                        }
                    }
                }
                ?>
                <div class="content-news-page">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" alt=""/></a>
                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>

        </div>
    </div>
    <div class="post_view">
        <h1 class="title_post_view">Bài viết được xem nhiều</h1>
        <div class="wrap_post_view">
            <?php
            $popularpost = new WP_Query(array('posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
            while ($popularpost->have_posts()) : $popularpost->the_post();
                ?>
                <div class="item_post_more_view">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <div class="entry_content_more_view">
                        <h2><?php the_title(); ?></h2>
                        <!--                        --><?php //the_excerpt();?>
                        <!--                        --><?php //the_category();?>
                        <i><?php the_time('j.m.Y '); ?></i>
                    </div>

                </div>
                <?php
            endwhile;
            ?>

        </div>
    </div>
</div>
</div>

<?php
$category_ids = get_all_category_ids();

foreach ($category_ids as $values) {
//    echo get_cat_name($values);
    if (get_category($values)->category_count > 0) {
?>

<div class="item_category">

    <?php
    $args = array('posts_per_page' => 7, 'category' => $values);
    $posts_array = get_posts($args);

    ?>
    <div class="wrap_title">
        <h3 class="content_title"><a
                    href="<?php echo get_category_link($values); ?>"><?php echo get_the_category_by_ID($values); ?></a>
        </h3>
    </div>
    <div class="content_category">
        <?php

        foreach ($posts_array as $post) : setup_postdata($post);
            ?>
            <div class="item-post">

                <div class="thumbnail_item_post">
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium", array("title" => get_the_title(), "alt" => get_the_title())); ?></a>
                    <?php else : ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default_img_news.png"
                             alt="<?php the_title(); ?>">
                    <?php endif;
                    ?>
                </div>
                <div class="content_item_post">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                        <h2 class="title">
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <p class="post-meta"> <?php /*the_author(); */ ?></p>
                    <i><?php the_time('j.m.Y '); ?></i>
                    <div class="excerpt_content_post"> <?php

                        the_excerpt();
                        // echo mb_strimwidth( get_the_excerpt(), 0, 100, '...');?>
                        <!--/*the_content(); */ ?>-->

                    </div>
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

            </div>
            <?php

        endforeach;
        ?>
    </div>

    </div>
        <?php
    }
    ?>
    <?php
}
wp_reset_query();
?>
<?php

?>
<!--</div>-->
<script defer="defer" src="<?php bloginfo('template_url') ?>/slider/owl.carousel.min.js"></script>
<script>
    waitJquery(function () {
//        function getRandomAnimation(){
//            var animationList = ['slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight','rotateIn','bounceInDown'];
//            return animationList[Math.floor(Math.random() * animationList.length)];
//        }
        var owl = jQuery('#post_new');
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