<?php
/**
 * Created by PhpStorm.
 * User: nguye_000
 * Date: 31/08/2017
 * Time: 14:49 PM
 */
?>
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
global $woocommerce;
?>
<div id="box-home">
    <div id="home-item1" class="home-item fadeLeft">
        <div id="item-home1" >
            <h3><?php echo $custom_title_1_text_1; ?></h3>
            <p><?php echo $custom_header_1_text_1; ?></p>
        </div>
    </div>
    <div  id="home-item2" class="home-item fadeLeft">
        <div id="item-home2">
            <h3><?php echo $custom_title_2_text_2; ?></h3>
            <p><?php echo $custom_header_2_text_2; ?></p>
        </div>
    </div>
    <div id="home-item3" class="home-item fadeRight">
        <div id="item-home3">
            <h3><?php echo $custom_title_3_text_3; ?></h3>
            <p><?php echo $custom_header_3_text_3; ?></p>
        </div>
    </div>
    <div id="home-item4" class="home-item fadeRight">
        <div id="item-home4">
            <h3><?php echo $custom_title_4_text_4; ?></h3>
            <p><?php echo $custom_header_4_text_4; ?></p>
        </div>
    </div>
</div>
