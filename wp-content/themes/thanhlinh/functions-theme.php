<?php
 //Đổi tên giá sản phẩm
//add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
//function wpa83367_price_html( $price, $product ){
//    $html= str_replace( '<ins>', '<ins><span style="float: left;"></span>', $price );
//	$comphtml=$html;
//    $html= str_replace( '<del>', '<del><span style="float: left;"></span>', $html );
//	if($comphtml==$html){
//		 $html =  '<span style="float: left;"></span>'.$html;
//	}
//    return $html;
//}


//add_filter( 'woocommerce_get_price_html', 'dw_change_default_price_html', 100, 2 );
//function dw_change_default_price_html( $price,$product ){
//    $from =$product->regular_price;
//    $to = $product->price;
//    $sale=$product->sale_price;
//    $sale=$from-$to;
//
//
//
//    if ( $product->price > 0 ) {
//
//        if ( $product->price && ($from!=$to)) {
//
//            if(is_product()){
//                $percent_sale=ceil(($sale/$from)*100);
//                return '<ins><span class="amount">'.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span></ins>
//                <div><span>Giá gốc</span><del><span class="amount">'. ( ( is_numeric( $from ) ) ? woocommerce_price( $from ) : $from ) .' </span></del></div>
//                <div>
//                    <span>Giảm</span>
//                    <span>'.( ( is_numeric( $sale) ) ? woocommerce_price( $sale ) : $sale ).'</span>
//                    <span>('.( ( is_numeric( $percent_sale) ) ? ( $percent_sale ) : $percent_sale ).'%)</span>
//                </div>';
//            }else{
//                return '<ins><span class="amount">'.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span></ins>
//            <del><span class="amount">'. ( ( is_numeric( $from ) ) ? woocommerce_price( $from ) : $from ) .' </span></del>';
//            }
//
//        } else {
//            $to = $product->price;
//            return '<ins><span class="amount">' . ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) . '</span></ins>';
//        }
//    } else {
//        return ' ';
//    }
//}
//add css cho trang
function thanhlinh_style(){
    
}
add_action('wp_enqueue_scripts','thanhlinh_style');
//add js cho trang
function thanhlinh_script(){
    

}
add_action('wp_enqueue_scripts','thanhlinh_script');
// Thay đổi nội dung button add to cart trong single prodcut
add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +

function woo_custom_single_add_to_cart_text() {
    echo '<h3>'.'Mua ngay'.'</h3> <span>'.'Giao tận nơi hoặc nhận ở cửa hàng'.'</span>';
//    return __( '<h3>My Button Text</h3>', 'woocommerce' );

}
function muahang() {
?>
    <div class="muahang">
            <div class="quick_button">
                <div class="buy">
                    <p>Thêm vào giỏ</p>
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="quick-view-button">
                    <p>xem nhanh</p>
                    <i class="fa fa-eye"></i>
                </div>
            </div>
    </div>
<?php
}
add_action('woocommerce_before_shop_loop_item_title','muahang',10);

//add css và js vào trang
add_action( 'wp_enqueue_scripts', 'wp_scripts_theme' );
function wp_scripts_theme() {
	
    wp_enqueue_script( 'custom-ajax-request',get_stylesheet_directory_uri().'/js/custom_script.js','all','',false);
    wp_localize_script( 'custom-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_register_style('input-style',get_template_directory_uri()."/css/input_quantity.css",'all');
    wp_enqueue_style('input-style');
    wp_register_style('animation-style',get_template_directory_uri()."/css/animation.css",'all');
    wp_enqueue_style('animation-style');
	wp_register_script('input-script',get_template_directory_uri()."/js/input_quantity.js",'all','',true);
    wp_enqueue_script('input-script');
    wp_register_script('config-script',get_template_directory_uri()."/js/config.js",'all','',true);
    wp_enqueue_script('config-script');
}

remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',6);

//thay đổi nội dung nút add to cart
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );


//hiển thị popup cart page và single page product

