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
global $woocommerce;
?>
<div class="full-menubar">
    <div class="inner-menubar inner">
        <div class="wrap-menubar">
            <div class="header-logo">
                <a href="<?php bloginfo('url'); ?>">
                    <img src="<?php echo bloginfo('template_url') . '/css/images/logo.png'; ?>"
                         alt="<?php bloginfo('name') ?>"/>
                </a>
            </div><!--end header-logo-->
            <nav id="menubar">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <div class="nav-collapse collapse">
                                <?php wp_nav_menu(array('container' => false, 'menu' => 'primary', 'menu_class' => 'nav')); ?>
                            </div><!--/.nav-collapse -->
                            <div class="menu_left">
                                <div class="menu-collapse">
                                    <div class="box-search-left ">

                                        <form action="<?php bloginfo('url'); ?>" class="searchform_left"
                                              id="searchform_left " method="get" role="search">
                                            <input type="text" id="s" name="s" value="" autocomplete="off" placeHolder="Bạn muốn tìm gì..."
                                                   class="btntext">
                                            <input type="hidden" name="post_type" value="product">
                                        </form>
                                        <a>
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div id="menu_left_search" class="ajax-search-results"></div>
                                    </div>
                                    <?php wp_nav_menu(array('container' => false, 'menu' => 'primary', 'menu_class' => 'nav')); ?>
                                </div>
                            </div>
                            <button data-target=".nav-collapse" data-toggle="collapse"
                                    class="btn btn-navbar collapsed btn-navbar-left" type="button">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="bg-menu"></div>

                        </div>
                    </div>
                </div>
            </nav><!-- menubar -->
            <div class="header-icon-right">
                <div class="box-search-menu ">
                    <a>
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="<?php bloginfo('url'); ?>" class="searchform" id="searchform" method="get"
                          role="search">
                        <input type="text" id="s1" name="s" value="" autocomplete="off" placeHolder="Tìm kiếm..." class="btntext">
                        <input type="hidden" name="post_type" value="product">
                    </form>
                    <div id="menu_search" class="ajax-search-results"></div>
                </div>

                <div class="header-login">
                    <a href="">
                        <i class="glyphicon glyphicon-user"></i>
                    </a>
                    <div class="login-dropdown">
                        <div class="login-dropdown-inner">
                            <a href="<?php echo get_home_url()?>/my-account">Đăng nhập/Đăng ký</a>

                        </div>
                    </div>
                </div>
                <div class="menu_more">
                    <button data-target="more-collapse" data-toggle="collapse"
                            class="btn btn-more collapsed" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="content_more">
                        <ul class="more_lh">
                            <li><span>Số điện thoại: </span><span><?php echo $custom_footer_box_phone; ?></span></li>
                            <li><span>Email: </span><span><?php echo $custom_email ?></span></li>
                        </ul>
                        <?php wp_nav_menu(array('container' => false, 'menu' => 'menu_more', 'menu_class' => 'nav')); ?>
                        <ul class="login-dropdown-inner">
                            <li><a href="<?php echo get_home_url()?>/my-account">Đăng nhập / Đăng ký </a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-cart">
                    <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="top-number-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>

                    <div class="cart-dropdown">
                        <div class="cart-dropdown-inner">
                            <?php $items = WC()->cart->get_cart();

                            if ($items) { ?>
                                <h4>Giỏ hàng</h4>

                                <?php foreach ($items as $item => $values) {
                                    ?>

                                    <div class="dropdown-cart-wrap">
                                        <div class="dropdown-cart-left">
                                            <!-- Checks whether the product is a variation, then display the variation image. -->
                                            <?php $variation = $values['variation_id'];
                                            if ($variation) {
                                                echo get_the_post_thumbnail($values['variation_id'], 'thumbnail');
                                            } else {
                                                echo get_the_post_thumbnail($values['product_id'], 'thumbnail');
                                            } ?>
                                        </div>

                                        <div class="dropdown-cart-right">
                                            <a href="<?php echo get_the_permalink($values['product_id']); ?>"><?php echo $values['data']->get_title(); ?></a>
                                            <p class="count_product"> x <?php echo $values['quantity']; ?></p>
                                            <p class="price-product"><?php echo number_format(get_post_meta($values['product_id'], '_price', true)); ?>
                                                &#8363;</p>
                                            <a class="remove_product_mini"
                                               data-product_id=<?php echo $values['product_id']; ?>>
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

                            <?php } else { ?>

                            <div class="dropdown-cart-empty">
                                <p>Chưa có sản phẩm trong giỏ!</p>
                            </div>

                            <div class="dropdown-cart-wrap">
                                <div class=" dropdown-shop-link">
                                    <a href="/shop/">Vào cửa hàng</a>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
<script>
    waitJquery(function () {
        jQuery("<span class='icon_menu_left no_dropdown'>+</span>").insertAfter(".menu_left .menu-item-has-children>a");
        jQuery(document).on("click", ".icon_menu_left", function (e) {
			console.log(e.target);
            jQuery(this).siblings(".menu_left .sub-menu").slideToggle('5000',"swing", function () {
				
			});
            var icon = jQuery(this).text();
				if (icon == "-") {
					//$(this).replaceWith("<span class='icon_menu_left drop_down'>+</span>");
					$(this).text("+");
				} else {
					//$(this).replaceWith("<span class='icon_menu_left drop_down'>-</span>");
					$(this).text("-");
				}
//                $(this).replaceWith( "<span class='icon_menu_left drop_down'>-</span>" );
        });
//            jQuery('#searchform input[name=s]').on('keyup', function(e) {
//                console.log("jnsdfbjsdgbvsdfjm");
//            })
    });

</script>
