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
<div class="socialmedia">
	<?php if($custom_text_twitter){?>
		<a target="_blank" href="<?php echo $custom_text_twitter?>" title="<?php echo 'Twitter of us'; ?>">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-twitter.png" alt="Twitter"/>
		</a>
	<?php }if($custom_text_facebook){?>
		<a target="_blank" href="<?php echo $custom_text_facebook?>" title="<?php echo 'Facebook of us'; ?>">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-facebook.png" alt="Facebook"/>
		</a>
	<?php }if($custom_text_pinterest){?>
		<a target="_blank" href="<?php echo $custom_text_pinterest?>" title="<?php echo 'Pinterest of us'; ?>">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-pinterest.png" alt="Pinterest"/>
		</a>
	<?php }if($custom_text_youtube){?>
		<a target="_blank" href="<?php echo $custom_text_youtube?>" title="<?php echo 'Youtube of us'; ?>">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-youtube.png" alt="Youtube"/>
		</a>

	<?php }if($custom_text_rss){?>
		<a target="_blank" href="<?php echo $custom_text_rss?>" title="<?php echo 'Rss of us'; ?>">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-rss.png" alt="Rss"/>
		</a>

	<?php }if($custom_text_google){?>
		<a target="_blank" href="<?php echo $custom_text_google ?>" title="Google of us">
			<img src="<?php bloginfo('template_url')?>/css/images/socialmedia/icon-google.png" alt="google"/>
		</a>
	<?php }?>
</div>