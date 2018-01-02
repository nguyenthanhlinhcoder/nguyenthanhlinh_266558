waitJquery(function () {
    jQuery(".content_category .item-post:nth-child(2)").after("<div style='width: 100%;color: black;float: left;border-bottom: 1px solid #ddd;margin-bottom: 20px;'></div>");
    jQuery(".category  .type-post:nth-child(5)").after("<div style='width: 100%;color: black;float: left;border-bottom: 1px solid #fff;margin-bottom: 20px;'></div>");
    jQuery(".btn-navbar-left").click(function () {
       
      var position = jQuery(".menu_left").position();
        var width_menu=jQuery(".menu_left").width();
        if(position.left==0){
            jQuery(".menu_left").css('left',"-275px");
            jQuery(".btn-navbar-left").css('left',"0");
            jQuery(".bg-menu").css('display','none');
            jQuery(".full-menubar").removeAttr("style");
            jQuery('body').removeAttr("style");
        }
        else {
             jQuery('body').css('overflow','hidden');
            jQuery(".menu_left").css('left',"0px");
            jQuery(".btn-navbar-left").css('left',width_menu);
            jQuery(".bg-menu").css('display','block');
            jQuery('.full-menubar').css('-webkit-transform','inherit');
        }

    });
    jQuery(".recently_view_product .heading_box a").removeAttr("href");
    function on_sale() {
        var img=jQuery(' #content .single-sp-th .images').outerWidth()-75;
        jQuery(' #content .single-sp-th span.onsale').css({left:img});
        // console.log(img);

    }
    jQuery(window).on('resize',on_sale);
    //sidebar right toggle
    jQuery(document).on('click','#filter_sidebar',function () {

        var position_sidebar = jQuery("#sibar-left").position();
        var sidebar=jQuery("#sibar-left").width();
        var container=jQuery(window).width();
        var sidebar_right=container-(position_sidebar.left+sidebar);
        var local=sidebar_right+"px";
        if(sidebar_right==0){
            jQuery("#sibar-left").animate({right:-sidebar+"px"},500);
            jQuery("#filter_sidebar").animate({right:0+"px"},500);
        }
        else {
            jQuery("#sibar-left").animate({right:0+"px"},500);
            jQuery("#filter_sidebar").animate({right:sidebar+"px"},500);
        }

    })
    jQuery(".menu_more").click(function () {
     jQuery(".content_more").toggle();
    })
    function change_resize_slide() {
        var width_slide=jQuery(".slide_home .owl-carousel .owl-item img").width();
       jQuery('.slide_home .owl-carousel .owl-item img').height(width_slide*(609/1758));
        var position_sidebar = jQuery("#sibar-left").position();
        var sidebar=jQuery('#sibar-left').width();
        var container=jQuery(window).width();
        // var sidebar_right=container-(position_sidebar.left+sidebar);
        // console.log(sidebar_right);
        // if(sidebar_right==0){
        //     jQuery('#filter_sidebar').css({right:sidebar});
        // }
        // if(sidebar_right<0) {
        //     jQuery('#filter_sidebar').css({right:sidebar});
        // }

         // console.log(sidebar);
    }
    jQuery(window).on('resize scroll',change_resize_slide);
    function change_size_thumb_slide_post() {
        // var img_post_sl=jQuery(".post_new_slide_catgory .thumbnail_item_slide img").width();
        // jQuery(".post_new_slide_catgory .thumbnail_item_slide img").height(img_post_sl);
        var img_page_category=jQuery(".content-news-page>a>img").width();
         jQuery(".content-news-page>a>img").height((4.95*img_page_category)/6);
    }
    jQuery(window).on('resize scroll',change_size_thumb_slide_post);
    jQuery(window).trigger("resize");
    function headerScroll() {
        var width_window=jQuery(window).width();
        var scrlltop= jQuery(window).scrollTop();
        var full_header= jQuery(".full-header");
        var full_menubar= jQuery(".full-menubar");
        var go_to_header=jQuery(".go_to_header");
        var fullheader =jQuery(".full-header").position().top;
        // console.log(fullheader);

        if(scrlltop>35){
            full_menubar.removeAttr('style');
            full_menubar.css('position','fixed');

        }else {
            full_menubar.removeAttr('style');
            full_menubar.css('-webkit-transform','inherit');

        }
        // console.log(scrlltop);
        if(scrlltop>250){
            go_to_header.css('display','block');

        }else {
            go_to_header.css('display','none');
        }

    }
    // //tab mua nhanh ở trang chi tiết sản phẩm
    // jQuery(this).on('scroll resize',headerScroll);
    function tab_buy() {

        var width_tab=jQuery(".single-product .wc-tabs-wrapper").outerWidth();
        var height_tab=jQuery(".single-product .wc-tabs-wrapper").outerHeight();
        var height_quick_tab_buy=jQuery(".tab_quick_buy").outerHeight();

        if(jQuery(".single-product .wc-tabs-wrapper").position()!=null){
            var top_tab=jQuery(".single-product .wc-tabs-wrapper").position().top;
        }
        if(jQuery(".single-product .wc-tabs-wrapper").offset()){
            var left_tab=jQuery(".single-product .wc-tabs-wrapper").offset().left;
        }

        var top_window= jQuery(window).scrollTop();
        if (top_window>top_tab-50 && top_window<top_tab+height_tab-height_quick_tab_buy+30){
            jQuery(".tab_quick_buy").css({"position":"fixed","top":"60","left":left_tab+width_tab+(3*width_tab)/79+"px","width":(18*width_tab)/79+"px"});
            // alert("lksdfgn")
        }
        else {
            jQuery(".tab_quick_buy").removeAttr('style');
        }
        // console.log(width_tab);
        // console.log(left_tab);
    }
    jQuery(this).on('scroll resize',tab_buy);

    jQuery(this).trigger('scroll');

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    jQuery('.go_to_header').click(function (e) {
        var scrlltop= jQuery(window).scrollTop();
        // alert(scrlltop);
        e.preventDefault();
        jQuery('html,body').animate({ scrollTop: 0 }, 500);
        return false;
    });
    jQuery('.input_send_mail .submit_email').click(function () {
        var input_email=jQuery('.input_send_mail .your-email .wpcf7-email').val();
        var submit=jQuery('.input_send_mail .wpcf7-submit');
        var error='<span style="color: red" class="error_sb_mail">Email bạn vừa nhập không đúng định dạng!</span>';
        jQuery('.input_send_mail>.wpcf7 span').remove('.error_sb_mail');
        if(!validateEmail(input_email)){

            jQuery('.input_send_mail>.wpcf7').append(error);
            // // alert(input_email);
        }else {
            submit.trigger('click');
        }


    });
	/*jQuery(".wpcf7-form" ).submit(function( event ) {

	  event.stopPropagation()
	  event.preventDefault();
	   alert( "Handler for .submit() called." );
	});*/
    jQuery('.input_send_mail .wpcf7-text').bind("keypress",function (e) {

		if (e.which == 13) {
            var input_email=jQuery('.input_send_mail .your-email .wpcf7-email').val();
            var submit=jQuery('.input_send_mail .wpcf7-submit');
            var error='<span style="color:red" class=" error_sb_mail">Email bạn vừa nhập không đúng định dạng!</span>';
            jQuery('.input_send_mail>.wpcf7 span').remove('.error_sb_mail');
            if(!validateEmail(input_email)){
                jQuery('.wpcf7-form').submit(function(){return false;});
                jQuery('.input_send_mail>.wpcf7').append(error);
            }
		}
        // jQuery('.wpcf7-form invalid').submit(function (envent) {
        //     event.preventDefault();
        //     event.stopPropagation();
        //     return false;
        // });
		   //e.preventDefault();
       // e.stopPropagation();




    });
    jQuery(document).on("click","#sibar-left .filter-wapper .heading_box",function () {
        jQuery(this).siblings(".block-content").slideToggle(500);
    });
    jQuery(document).on("click","#sibar-left .filter-wapper .block-content .heading_box",function () {
        jQuery(this).siblings("ul").slideToggle(400);
        jQuery(this).siblings("form").slideToggle(400);
    });
    jQuery(document).on("click",".block-left.category-wapper .menu-item-has-children",function () {

        jQuery(this).children(".sub-menu").slideToggle(400);
    });
    jQuery(".content_address li a").click(function (e) {
        e.preventDefault();
        var value=jQuery(e.currentTarget).attr('href');
        // var value=jQuery(e.currentTarget).text();
        jQuery('.address_map').html(value);
        // console.log(value);
    })
    jQuery(document).on("click",".images .attachment-shop_thumbnail",function (e) {
        e.preventDefault();
        e.stopPropagation();
        // return false;
        var link_img= jQuery(e.currentTarget).closest(".thumbnails .zoom").attr('href');
         console.log(link_img);
       var img_single = jQuery(this).closest('.images').find('.woocommerce-main-image>.attachment-shop_single ');
        img_single.attr('src', link_img);
        img_single.attr('srcset', link_img);
       console.log(img_single.attr('src'));

    })
});