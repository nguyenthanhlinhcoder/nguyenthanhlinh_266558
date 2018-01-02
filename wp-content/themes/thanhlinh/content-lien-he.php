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
<h1 class="entry-title padding-10"><?php the_title(); ?></h1>
<div class="entry-content">
<!--    <div class="address_shop">-->
<!--        <h1>Hệ thống cửa hàng</h1>-->
<!--        --><?php //while (have_posts()) : the_post(); ?>
<!--            <div class="content_address">--><?php //the_content(); ?><!--</div>-->
<!--        --><?php //endwhile; // end of the loop. ?>
<!--    </div>-->
	<div id="contact-map">
        <?php echo $custom_contact_map; ?>
        	</div>
	<div id="contact-wrapper">
		<div class="contact-form">
			<h2 class="title-box-lh"><?php echo $custom_contact_title_form; ?></h2>
			<?php echo do_shortcode('[contact-form-7 id="177" title="Contact form 2"]');?>
		</div>
		<div class="contact-address">
			<h2 class="title-box-lh"><?php echo $custom_contact_title_info; ?></h2>
			<ul class="info-lh">
				<li><h2><?php echo $custom_contact_info_company; ?></h2></li>
				<li><?php echo $custom_contact_info_dia_chi; ?></li>
                <li><span>Điện thoại : </span> <span class="phone_contact"><?php echo $custom_contact_info_dt; ?></span></li>
				<li><span>Email : </span> <span class="email_contact"><?php echo $custom_contact_info_email; ?></span></li>
<!--				<li><span>Website : </span><a href="--><?php //echo $custom_contact_info_website; ?><!--">--><?php //echo $custom_contact_info_website; ?><!--</a></li>-->

			</ul>
		</div>
<!--	</div>-->
</div>