add_action( 'wp_ajax_nopriv_my_ajax', 'my_ajax' );
add_action( 'wp_ajax_my_ajax', 'my_ajax' );
function my_ajax() {
    $id = intval( $_POST['p_id'] );
//    echo $id;
    echo '<div class="show-quick-view"><div class="quick-view-bg"></div><div id="quick-view"><button title="Close (Esc)" type="button" class="close">×</button>';
    echo do_shortcode('[product_page id="'.$id.'"]');
    echo '</div></div>';
    wp_die();
}
add_action( 'wp_ajax_nopriv_my_ajax1', 'my_ajax1' );
add_action( 'wp_ajax_my_ajax1', 'my_ajax1' );
//xem nhanh sản phầm
function my_ajax1(){
    $id = intval( $_POST['pc_id'] );
    //echo $id;
    global $woocommerce;
    $woocommerce->cart->add_to_cart($id);
    /*echo '<div class="show-quick-view"><div class="quick-view-bg"></div><div id="quick-cart"><button title="Close (Esc)" type="button" class="close">×</button>';
    echo do_shortcode('[woocommerce_cart] ');
    echo '<div class="click-prev">
            <i class="fa fa-caret-left" aria-hidden="true"></i>
            <span>Tiếp tục mua hàng</span>
           </div>';
    echo '</div></div>';*/
    $product = wc_get_product( $id );
    $product_cart=$product->get_title();
	$cart = '<div class="show-quick-view"><div class="quick-view-bg"></div><div id="quick-cart"><button title="Close (Esc)" type="button" class="close">×</button>';
    $cart.='<div class="sp_quick"><i class="fa fa-check"></i><span>Bạn vừa thêm </span><span class="sp_add">'.$product_cart.'</span><span> vào giỏ</span></div>';
    $cart.='<div class="sp_quick"><i class="fa fa-shopping-cart"></i><span>Hiện đang có </span><span class="top-number-cart">'.$woocommerce->cart->get_cart_contents_count().'</span><span> sán phẩm trong giỏ hàng</span></div>';
    $cart .= do_shortcode('[woocommerce_cart] ');
//    $cart .=   page_cart_content();
    $cart .= '<div class="click-prev"><i class="fa fa-caret-left" aria-hidden="true"></i><span>Tiếp tục mua hàng</span></div>';
    $cart .= '<div class="transform"><i class="fa fa-truck" aria-hidden="true"></i><span>Giao hàng trên toàn quốc</span></div></div></div>';
	$data['cart'] = $cart;
	$data['count'] = $woocommerce->cart->get_cart_contents_count();
    wp_send_json($data);

}


function page_cart_content(){
    global $woocommerce;
    global $product;
    $items = $woocommerce->cart->get_cart();
      $cart='<div class="content_cart">';

        foreach($items as $item => $values) {
            $cart.='<div class="cart_item">';
            $id=$values['product_id'];
            $variation = $values['variation_id'];
            if ($variation) {
                $cart.= get_the_post_thumbnail( $values['variation_id'], 'thumbnail' );
            } else {
                $cart.= get_the_post_thumbnail( $values['product_id'], 'thumbnail' );
            }
            $_product =  wc_get_product( $values['data']->get_id());
            $cart.= "<b>".$_product->get_title().'</b>  <br> Quantity: '.$values['quantity'].'<br>';
            $price = number_format(get_post_meta($values['product_id'] , '_price', true));
            $cart.= "  Price: ".$price."<br>";
            $cart.= '</div>';
        }
        $cart.='</div>';
        return $cart;
}


//xoá sản phẩm với ajax trong cart page

add_action( 'wp_footer', 'add_js_to_wp_wcommerce');

function add_js_to_wp_wcommerce(){ ?>
    <script type="text/javascript">

    </script>
<?php }
// hàm xoá sản phẩm
add_action( 'wp_ajax_product_remove', 'product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'product_remove' );
function product_remove() {
    global $wpdb, $woocommerce;
    session_start();
	
    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
        if($cart_item['product_id'] == $_POST['product_id'] ){
            // Remove product in the cart using  cart_item_key.
            //$woocommerce->cart->get_remove_url($cart_item_key);
            $woocommerce->cart->remove_cart_item($cart_item_key);
        }
    }



    $cart= '<button title="Close (Esc)" type="button" class="close">×</button>';
    $cart .=do_shortcode('[woocommerce_cart]');
    $data['cart'] = $cart;
    $data['count'] = $woocommerce->cart->get_cart_contents_count();
    wp_send_json($data);
//
//    $cart = '<div class="show-quick-view"><div class="quick-view-bg"></div><div id="quick-cart"><button title="Close (Esc)" type="button" class="close">×</button>';
//    $cart .= do_shortcode('[woocommerce_cart] ');
//    $cart .= '<div class="click-prev"><i class="fa fa-caret-left" aria-hidden="true"></i><span>Tiếp tục mua hàng</span></div></div></div>';
//    $data['cart'] = $cart;
//    $data['count'] = $woocommerce->cart->get_cart_contents_count();
//    wp_send_json($data);
//    print_r($woocommerce->cart->get_cart_contents_count());
//    echo json_encode(array('status' => 0));
    exit();
}

