<?php

global $options;
foreach ($options as $value) {
	$$value['id'] = stripslashes($value['value']);
}
$arrCss = array(
			"/css/footer.css",
			"/css/content.css",
			"/css/contact.css",
			"/css/product.css",
			"/css/list.css",
			"/css/store.css",
			"/css/slide.css",
			"/slider/jquery.bxslider.css",
			"/slider/owl.carousel.min.css",
);

	foreach($arrCss as $css){
		echo '<link href="'.get_bloginfo('template_url').$css.'" rel="stylesheet" media="screen">';
	// }
}

?>

