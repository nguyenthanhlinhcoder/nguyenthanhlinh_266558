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
<div class="full-header">
    <div class="inner-header inner">
        <header class="header" id="header">
            <div class="header-box top-link">
                <div class="header-row-left">
                    <ul class="menu-header menu-header-1">
                        <li class="first">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo $custom_header_phone ?>"><?php echo $custom_header_phone ?></a>
                        </li>
                        <span>|</span>
                        <li class="last">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:<?php echo $custom_header_email ?>"><?php echo $custom_header_email ?></a>
                        </li>
                    </ul><!--end header-menu-1-->
                </div><!--end header-row-->
                <div class="header-row-middle">
                    <form id="search-header-top" class="formsearch fa top-search " action="<?php bloginfo('url'); ?>">
                        <input type="hidden" name="post_type" value="product">
                        <input id="input-search-top" name="s" type="text" autocomplete="off" placeholder="Bạn tìm gì...">
                    </form>
                    <div id="top_search" class="ajax-search-results"></div>
                </div>
                <div class="header-row-right">
                    <?php wp_nav_menu(array('container' => false, 'menu' => 'top_header', 'menu_class' => 'menu-header menu-header-2')); ?>
                </div><!--end header-row-->
            </div><!--end header-box-->
        </header><!--end header-->
    </div><!--end inner-header-->
</div><!--end full-header-->
