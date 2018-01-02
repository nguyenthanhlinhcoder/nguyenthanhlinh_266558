<?php

global $options;
foreach ($options as $value) {
	$$value['id'] = stripslashes($value['value']);
}
$arrCss = array(
			"/css/layout.css",
			"/css/header.css",
			"/css/menubar.css",
			"/css/sidebar.css",
			"/css/search.css",
			"/css/tagstyle.css",
			"/css/font-awesome.css",
			"/css/font-awesome.min.css",
			"/css/font-glyphicon.css",
			"/css/home.css"
);

	foreach($arrCss as $css){
		echo '<link href="'.get_bloginfo('template_url').$css.'" rel="stylesheet" media="screen">';

}
?>
