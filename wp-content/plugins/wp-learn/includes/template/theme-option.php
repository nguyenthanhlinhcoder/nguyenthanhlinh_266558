<?php
/**
 * Themes administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
ini_set('display_errors', 'on');
require_once(ABSPATH.'wp-admin' . '/admin.php' );

if ( !current_user_can('switch_themes') && !current_user_can('edit_theme_options') )
    wp_die( __( 'Cheatin&#8217; uh?' ) );
require_once( ABSPATH . 'wp-admin/admin-header.php' );

?>
<?php
// Đoạn mã khởi tạo dữ liệu
global $themename, $shortname, $options, $optionsGroup, $language;

// Đoạn mã lưu dữ liệu
if(isset($_POST['save']) && $_POST['save']) {
        foreach ($options as $value) {
            if($value['type']=='image'){
                if(isset($_FILES[$value['id']])){
                    move_uploaded_file($_FILES[$value['id']]["tmp_name"],WP_CONTENT_DIR.$value['value']);
                }
            }else{
                if(isset($_REQUEST[$value['id']])) update_option($language.$value['id'], stripslashes($_REQUEST[$value['id']])); 
            }
        }
        clearCache();
        echo '<script> window.location.reload(); </script>';
}else if(isset($_POST['reset']) && $_POST['reset']){
    foreach ($options as $value) {
        delete_option($language.$value['id']); 
    }
    clearCache();
    echo '<script> window.location.reload(); </script>';

}
if(isset($_REQUEST['isajax']) && $_REQUEST['isajax']==1 && isset($_REQUEST['v3key']) && isset($_REQUEST['v3value'])){

    $language = '';
    if(isset($_REQUEST['lang']) && $_REQUEST['lang']!='' && $_REQUEST['lang']!='vi') $language = $_REQUEST['lang'];
    update_option($language.$_REQUEST['v3key'], $_REQUEST['v3value']);
    clearCache();
    die();
}
// Đoạn mã hiện cài đặt
?>
<div class="wrap-preview-template">
    <iframe src="<?php echo home_url(); ?><?php if(isset($_REQUEST['lang'])) echo '?lang='.$_REQUEST['lang']; ?>"></iframe>
</div>
<div class="wrap-setting-template">
<h3>Sửa mẫu giao diện</h3>
<?php
// echo plugins_url('theme-option.php',__FILE__)
?>
    <h2 class="v3-nav-tab-wrapper">
        <?php  foreach( $optionsGroup as $tab => $data ){
            $nametab = str_replace('(','_',str_replace(')','_',str_replace(' ','_',$tab)));
            if(isset($_REQUEST['tab'])){
                  $class = ($_REQUEST['tab'] == $tab )? ' v3-nav-tab-active' : '';
              }else{
                 $class ='';
              }
          
            if(count($data)>0) echo "<div class='v3-nav-tab$class $nametab' nametab='".$nametab."'>$tab</div>";
        }
        ?>
        <?php if(is_plugin_active('polylang/polylang.php') && function_exists('pll_current_language') && pll_current_language('name')!=''): ?>
        <div class="view_ngon_ngu">
            Bạn đang sửa theo <?php echo pll_current_language('name'); ?>
        </div>
        <?php endif; ?>
    </h2>
    <div class="setting-template">
            <form method="post" action="" enctype="multipart/form-data">
            <?php foreach ($optionsGroup as $tab=>$currentOptions) { ?>
                <div class="item-box-setting item-setting-<?php echo str_replace('(','_',str_replace(')','_',str_replace(' ','_',$tab))); ?>">
                    <h2 class="nav-tab-head"><div class="back-wrap-setting">< Trở về</div><span><?php echo $tab; ?></span></h2>
                    <div class="scrollbar-inner">
                    <?php foreach ($currentOptions as $value) {

                            switch ( $value['type'] ) {
                                case 'text': 
                                ?>        
                                <div class="row-setting">
                                    <label><?php echo $value['name']; ?></label>
                                    <input class="ajaxupdate" placeHolder="<?php echo $value['desc']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $value['value'];  ?>" />
                                </div>
                                <?php break; case 'image': ?> 
                                <div class="row-setting">
                                    <script>
                                        jQuery(document).ready(function($){
                                            setInterval(function(){
                                                if($('#<?php echo $value['id']; ?>').val()!=''){
                                                    $('.small-image.<?php echo $value['id']; ?>').html($('#<?php echo $value['id']; ?>').val());
                                                }
                                            },1000);
                                            $('.<?php echo $value['id']; ?>').click(function(){
                                                $('#<?php echo $value['id']; ?>').trigger('click');
                                            });
                                        });
                                    </script>
                                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                                    <div class="small-image <?php echo $value['id']; ?>" for="<?php echo $value['id']; ?>" title="Click vào ảnh để thay đổi">
                                        <img src="<?php echo content_url(). stripslashes ($value['value']) ?>" />
                                        <div class="large-image">
                                            <div class="notify-image">Click vào ảnh để upload ảnh thay thế!</div>
                                            <img src="<?php echo content_url(). stripslashes ($value['value']) ?>" />
                                        </div>
                                    </div>
                                    <input type="file" accept="image/gif,image/jpeg,image/png,icon/ico" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="display: none;" />
                                </div>
                                <?php break; case 'textarea': ?>
                                <div class="row-setting">
                                    <label><?php echo $value['name']; ?></label>
                                    <textarea class="ajaxupdate" placeHolder="<?php echo $value['desc']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo $value['value']; ?></textarea>
                                </div>
                                <?php break; case 'select': ?>
                                <div class="row-setting">
                                    <label><?php echo $value['name']; ?></label>
                                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                    <?php foreach ($value['options'] as $option) { ?><option<?php if($option == $value['value']) echo ' selected="selected"'; ?>><?php echo $option; ?></option><?php } ?>
                                    </select>
                                </div>
                                <?php break; case "checkbox": ?>
                                <div class="row-setting">
                                    <label><?php echo $value['name']; ?></label>
                                    <? if($value['value']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                                </div>
                                <?php break; case "title": ?>
                                <div class="row-setting-title">
                                    <?php echo $value['name']; ?>
                                </div>
                                <?php break; case "titlesmall": ?>
                                <div class="row-setting-title small">
                                    <?php echo $value['name']; ?>
                                </div>
                                <?php break; ?>
                        <?php 
                            }
                        } ?>
                    </div>
                </div>
                <?php } ?>
                <div class="submit">
                    <input name="save" class="buttonsave" type="submit" value="Lưu cài đặt" />   
                    <?php if(isset($_REQUEST['dev']) && $_REQUEST['dev']!='') echo '<input name="reset" class="buttonreset" type="submit" value="Mặc đinh" />'; ?>
                </div>
            </form>
    </div>
</div>
<script src="http://gromo.github.io/jquery.scrollbar/jquery.scrollbar.js"></script>
<script>
jQuery(document).ready(function(){

    jQuery('.wrap-preview-template iframe').css('min-height', (parseInt(window.innerHeight)-50)+'px');
    // Đoạn mã chuyển src
    function changeIf(force){
        var srcIf = jQuery('.wrap-preview-template iframe').attr('src');
        var nametab = jQuery('.item-setting-active').attr('nametab');
        var srcNew = "<?php echo  home_url(); ?>";
        if(nametab=='Trang_sản_phẩm'){ var srcNew = "<?php echo  home_url(); ?>/shop"; }
        if(nametab=='Trang_liên_hệ'){ var srcNew = "<?php echo home_url(); ?>/lien-he"; }
        if(nametab=='Trang_tin_tức'){ var srcNew = "<?php echo  home_url(); ?>/tin-tuc"; }
        if(force){
            jQuery('.wrap-preview-template iframe').attr('src', srcNew);
            return true;
        }
        if(srcIf!=srcNew){ jQuery('.wrap-preview-template iframe').attr('src', srcNew)}
    }
    // jQuery('.scrollbar-inner').scrollbar();
    jQuery('.scroll-wrapper').css('max-height', (parseInt(window.innerHeight)-150)+'px'); 
    // Hỏi trước khi khôi phục
    jQuery('.buttonreset').click(function(){
        var txt;
        var r = confirm("Cảnh báo: Khôi phục về mặc định sẽ xóa toàn bộ cài đặt trong giao diện!");
        if (r == true) {
            return true;
        } else {
            return false;
        }
    });
    // Tự động lưu texy
    jQuery('.ajaxupdate').focusout(function(){
        var v3key = jQuery(this).attr('id');
        var v3value = jQuery(this).val();
        jQuery.ajax({
            method: "POST",
            url: "<?php echo plugins_url('theme-option.php',__FILE__).'?isajax=1'; ?>",
            data: { v3key: v3key, v3value: v3value, lang: "<?php if(isset($_REQUEST['lang'])) echo $_REQUEST['lang']; ?>" }
        })
        .done(function( msg ) {
            changeIf(true);
        });
    }); 
    jQuery('.v3-nav-tab').click(function(){
        jQuery('.item-box-setting').css('display','none');
        jQuery('.setting-template').css('right','-300px');
        jQuery('.item-setting-'+jQuery(this).attr('nametab')).css('display','block');
        jQuery('.setting-template').css('display','block');
        jQuery('.item-setting-active').removeClass('item-setting-active');
        jQuery(this).addClass('item-setting-active');
        changeIf(false)
        jQuery('.setting-template').animate({
            right: "0",
        }, 200,function(){
        });     
    }); 
    jQuery('.back-wrap-setting').click(function(){
        jQuery('.setting-template').animate({
            right: "-300px",
        }, 200,function(){
            jQuery('.setting-template').css('display','none');
        });
    }); 
});
</script>

<?php require( ABSPATH . 'wp-admin/admin-footer.php' ); ?>