add_action( 'wp_ajax_nopriv_product_count', 'product_count' );
add_action( 'wp_ajax_product_count', 'product_count' );
function product_count()
{
   global $woocommerce;
   echo $woocommerce->cart->get_cart_contents_count();
    exit();
}
function product_recently_add()
{
    $product_id = $_POST['pr_id'];
//    echo $product_id;
    global $woocommerce;
//   echo wc_get_product($product_id );
//    echo $woocommerce->cart->get_cart_contents_count();
//    $productId = 164;return $product_id;
    $product = wc_get_product( $product_id  );
//    echo $product->get_title();
//    echo "<i class=\" close fa fa-times\" aria-hidden=\"true\"></i>";
    echo "<div class='waring'><i class=\"fa fa-times\" aria-hidden=\"true\"></i><span>Đã thêm sản phẩm vào</span> <a class='to_cart' href='/cart/'>Giỏ hàng</a></div>";

    echo "<div class='name_product'>".$product->get_title()."</div>";
//     echo   get_post_thumbnail_id( $product_id );
//    echo "<div class='price_product'>".$product->get_price_html()."</div>";
//    echo "vnsd";
    exit();
}
add_action('wp_ajax_product_recently_add', 'product_recently_add');
add_action('wp_ajax_nopriv_product_recently_add', 'product_recently_add');

function my_wc_add_cart_ajax() {

  $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $quantity = $_POST['quantity'];


   if ($variation_id) {
        WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
    } else {
       WC()->cart->add_to_cart( $product_id, $quantity);
       }

    $items = WC()->cart->get_cart(); ?>

    <h4>Giỏ hàng</h4>
    <?php foreach($items as $item => $values) {
        $_product = $values['data']->post; ?>

        <div class="dropdown-cart-wrap">
            <div class="dropdown-cart-left">
                <!-- Checks whether the product is a variation, then display the variation image. -->
                <?php $variation = $values['variation_id'];
                if ($variation) {
                    echo get_the_post_thumbnail( $values['variation_id'], 'thumbnail' );
                } else {
                    echo get_the_post_thumbnail( $values['product_id'], 'thumbnail' );
                } ?>
            </div>

            <div class="dropdown-cart-right">
                <a href="<?php echo get_the_permalink($values['product_id']);?>"><?php echo $_product->post_title; ?></a>
                <p class="count_product"> x <?php echo $values['quantity']; ?></p>
                <p class="price-product"><?php echo number_format(get_post_meta($values['product_id'] , '_price', true)); ?>&#8363;</p>
<!--                <span class="remove_product_mini">-->
<!--                     <i class=" fa fa-times-circle"></i>-->
<!--                </span>-->
                <a class="remove_product_mini" data-product_id=<?php echo  $values['product_id']; ?>>
                    <i class=" fa fa-times-circle"></i>
                </a>
            </div>

            <div class="clear"></div>
        </div>
    <?php } ?>

    <div class="dropdown-cart-wrap">
        <div class="dropdown-price">
            <span><?php echo WC()->cart->get_cart_total(); ?></span>
        </div>
        <div class="dropdown-cart-link">
            <a href="<?php echo get_home_url()?>/cart/">Xem giỏ hàng</a>
        </div>
        <div class="clear"></div>
    </div>
    <?php die();

}

add_action('wp_ajax_my_wc_add_cart', 'my_wc_add_cart_ajax');
add_action('wp_ajax_nopriv_my_wc_add_cart', 'my_wc_add_cart_ajax');

