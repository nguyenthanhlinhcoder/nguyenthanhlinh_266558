<?php
//global $options;
//foreach ($options as $value) {
//	if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//		$$value['id'] = stripslashes($value['value']);
//	}else{
//		$$value['id'] = get_settings( $value['id'] );
//	}
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
?>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="shortcut icon" href="<?php echo bloginfo('template_url')?>/css/images/favicon.ico" type="image/x-icon" />
<?php echo $custom_google_webmaster?>
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<script>function waitJquery(callbackwaitJquery) {var i=0; /* Bị lỗi gọi 2 lần nên cần biến này */var interval=setInterval(function(){if(window.jQuery){jQuery(document).ready(function(){if(i++==0){callbackwaitJquery();}clearInterval(interval);}); }},10);}</script>
<?php get_template_part( 'include-css-js-header' ); ?>
<?php wp_head(); ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo $custom_google_analytics; ?>', 'auto');
ga('send', 'pageview');

</script>
</head>
<body <?php if(is_front_page()){?><?php body_class('woocommerce'); ?><?php }else{ ?><?php body_class(); ?><?php }?>>

<div id="full-container">
	<?php get_template_part('header-main'); ?>
	<?php get_template_part('main-menu'); ?>
	<?php get_template_part('more-layout'); ?>
	<div class="full-content">
		<div class="inner-content">
			<div class="limit clearfix">
				<?php if(function_exists('topLayout')) topLayout(); ?>
			</div>
			<div id="wrap-content" class="limit clearfix">