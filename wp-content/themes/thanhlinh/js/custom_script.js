// jQuery('form#cart').submit(function(e){
//     e.preventDefault();
//     alert('prevent submit');
// });
jQuery(document).ready(function () {

	// change_total_product();
});

jQuery(document).on("click",".single-sp-th .single_add_to_cart_button",function (e) {

	e.preventDefault();
    e.stopPropagation();
	
	var product_id = jQuery(this).val();

    var variation_id = jQuery('input[name="variation_id"]').val();

    var quantity = jQuery('.quantity input[name="quantity"]').val();
    console.log(product_id+quantity);
    product_recently_add(product_id,variation_id );
    if (variation_id != '') {

        jQuery.ajax({
            dataType : "text",
            url: MyAjax.ajaxurl,
            type: 'POST',
            data: 'action=my_wc_add_cart&product_id=' + product_id + '&variation_id=' + variation_id + '&quantity=' + quantity,

            success: function (results) {
                jQuery('.cart-dropdown-inner').html(results);

                change_total_product(e);
                 // console.log(results);
            }

        });

    } else {
        jQuery.ajax ({
            url: MyAjax.ajaxurl,
            dataType : "text",
            type:'POST',
            data: 'action=my_wc_add_cart_ajax&product_id=' + product_id + '&variation_id=' + variation_id + '&quantity=' + quantity,

            success:function(results) {
            jQuery('.cart-dropdown-inner').html(results);
                change_total_product();
            // alert(results);
        }
    });
    }

});




//hiển thị popup xem nhanh sản phẩm
jQuery( document ).on( "click",".quick-view-button" ,function(event){
    event.preventDefault();
    jQuery('body').css('overflow','hidden');
    jQuery.ajax({
        type : "post",
        dataType : "text",
        url : MyAjax.ajaxurl,
        data : {action: "my_ajax", p_id : jQuery(this).closest('li').find('.add_to_cart_button').data('product_id')},
        success: function(response) {
            jQuery('body').append(response);
            addquantity();
        }
    });

});

function product_recently_add(product_id,variation_id) {
    // event.preventDefault();

    jQuery.ajax({
        type: "post",
        dataType: "text",
        url:MyAjax.ajaxurl,
        // data: 'action=product_recently_add&pr_id=' + product_id + '&var_id=' + variation_id,
        data: {action:"product_recently_add", pr_id : product_id},
        success: function (response) {
            // jQuery('body').append(response);
            console.log(response);
            jQuery('.product_recently_add').html(response);
            // alert(response);
            jQuery('.product_recently_add').css('display','block');
            setTimeout(function(){ jQuery('.product_recently_add').css('display','none'); }, 3000);

        }
    });
}
jQuery(document).on('click','.product_recently_add .fa-times',function (e) {
    jQuery('.product_recently_add').css('display','none');
});

function change_total_product(event) {
    event.preventDefault();
    jQuery.ajax({
        type: "post",
        dataType: "text",
        url: MyAjax.ajaxurl,
        data: {
            action: "product_count"},
            success: function (response) {
                // jQuery('body').append(response);
                // console.log(response);
                jQuery('.top-number-cart').html(response);
                // alert(response);

            }
        });
}


function update_mini_cart(event) {

    jQuery.ajax({
        type: "post",
        dataType: "text",
        url: MyAjax.ajaxurl,
        data: {
            action: "update_mini_cart"},
        success: function (response) {
            jQuery('.cart-dropdown-inner').html(response);

        }
    });
}


