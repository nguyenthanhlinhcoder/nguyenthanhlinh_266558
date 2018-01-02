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
global $woocommerce;
?>
<div class="full_footer_connect">
    <div class="inner-container-footer">
        <div class="connect_Social ">
            <div class="send_info_mail">
                <h5>
                    <i class="fa fa-envelope-o"></i>
                    <!--                                Đăng ký nhận tin khuyến mãi-->
                    <span><?php echo $custom_title_dk_mail;?></span>
                </h5>
                <div class="input_send_mail">
                    <?php echo do_shortcode('[contact-form-7 id="39" title="Chưa có tiêu đề"]'); ?>
                    <!--                                <input type="text" >-->
                    <span class="submit_email">
                                    <i class="fa fa-paper-plane-o"></i>
                                </span>
                </div>
            </div>
            <div class="social">
                <a href="<?php echo $custom_text_1; ?>" class="facebook"><i class="fa fa-facebook"></i><i
                            class="fa fa-facebook"></i></a>
                <a href="<?php echo $custom_text_2; ?>" class="googlePlus"><i class="fa fa-google-plus"></i><i
                            class="fa fa-google-plus"></i></a>
                <a href="<?php echo $custom_text_3; ?>" class="twitter"><i class="fa fa-twitter"></i><i
                            class="fa fa-twitter"></i></a>
                <a href="<?php echo $custom_text_4; ?>" class="yahoo"><i class="fa fa-yahoo"></i><i
                            class="fa fa-yahoo"></i></a>
                <a href="<?php echo $custom_text_5; ?>" class="pinterest"><i class="fa fa-pinterest-p"></i><i
                            class="fa fa-pinterest-p"></i></a>
                <a href="<?php echo $custom_text_6; ?>" class="rss"><i class="fa fa-rss"></i><i
                            class="fa fa-rss"></i></a>
            </div>

        </div>
    </div>
</div>
	<div class="full-footer-box">
		<div class="inner-footer-box inner-container-footer">
			<div id="footer-box" class="footer-box">
				<div class="limit">
					<div class="footer-box1">
					<div>
                        <img src="<?php echo bloginfo('template_url').'/css/images/footer_logo.png'?>" alt="">
                    </div>
						<div class="footer-text">
                            <p><?php echo $custom_title_logo_footer?></p>
                        </div>
					</div>
					<div class="footer-box2">
                        <h3><?php echo $custom_footer_1_title; ?></h3>
                        <div class="footer-text-3 footer-text"><p><?php echo $custom_footer_box_info; ?></p></div>
                        <div class="footer-text-3 footer-text"><img  class="icon_contact" src="<?php echo bloginfo('template_url').'/css/images/pre_footer_icon_address.png'?>" alt=""><span><?php echo $custom_footer_box_contact; ?></span></div>
                        <div class="footer-text-3 footer-text"><img  class="icon_contact" src="<?php echo bloginfo('template_url').'/css/images/pre_footer_icon_phone.png'?>" alt=""><span><?php echo $custom_footer_box_phone; ?></span></div>
                        <div class="footer-text-3 footer-text"><img  class="icon_contact" src="<?php echo bloginfo('template_url').'/css/images/pre_footer_icon_email.png'?>" alt=""><span><?php echo $custom_email ?></span></div>

					</div>
					<div class="footer-box3">
                        <h3><?php echo $custom_footer_2_title; ?></h3>
                        <ul><?php wp_nav_menu(array('container'=>false,'menu'=>'footer-menu-2','fallback_cb'=>'nav_fallback','items_wrap'=>'%3$s')); ?></ul>
					</div>
                    <div class="footer-box4">
                        <h3><?php echo $custom_footer_3_title; ?></h3>
                        <ul><?php wp_nav_menu(array('container'=>false,'menu'=>'footer-menu-1','fallback_cb'=>'nav_fallback','items_wrap'=>'%3$s')); ?></ul>
                    </div>
                    <div class="footer-box5">
                        <div class="payment_block">
                            <h3><?php echo $custom_footer_4_title; ?></h3>
                            <img src="<?php echo bloginfo('template_url').'/css/images/card/payment_img.png'?>" alt="">
                        </div>
                        <a href="">
                            <img src="<?php echo bloginfo('template_url').'/css/images/register_img.png'?>" alt="">
                        </a>
                        
                    </div>
				</div>
			</div><!--end footer-box-->
		</div>
	</div>
	<div class="full-footer">
		<div class="inner-footer inner-container-footer">
			<footer id="footer" class="footer">

							<div class="footer1">
                                <p class=" copyright"><?php echo $custom_copyright; ?></p>
                                <p class="link_page">
                                    <a href="<?php echo $custom_link_button_left; ?>"><?php echo $custom_name_button_left; ?></a>/
                                    <a href="<?php echo $custom_link_button_right; ?>"><?php echo $custom_name_button_right; ?></a>
                                </p>
							</div>
							<div class="footer2">
                                <p class="left address"><span><?php echo $custom_address; ?></span></p>
                                <p class=" footertext"><?php echo $custom_footertext; ?></p>
							</div>

			</footer>
		</div>
	</div>