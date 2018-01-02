<?php
//global $options;
//foreach ($options as $value) {
//	if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//		$$value['id'] = stripslashes($value['value']);
//	}else{
//		$$value['id'] = get_settings( $value['id'] );
//	}
//}
global $options; foreach ($options as $value) { if(isset($value['id'])) {$$value['id'] = stripslashes($value['value']);}}
global $woocommerce;
?>

<aside id="sibar-left" class="sidebar">
	<div id="filter_sidebar"><i class="fa fa-filter"></i></div>

	<?php if($woocommerce!=null){ ?>
		<?php if($custom_filter_display=="Hiện lọc sản phẩm" && is_active_sidebar('sidebar-1')): ?>
			<?php if(is_product_category() || is_shop()){?>
			<div class="block-left filter-wapper">
				<div class="heading_box"><h4>Lọc sản phẩm <i class="fa fa-angle-down"></i></h4></div>
				<div class="block-content">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			</div>
			<?php } ?>
		<?php endif; ?>
	<?php } ?>

    <?php if($custom_danh_muc_display=="Hiện danh mục"): ?>
        <div class="block-left category-wapper">
            <div class="heading_box">
                <a href="<?php bloginfo('url');?>/shop"> <h4>Danh mục sản phẩm</h4></a>
            </div>
            <div class="block-content">
                <?php wp_nav_menu(array('container'=>false,'menu'=>'Sidebar-menu','fallback_cb'=>'nav_fallback')); ?>

            </div>
        </div>
    <?php endif;?>

    <?php if($custom_san_pham_moi_display=="Hiện danh mục"): ?>
        <div class="block-left category-wapper">
            <div class="heading_box">
                <a href="<?php bloginfo('url');?>/shop"> <h4>Sản phẩm mới</h4></a>
            </div>
            <?php
//            global $product; 

// // // Get product attributes
// $attributes = $product->get_attributes('');
// var_dump($attributes);
            ?>
            <div class="block-content">
                <div class="content_product_sidebar">

                    <ul class="triangle-product-sidebar">
                        <?php

                        $args = array(
                        'post_type' => 'product',
                        'stock' => 1,
                        'posts_per_page' => 4,
                        'orderby' =>'date',
                        'order' => 'DESC' 
                           
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();

                            global $product;
                            ?>
                            <li>
                                <a href="<?php the_permalink()?>">

                                    <?php
                                    if ( has_post_thumbnail( $loop->post->ID ) ):
                                        echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' );
                                    else:
                                        echo '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" width="65px" height="115px" />';
                                    endif;
                                    ?>
                                    <div class="name-price-product-sidebar">
                                        <h3><?php the_title(); ?></h3>
                                        <span class="price">
                            <?php

                            echo $product->get_price_html();
                            ?>
                            </span>

                                    </div>
                                </a>
                                <!--                                --><?php
                                //                                woocommerce_template_loop_add_to_cart( $loop->post->ID, $product );
                                //                                ?>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
        </div>
        </div>
    <?php endif;?>

    <?php if($custom_san_pham_noi_bat_display=="Hiện danh mục"): ?>
        <div class="block-left category-wapper">
            <div class="heading_box">
                <a href="<?php bloginfo('url');?>/shop"> <h4>Sản phẩm nổi bật</h4></a>
            </div>
            <div class="block-content">
                <div class="content_product_sidebar">

                    <ul class="triangle-product-sidebar">
                        <?php
                        $meta_query   = WC()->query->get_meta_query();
                        $meta_query[] = array(
                            'key'   => '_featured',
                            'value' => 'yes'
                        );
                        $tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN',
);
                        $args = array(
//                            'posts_per_page' => 4,
                            'post_type'   =>  'product',
                            'stock'       =>  1,
                            'showposts'   =>  4,
                            'orderby'     =>  'date',
                            'order'       =>  'DESC',
                            'tax_query'           => $tax_query
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();

                        global $product;
                            ?>
                            <li>
                                <a href="<?php the_permalink()?>">

                                    <?php
                                    if ( has_post_thumbnail( $loop->post->ID ) ):
                                        echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' );
                                    else:
                                        echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="65px" height="115px" />';
                                    endif;
                                    ?>
                                    <div class="name-price-product-sidebar">
                                        <h3><?php the_title(); ?></h3>
                                        <span class="price">
                            <?php

                            echo $product->get_price_html();
                            ?>
                            </span>

                                    </div>
                                </a>
<!--                                --><?php
//                                woocommerce_template_loop_add_to_cart( $loop->post->ID, $product );
//                                ?>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if($custom_san_pham_vua_xem_display=="Hiện danh mục"): ?>
        <div class="block-left category-wapper">
            <div class="heading_box">
                <a href="<?php bloginfo('url');?>/shop"> <h4>Sản phẩm vừa xem</h4></a>
            </div>
            <div class="block-content">
                <div class="content_product_sidebar"><?php echo do_shortcode("[woocommerce_recently_viewed_products per_page='5']"); ?></div>

            </div>
        </div>
    <?php endif; ?>


</aside>