//đóng popup khi nhấn dấu X
jQuery(document).on("click","#quick-view .close, #quick-cart .close,.click-prev", function (event) {
	jQuery('.show-quick-view').remove();
    jQuery("body").removeAttr("style");
    jQuery('#quick-view').css('display', 'none');
    jQuery('.quick-view-bg').css('display','none');
    jQuery('.show-quick-view').css('display','none');
    //jQuery('body').css('overflow','scroll');

});
// mở popup khi nhấn nút mua nhanh
jQuery( document ).on( "click",".buy,.tab_quick_buy .single_add_to_cart_button" ,function(event){
    event.preventDefault();
    /*	jQuery(this).dialog();*/
    jQuery('body').css('overflow','hidden');
   if(jQuery(this).closest('li').find('.add_to_cart_button').data('product_id')){
        var p_id=jQuery(this).closest('li').find('.add_to_cart_button').data('product_id');
    }
    if(jQuery(this).val()){
        var p_id=jQuery(this).val();
    }

    console.log(p_id);
// alert(jQuery(this).closest('li').find('.add_to_cart_button').data('product_id'));
    jQuery.ajax({
        type : "post",
        dataType : "json",
        url : MyAjax.ajaxurl,
        data : {action: "my_ajax1", pc_id : p_id},
        success: function(response) {
			//console.log(response);
           jQuery('body').append(response.cart);

           addquantity();
		   jQuery('.top-number-cart').text(response.count);
            // console.log(response.cart);
        },
        complete:function () {
            update_mini_cart();
        }
    });

});

 jQuery(document).ready(function(){

    // wc_cart_params is required to continue, ensure the object exists
    // if ( typeof wc_cart_params === 'undefined' ) {
    //     return false;
    // }

    jQuery(document).on( 'change', '#quick-cart .content_cart .quantity input[type=number]', function(event) {
        event.preventDefault();
        var qty = jQuery( this ).val();
        var currentVal  = parseFloat( qty);
       // console.log(currentVal);
		 var form = jQuery(this).closest("form");
        // //$( 'div.cart_totals' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_cart_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
        var pr_id=jQuery(this).closest('.cart_item').find('.product-remove a').data('product_id');
        // alert(pr_id);
        var total_product=jQuery(this).closest('.cart_item').find('.product-subtotal');

         var item_hash = jQuery( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
         var data = {
             action: 'qty_cart',
             // security: cart_qty_ajax.ajax_qty_cart_nonce,
             quantity: currentVal,
             hash : item_hash,
             p_id : pr_id
         };
		
		jQuery.ajax( {
				type:     'POST',
				url:      MyAjax.ajaxurl,
				data:     data,
				dataType: 'json',
				success: function( response ) {
					// console.log(response);
					//console.log(response.product);
                    total_product.html(response.product);
					jQuery('.order-total .woocommerce-Price-amount ').html(response.total_cart);
					jQuery('.sp_add').html(response.product_cart);
				},
            complete:function () {
                // console.log(data.product_cart);
                change_total_product(event);
                update_mini_cart(event);
            }
			} );
        /*jQuery.post( '/wp-admin/admin-ajax.php', data, function( response ) {

            //console.log( data );
            console.log(response);
            // jQuery( 'div.cart_totals' ).replaceWith( response );
            // jQuery( 'body' ).trigger( 'qty_cart' );

        });*/


        return false;

    });
	/*jQuery('div.woocommerce').on('change', '.qty', function(){
		setTimeout(function(){
			jQuery("[name='update_cart']").trigger("click");
		},200);	
	});*/
});

jQuery(document).on("click",".product-remove .remove,.product-name .delete", function (e) {
    e.preventDefault();
    var product_id = jQuery(this).attr("data-product_id");
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url:MyAjax.ajaxurl,
        data: { action: "product_remove",
            product_id: product_id
        },
        success: function(data){
            //console.log(data);
            //alert(data);
            jQuery('.entry-content,#quick-cart').html(data.cart);
            jQuery('.top-number-cart').text(data.count);



        },
        complete:function (data) {
            update_mini_cart(e);
            // console.log(data.responseJSON.count);
            // console.log(jQuery(data.cart).find('.cart_item').length);
            // if(jQuery(data.cart).find('.cart_item').length==0)
            if(data.responseJSON.count==0){


                jQuery("body").removeAttr("style");
                jQuery('#quick-view').css('display', 'none');
                jQuery('.quick-view-bg').css('display','none');
                jQuery('.show-quick-view').css('display','none');
                jQuery('.show-quick-view').remove();

            }
        }
    });
    //return false;
});



