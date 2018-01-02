<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>

<!--<p class="price">--><?php //echo $product->get_price_html(); ?><!--</p>-->
<p class="price">
    <?php
    $from = get_post_meta(get_the_ID(), '_regular_price', true);
    $to = get_post_meta(get_the_ID(), '_sale_price', true);
    //$sale=$product->sale_price;
    $sale = $from - $to;


    if ($from > 0) {

    if ($to && ($from != $to)) {

    $percent_sale = ceil(($sale / $from) * 100);
    ?>
    <ins><span class="amount"><?php echo((is_numeric($to)) ? wc_price($to) : $to) ?></span></ins>
    <div class="regular_price"><span>Giá gốc:</span>
        <del><span class="amount"><?php echo ((is_numeric($from)) ? wc_price($from) : $from) ?> </span></del>
    </div>
    <div class="sale_price">
        <span>Giảm:</span>
        <span class="content_sale"><?php echo ((is_numeric($sale)) ? wc_price($sale) : $sale) ?>
            <span><?php (((is_numeric($percent_sale)) ? ($percent_sale) : $percent_sale) . '%') ?></span>
                    </span>

    </div>
<?php

} else {

    $to = get_post_meta(get_the_ID(), '_regular_price', true);;
    ?>
    <ins><span class="amount"><?php echo ((is_numeric($to)) ? wc_price($to) : $to) ?></span></ins>
    <?php
}
} else {

    return ' ';
}
?>
</p>