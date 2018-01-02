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
<div class="slide_home">
    <div id="owl-slide" class="owl-carousel owl-theme slideshow">
        <div class="item">
            <img src="<?php echo bloginfo('template_url') . '/css/images/slide/slide-1.png'; ?>" alt="slide-1">
            <?php if ($custom_slide_caption_1 == "Sử dụng"): ?>
                <div class="carousel-caption">
                    <div class="large_text slideInRight"><?php echo $custom_slide_caption_large_1; ?></div>
                    <div class="small-text"><?php echo $custom_slide_caption_small_1; ?></div>
                </div>
            <?php endif; ?>
        </div>
        <div class="item">
            <img src="<?php echo bloginfo('template_url') . '/css/images/slide/slide-2.png'; ?>" alt="slide-2">
            <?php if ($custom_slide_caption_2 == "Sử dụng"): ?>
                <div class="carousel-caption">
                    <div class="large_text"><?php echo $custom_slide_caption_large_2; ?></div>
                    <div class="small-text"><?php echo $custom_slide_caption_small_2; ?></div>
                </div>
            <?php endif; ?>
        </div>
        <!--<div class="item">
		<img src="<?php /*echo bloginfo('template_url').'/css/images/slide/slide-3.png';*/ ?>" alt="slide-3">
		<?php /*if($custom_slide_caption_3 == "Sử dụng"): */ ?>
		<div class="carousel-caption">
			<div class="large_text"><?php /*echo $custom_slide_caption_large_3; */ ?></div>
			<div class="small-text"><?php /*echo $custom_slide_caption_small_3; */ ?></div>
		</div>
		<?php /*endif; */ ?>
	</div>-->
    </div>
</div>
<script defer="defer" src="<?php bloginfo('template_url')?>/slider/owl.carousel.min.js"></script>
<script>
	waitJquery(function(){
		function getRandomAnimation(){
			var animationList = ['slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight','rotateIn','bounceInDown']; 
			return animationList[Math.floor(Math.random() * animationList.length)];
		}
		var owl = jQuery('#owl-slide');
		owl.owlCarousel({
			nav:true,
//			autoHeight:true,
			items:1,
			loop:true,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
//            touchDrag:false,
            mouseDrag:false,
			animateOut: 'fadeOut',
		/*	animateIn: 'slideInLeft'*/
		});		
		owl.on('changed.owl.carousel', function(event) {
			jQuery('.carousel-caption .large_text').css({"animation":"2s ease 0s "+getRandomAnimation()});
			jQuery('.carousel-caption .small-text').css({"animation":"2s ease 0s "+getRandomAnimation()});
		});
	});
</script>