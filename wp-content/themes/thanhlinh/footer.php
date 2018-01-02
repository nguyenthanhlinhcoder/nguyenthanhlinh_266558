<?php
//global $options;
//foreach ($options as $value) {
//	if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//		$$value['id'] = stripslashes($value['value']);
//	}else{
//		$$value['id'] = get_settings( $value['id'] );
//	}
//}
global $options; foreach ($options as $value) { if(isset($value['id'])){$$value['id'] = stripslashes($value['value']);}}
?> <?php if (!is_product()):?>
        <div class="btn_scroll_contact">
            <a href="tel:0987654321"><i class="fa fa-phone">Gọi ngay</i></a>

            <a href="sms:0987654321"><i class="fa fa-comment">SMS</i></a>

            <a href=""><i class="fa fa-facebook">Live chart</i></a>
        </div>
<?php endif;?>

		</div>   <!-- #inner-container -->
	</div><!-- #full-container -->
</div>
<div class="footer">
	<?php get_template_part( 'footer-main' ); ?>
    <div class="go_to_header">
        <i class="fa fa-chevron-up"></i>
    </div>
</div>
<!-- #full-container -->
<!--</div>-->
	<?php if (!is_user_logged_in()) : ?>
		<div class="wrap-for-myaccount hide">

		<div class="box-myaccount hide">
			<?php echo do_shortcode("[woocommerce_my_account]"); ?>
		</div>
        </div>
	<?php endif; ?>
<!--	--><?php //if($custom_banner_left_display=="Hiện banner left"): ?>
<!--	<div class="ads-left-body">-->
<!--		<a href="--><?php //echo $custom_banner_left_link ?><!--"><img src="--><?php //echo bloginfo('template_url').'/css/images/banner_left.png';?><!--" alt="--><?php //bloginfo('name')?><!--"/></a>-->
<!--	</div>-->
<!--	--><?php //endif; ?>
<!--	--><?php //if($custom_banner_right_display=="Hiện banner right"): ?>
<!--	<div class="ads-right-body">-->
<!--		<a href="--><?php //echo $custom_banner_right_link ?><!--"><img src="--><?php //echo bloginfo('template_url').'/css/images/banner_right.png';?><!--" alt="--><?php //bloginfo('name')?><!--"/></a>-->
<!--	</div>-->
<!--	--><?php //endif; ?>
	<div id="fb-root"></div>
<script>
waitJquery(function(){
	jQuery(window).scroll(function() {
		var top=parseInt(jQuery(window).scrollTop())+parseInt('<?php echo $custom_top_ads?>');
		jQuery('.ads-left-body, .ads-right-body').animate({
			'top':top
		},{
			duration: 300,
			queue: false,
		})
	});
});
</script>
<?php get_template_part( 'include-css-js-footer' ); ?>
<?php wp_footer(); ?>
<?php if(is_page() || is_single()){ $css = get_post_meta($post->ID, 'css'); /*if($css[0]!='') echo '<style>'.$css[0].'</style>';*/ } ?>
<?php if($custom_subiz_chat_choose=="Sử dụng"): ?>
	<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",<?php echo $custom_subiz_chat; ?>]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
<?php endif; ?>
<?php 
// $root = $_SERVER['DOCUMENT_ROOT'];
// $root = str_replace('/websites','',$root);
// require_once($root . '/csvr-edittheme.php');
?>
<?php if(function_exists('showConfigHtml')) showConfigHtml(); ?>
</body>
</html>