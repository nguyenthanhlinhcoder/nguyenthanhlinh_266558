<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $product, $woocommerce_loop;
if ( empty( $woocommerce_loop['loop'] ) )
    $woocommerce_loop['loop'] = 0;
if ( empty( $woocommerce_loop['columns'] ) )
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
if ( ! $product || ! $product->is_visible() )
    return;
$woocommerce_loop['loop']++;
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
    $classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
    $classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>
    <div class="content_product">
    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
    <h3><?php the_title(); ?></h3>
    <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    <!--<div class="muahang"> <p class="buy">Mua ngay</p> <p class="quick-view-button">Xem nhanh</p> </div>-->
    <div class="tooltip-content" style="display: none;">
        <?php
        $attributes = $product->get_attributes();
        $show=false;
        foreach($attributes as $attribute){
            if (empty($attribute['is_visible']) || ($attribute['is_taxonomy'] && ! taxonomy_exists($attribute['name']))){
            }else{
                $true=true;
            }
        }
        $post=$product->post;
        if($true){
            $product->list_attributes();
        }elseif($post->post_excerpt!=''){
            echo $post->post_excerpt;
        }
        ?>
    </div>
    <?php do_action( 'woocommerce_after_shop_loop_item' );?>
    </div>
</li>