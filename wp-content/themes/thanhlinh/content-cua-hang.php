<?php
//global $options;
//foreach ($options as $value) {
//    if(get_settings($value['id']) === FALSE || get_settings($value['id'])==''){
//        $$value['id'] = stripslashes($value['value']);
//    }else{
//        $$value['id'] = get_settings( $value['id'] );
//    }
//}
global $options; foreach ($options as $value) { $$value['id'] = stripslashes($value['value']);}
?>
<?php //die('kgfgerk');?>
<h1 class="entry-title padding-10"><?php the_title(); ?></h1>
<div class="entry-content">
    <div class="address_shop">
        <h1>Hệ thống cửa hàng</h1>

        <?php while (have_posts()) : the_post(); ?>
            <div class="content_address"><?php the_content(); ?></div>
        <?php endwhile; // end of the loop. ?>
    </div>
    <div id="contact-map" class="address_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.815044239468!2d105.80957861446586!3d21.000049886013905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9a047989dd%3A0xc71a3888285d097f!2zTmfDtSA0MCAtIENow61uaCBLaW5oLCBOaMOibiBDaMOtbmgsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1514146578947" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!--	<div id="contact-wrapper">-->
    <!--		<div class="contact-form">-->
    <!--			<h2 class="title-box-lh">--><?php //echo $custom_contact_title_form; ?><!--</h2>-->
    <!--			--><?php //echo do_shortcode('[contact-form-7 id="104" title="Contact form 1"]');?>
    <!--		</div>-->
    <!--		<div class="contact-address">-->
    <!--			<h2 class="title-box-lh">--><?php //echo $custom_contact_title_info; ?><!--</h2>-->
    <!--			<ul class="info-lh">-->
    <!--				<li><span>Địa chỉ : </span>--><?php //echo $custom_contact_info_dia_chi; ?><!--</li>-->
    <!--				<li><span>Email : </span>--><?php //echo $custom_contact_info_email; ?><!--</li>-->
    <!--				<li><span>Website : </span><a href="--><?php //echo $custom_contact_info_website; ?><!--">--><?php //echo $custom_contact_info_website; ?><!--</a></li>-->
    <!--				<li><span>Điện thoại : </span>--><?php //echo $custom_contact_info_dt; ?><!--</li>-->
    <!--			</ul>-->
    <!--		</div>-->
    <!--	</div>-->
</div>