function update_mini_cart(){
    $items = WC()->cart->get_cart(); ?>

    <h4>Giỏ hàng</h4>
    <?php foreach($items as $item => $values) {
        $_product = $values['data']->post; ?>

        <div class="dropdown-cart-wrap">
            <div class="dropdown-cart-left">
                <!-- Checks whether the product is a variation, then display the variation image. -->
                <?php $variation = $values['variation_id'];
                if ($variation) {
                    echo get_the_post_thumbnail( $values['variation_id'], 'thumbnail' );
                } else {
                    echo get_the_post_thumbnail( $values['product_id'], 'thumbnail' );
                } ?>
            </div>

            <div class="dropdown-cart-right">
                <a href="<?php echo get_the_permalink($values['product_id']);?>"><?php echo $_product->post_title; ?></a>
                <p class="count_product"> x <?php echo $values['quantity']; ?></p>
                <p class="price-product"><?php echo number_format(get_post_meta($values['product_id'] , '_price', true)); ?>&#8363;</p>
                <a class="remove_product_mini" data-product_id=<?php echo  $values['product_id']; ?>>
                    <i class=" fa fa-times-circle"></i>
                </a>
            </div>

            <div class="clear"></div>
        </div>
    <?php } ?>

    <div class="dropdown-cart-wrap">
        <div class="dropdown-price">
            <span><?php echo WC()->cart->get_cart_total(); ?></span>
        </div>
        <div class="dropdown-cart-link">
            <a href="/cart/">Xem giỏ hàng</a>
        </div>
        <div class="clear"></div>
    </div>
    <?php die();
}
add_action('wp_ajax_update_mini_cart', 'update_mini_cart');
add_action('wp_ajax_nopriv_update_mini_cart', 'update_mini_cart');
//function enqueue_cart_qty_ajax() {
//
//    wp_register_script( 'cart-qty-ajax-js', get_template_directory_uri() . '/js/cart-qty-ajax.js', array( 'jquery' ), '', true );
//    wp_localize_script( 'cart-qty-ajax-js', 'cart_qty_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
//    wp_enqueue_script( 'cart-qty-ajax-js' );
//
//}
//add_action('wp_enqueue_scripts', 'enqueue_cart_qty_ajax');

function qty_cart() {
   //check_ajax_referer( 'ajax_qty_cart', 'security' );
    // Skip product if no updated quantity was posted or no hash on WC_Cart
    if( !isset( $_POST['hash'] ) || !isset( $_POST['quantity'] ) || !isset($_POST['p_id'])){
        exit;
    }

    $cart_item_key = $_POST['hash'];

    if( !isset( WC()->cart->get_cart()[ $cart_item_key ] ) ){
        exit;
    }

    $values = WC()->cart->get_cart()[ $cart_item_key ];
// echo $values;
    $_product = $values['data'];

    // Sanitize
    $quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    if ( '' === $quantity || $quantity == $values['quantity'] )
        exit;

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

    // is_sold_individually
    if ( $_product->is_sold_individually() && $quantity > 1 ) {
        wc_add_notice( sprintf( __( 'You can only have 1 %s in your cart.', 'woocommerce' ), $_product->get_title() ), 'error' );
        $passed_validation = false;
    }

    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $quantity, false );
    }
    $p_id=$_POST['p_id'];
    $product = wc_get_product( $p_id );
    $product_cart=$product->get_title();

    $product = new WC_Product( $p_id );
    //echo $p_id;
    $string = WC_Cart::get_product_subtotal( $product, $quantity );
//    echo  $string;
    $data['product'] = $string;
    // Recalc our totals
    WC()->cart->calculate_totals();
	 $total_cart= WC()->cart->get_cart_subtotal();
     $data['total_cart']= $total_cart;
     $data['product_cart']= $product_cart;
    //woocommerce_cart_totals();
	wp_send_json($data);

	exit;
}

