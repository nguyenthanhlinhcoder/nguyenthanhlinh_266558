<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
//global $options;
//foreach ($options as $value) {
//    if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//        $$value['id'] = stripslashes($value['value']);
//    }else{
//        $$value['id'] = get_settings( $value['id'] );
//    }
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
add_action( 'wp_enqueue_scripts', 'post_lightbox' );
function post_lightbox() {
  global $woocommerce;
  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
}

function add_rel_prettyPhoto($content) {
 global $post;
 $pattern = "/(<a(?![^>]*?data-rel=['\"]prettyPhoto.*)[^>]*?href=['\"][^'\"]+?\.(?:bmp|gif|jpg|jpeg|png)['\"][^\>]*)>/i";
 $replacement = '$1 data-rel="prettyPhoto['.$post->ID.']">';
 $content = preg_replace($pattern, $replacement, $content);
 return $content;
}
add_filter("the_content","add_rel_prettyPhoto");

get_header(); ?>
<div class="content-box">
<!--    --><?php //if($custom_pos_sidebar=="Hiện sidebar trái") get_sidebar(); ?>
    <section class="content-box-1 padding-10">
        <div id="primary" class="site-content">
            <div id="content" role="main">
                <div class="content_single_post">
                <?php while ( have_posts() ) : the_post(); ?>
<!--                    --><?php //echo get_the_date('d.m.Y'); ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <i class="date_post"><?php the_date('d.m.Y'); ?></i>
                    <div class="share_single">
                        <p class="link_icon">
                            <a href="<?php the_permalink()?>#post_share">
                                <i class="fa-share-alt fa"></i>
                            </a>
                            <a href="<?php the_permalink()?>#comments">
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
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                    <div id="post_share" class="entry-share">
                        <?php if($isMobile==0) { ?>
                          <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                          <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="200"></div>
                          <?php }?>
                    </div>
                    <div class="entry-tag">
                        <?php if(has_tag()){?>
                            <ul class="tags">
                                <li>
                                    <a>Tags</a>
                                </li>
                            </ul>
                        <?php the_tags( '<ul class="tags-item" ><li>', '</li><li>', '</li></ul> ' ); ?>
                        <?php }?>
                    </div>
                    <?php if($custom_type_comment=='Facebook'){ ?>
                    <div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-numposts="5" data-colorscheme="light"></div>
                    <?php }elseif($custom_type_comment=='Google'){ ?>
                    <script src="https://apis.google.com/js/plusone.js">{lang: 'vi'}
                    </script>
                    <div id="google_comments"></div>
                    <script>
                    gapi.comments.render('google_comments', {
                    href: window.location,
                    width: '650',
                    first_party_property: 'BLOGGER',
                    view_type: 'FILTERED_POSTMOD'
                    });
                    </script>
                    <?php }else{ ?>
                    <?php comments_template( '', true ); ?>
                    <?php } ?>

                <?php endwhile; // end of the loop. ?>
                <?php 
                    $categories = get_the_category($post->ID);
                    foreach ($categories as $value) {
                        $category[] = $value->term_id;
                    }
                    $args = array('numberposts' =>5,'post_type'=>'post','category__in'=>$category,'post__not_in'=>[$post->ID]);
                    $posts_related = get_posts( $args ); 
                    if( !empty ( $posts_related ) ) {
                ?>	
                    <div class="related-post">
                        <h3>Bài viết liên quan</h3>
                        <ul> 
                            <?php foreach($posts_related as $post):
                                    setup_postdata( $post ); ?>
                            <li id="related-post-<?php the_ID(); ?>">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                            <?php endforeach; wp_reset_postdata();?>
                        </ul> 
                    </div>
                <?php } ?>
                </div>
                <div class="sidebar_single_post">
                    <div class="wrap_title">
                        <h3 class="content_title"><a>Chuyên đề</a></h3>
                    </div>
                    <div class="contet_sidebar_post">
                        <div class="wrap_sidebar_post">
                            <?php
                            global $post;
                            $args = array( 'posts_per_page' => 6,'order' => 'DESC','orderby' => 'date');
                            $post_sliebar = get_posts( $args );
                            ?>
                            <?php foreach($post_sliebar as $post) :  ?>
                                <?php setup_postdata($post); ?>
                                <?php
                                $image = get_bloginfo('template_url').'/css/images/no-images.jpg';
                                $args = array(
                                    'post_type' => 'attachment',
                                    'numberposts' => -1,
                                    'post_status' => null,
                                    'post_parent' => $post->ID
                                );

                                $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                if($thumbnail!=''){
                                    $image = $thumbnail;
                                }else{
                                    $attachments = get_posts( $args );
                                    if ($attachments){
                                        foreach ( $attachments as $attachment ) {
                                            $image = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
                                            $image = $image[0];
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <div class="content-news-sidebar">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" /></a>
                                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<!--                                    --><?php //the_excerpt();?>
                                    <i><?php the_time('j.m.Y '); ?></i>
                                </div>
                            <?php endforeach; wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
                <?php the_tags( '<ul class="tags-item" ><li>', '</li><li>', '</li></ul> ' ); ?>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </section>
    <?php if($custom_pos_sidebar!="Hiện sidebar trái") get_sidebar('right'); ?>
</div>
<script defer="defer" src="<?php bloginfo('template_url')?>/slider/jquery.prettyPhoto.min.js"></script>
<script>
waitJquery(function(){
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        hook: 'data-rel',
        social_tools: false,
        theme: 'pp_woocommerce',
        horizontal_padding: 8,
        opacity: 0.8,
        deeplinking: false,
		show_title: false,
    });
});
</script>
<?php get_footer(); ?>
