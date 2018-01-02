waitJquery(function(){
	addquantity();
});
function addquantity(){
    jQuery('<label class="number_product">Số lượng:</label>').insertBefore('.single-sp-th .quantity input');
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {


		var spinner = jQuery(this);
		var input = spinner.find('input[type="number"]'),
			btnUp = spinner.find('.quantity-up'),
			btnDown = spinner.find('.quantity-down'),
			min = input.attr('min'),
			max = input.attr('max');
		btnUp.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue >= 0) {
				 var newVal = oldValue + 1;
			} else {
				var newVal = oldValue;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});

		btnDown.click(function() {
			var oldValue = parseFloat(input.val());
            if(oldValue==min+1){
                jQuery(this).closest('.cart_item').find('.product-remove .remove').trigger("click");
            }
			if (oldValue <= min) {
				var newVal = oldValue;




			} else {
				var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});

	});
}