add_action('wp_ajax_qty_cart', 'qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'qty_cart');

//remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
//add_action('woocommerce_before_shop_loop_item_title', 'new_woocommerce_template_loop_product_thumbnail', 10);
//
//function new_woocommerce_template_loop_product_thumbnail() {
//    echo '<img src="' . wp_get_attachment_image_src(get_post_thumbnail_id(), 'full') . '">';
//}

function custom_length_excerpt($length){
    return 32;
}
add_filter('excerpt_length', 'custom_length_excerpt', 999);
// hook shortcode hiển thị sản phẩm vừa xem
function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {
    // Get shortcode parameters
    extract(shortcode_atts(array(
        "per_page" => '5'
    ), $atts));
    // Get WooCommerce Global
    global $woocommerce;
    // Get recently viewed product cookies data
    $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
    $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
    // If no data, quit
    if ( empty( $viewed_products ) ) {
        return __('Không có sản phẩm nào vừa được xem!', 'rc_wc_rvp');
    }
    // Create the object
    ob_start();
    // Get products per page
    if( !isset( $per_page ) ? $number = 5 : $number = $per_page )
        // Create query arguments array
        $query_args = array(
            'posts_per_page' => $number,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'product',
            'post__in'       => $viewed_products,
            'orderby'        => 'rand'
        );
    // Add meta_query to query args
    $query_args['meta_query'] = array();
    // Check products stock status
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    // Create a new query
    $r = new WP_Query($query_args);
    // If query return results
    if ( $r->have_posts() ) {
        $content = '<ul class="rc_wc_rvp_product_list_widget">';
        // Start the loop
        while ( $r->have_posts()) {
            $r->the_post();
            global $product;
            $content .= '<li>
                <div class="content_img"><a  href="'.get_permalink().'">
                    ' . ( has_post_thumbnail() ? get_the_post_thumbnail( $r->post->ID, 'shop_thumbnail' ) : woocommerce_placeholder_img( 'shop_thumbnail' ) ) . '
                </a></div>
                 <div class="name-price-product-sidebar"><a href="'.get_permalink().'"><h3>' . get_the_title() . '</h3></a><div class="price">' . $product->get_price_html() . '</div>
                </div>
            </li>';
        }
        $content .= '</ul>';
    }
    // Get clean object
    $content .= ob_get_clean();
    // Return whole content
    return $content;
}
// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");
//thay đổi vị trí các filed trong comment form
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
//remove url comment form and comment-notes
function crunchify_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}

add_action( 'wp_ajax_nopriv_ajax_search', 'ajax_search' );
add_action( 'wp_ajax_ajax_search', 'ajax_search' );
function ajax_search()
{
    $string = $_POST['s'];
    $args = array(
        's' => $string,
//        'posts_per_page' => 4,
        'post_type' => array('product', 'post'),
    );
    $search_query = new WP_Query($args);
    if ($search_query->have_posts()) :
        echo '<div class="search-result-list">';
        ?>
        <div class="title_search">
            <h2>Sản phẩm</h2>
        </div>
            <?php
            $args1 = array(
                's' => $string,
                'posts_per_page' => 2,
                'post_type' => array('product'),
            );
            $search_query1 = new WP_Query($args1);
            while ($search_query1->have_posts()) : $search_query1->the_post();
                if (get_post_type() == "product") {
                    $_product = wc_get_product(get_the_ID());
                    ?>

                    <div class="search-result">
                        <div class="search-item-img">
                            <a href="<?php the_permalink(); ?>"><?php echo woocommerce_get_product_thumbnail(); ?></a>
                        </div>
                        <a class="link-to search-item-content" href="<?php the_permalink(); ?>">
                            <div class="search-item-detail">
                                <h4><?php the_title(); ?></h4>
                                <?php echo $_product->get_price_html(); ?>
                            </div>
                        </a>
                    </div>
                    <?php
                };
                ?>
                <?php
            endwhile;
            ?>

        <?php
        ?>
        <div class="title_search">
            <h2>Bài viết</h2>
        </div>
            <?php
            $args2 = array(
                's' => $string,
                'posts_per_page' => 2,
                'post_type' => array('post'),
            );
            $search_query2 = new WP_Query($args2);
            while ($search_query2->have_posts()) : $search_query2->the_post();
                if (get_post_type() == "post") {
//                echo "post";
                    ?>
                    <div class="search-result">
                    <div class="search-item-img">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
                    </div>
                    <a class="link-to search-item-content" href="<?php the_permalink(); ?>">
                        <div class="search-item-detail">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo wp_trim_words(get_the_excerpt(),15,'...') ?></p>
                            <!--                        --><?php //echo $_product->get_price_html();
                            ?>
                        </div>
                    </a>
                    </div>
                    <?php
                }
            endwhile;
            ?>

            <?php
        wp_reset_postdata();
        echo '</div>';
        else:
        ?>

        <div class="search-word">
                <div class="search-item-detail">
                    <h4> Hiển thị tất cả kết quả cho <span class="word_search">"<?php echo  $string ;?>"</span></h4>
                </div>
        </div>
        <?php
    endif;
    wp_die();
}
?>
<?php
//Xủ lý bài viết có lượt xem nhiều nhât
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
?>