jQuery(document).on("click",".remove_product_mini", function (e) {
    e.preventDefault();
    var product_id = jQuery(this).attr("data-product_id");
    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: MyAjax.ajaxurl,
        data: { action: "product_remove",
            product_id: product_id
        },
        success: function(data){
            //console.log(data);
            //alert(data);
            // jQuery('.entry-content,#quick-cart').html(data.cart);
            jQuery('.top-number-cart').text(data.count);

        },
        complete:function () {
          update_mini_cart(e);
        }
    });
    //return false;
});




var lastAjaxSearchValue = "",
    searchTimer = false;


// AJAX SEARCH

jQuery(document).click(function (e)
{
    var container = jQuery(".ajax-search-results");

    if (!container.is(e.target)
        && container.has(e.target).length === 0)
    {
        container.hide();
    }
});

// jQuery('#searchform input[name=s]').on('keyup', function(e) {
//     console.log("jnsdfbjsdgbvsdfjm");
// });

jQuery(document).on('keyup','.searchform input[name=s],.formsearch input[name=s],.searchform_left input[name=s]', function(e){
    // console.log("nmngsd f");
    var searchvalue = e.currentTarget.value,
        homeURL = jQuery('.ajax-search-form').attr('action');
     if(jQuery(this).val==null){
         jQuery(this).find(".ajax-search-results").css('display','none');

     }
    // alert(local);
    // console.log(local);
        console.log(searchvalue);
    clearTimeout(searchTimer);

    if (lastAjaxSearchValue != jQuery.trim(searchvalue) && searchvalue.length >= 2) {
        searchTimer = setTimeout( function() {
            ajaxSearch(e);
        }, 400);
    }
});


function ajaxSearch(e) {
    var searchInput = jQuery(e.currentTarget),
        searchValues = searchInput.parents('form').serialize() + '&action=ajax_search',
        // results = jQuery('.ajax-search-results'),
        loadingIndicator = jQuery('.search-box .ajax-loading'),
        searchIcon = jQuery('.ajax-search-submit');
    // if(jQuery(this).val==null){
    //     jQuery(this).find(".ajax-search-results").css('display','none');
    //
    // }
    // console.log(results);
    // jQuery(e.currentTarget).parent('form').siblings('.ajax-search-results').html('aaaaa');
    console.log(jQuery(e.currentTarget).parent('form').siblings('.ajax-search-results'));
    var results =jQuery(e.currentTarget).parent('form').siblings('.ajax-search-results')
    jQuery.ajax({
        url: MyAjax.ajaxurl,
        type: "POST",
        data: searchValues,
        beforeSend: function() {
            jQuery('.ajax-search-results').slideUp(200);
            searchIcon.fadeOut(300);
            setTimeout(function() {
                loadingIndicator.fadeIn(300);
            }, 300);
        },
        success: function(response) {
            if (response === 0) {
                response = "";
            } else {

                results.html(response);

            }
        },
        complete: function() {
            loadingIndicator.fadeOut(300);
            setTimeout(function() {
                searchIcon.fadeIn(300);
                results.slideDown(400);
            }, 300);

        }
    });
}

/*waitJquery(function(){

	if ( ! String.prototype.getDecimals ) {
		String.prototype.getDecimals = function() {
			var num = this,
				match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
			if ( ! match ) {
				return 0;
			}
			return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
		}
	}

	

	$( document ).on( 'updated_wc_div', function() {
		wcqi_refresh_quantity_increments();
	} );

	$( document ).on( 'click', '.plus, .minus', function() {
		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty'),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {
			if ( max && ( currentVal >= max ) ) {
				$qty.val( max );
			} else {
				$qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
			}
		} else {
			if ( min && ( currentVal <= min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
			}
		}

		// Trigger change event
		$qty.trigger( 'change' );
	});
	wcqi_refresh_quantity_increments();
});
function wcqi_refresh_quantity_increments(){
		$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
	}*/