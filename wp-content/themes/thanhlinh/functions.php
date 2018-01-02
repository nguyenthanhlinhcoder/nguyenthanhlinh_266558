<?php

function _v2_var($value, $name, $layout){
	$value = str_replace('[','',$value);
	$value = str_replace(']','',$value);
	if(isset($_REQUEST['bsaction']) && $_REQUEST['bsaction']=='editthemev2'){ // Chế độ sửa
		echo $value.'<span class="nameItem"></span>';
		global $arrVar;
		if(!is_array($arrVar)) $arrVar =array();
		$status='ok';
		if(array_key_exists($name, $arrVar)) $status='isset';
		$arrVar[$name] = array('status'=>$status, 'value'=>$value, 'name'=>$name, 'layout'=>$layout);
	}else{ // Chế độ thường
		echo $value;
	}
}
// Gở bỏ menu trong admin
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'themes.php', 'customize.php');
	remove_submenu_page( 'themes.php', 'customize.php?return='. urlencode($_SERVER['REQUEST_URI']));
	// remove_submenu_page( 'index.php', 'update-core.php' );
	// remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
	// remove_submenu_page( 'plugins.php', 'plugin-install.php' );
}
add_action( 'after_setup_theme','remove_twentyeleven_options', 100 );
function remove_twentyeleven_options() {
    remove_theme_support( 'custom-background' );
}
// function style_admin_init() {
//    wp_enqueue_style( 'prefix-style', get_site_url() . '/csvr-data/admin.css' );
//    wp_enqueue_script( 'prefix-script', get_site_url() . '/csvr-data/script/admin_script.js' );
// }
// add_action( 'admin_init', 'style_admin_init' );
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Đổi tên file ảnh
function sanitize_file_name_chars($filename) {
	$sanitized_filename = remove_accents($filename); // Convert to ASCII
	$invalid = array(
		' ' => '-',
		'%20' => '-',
		'_' => '-'
	);
	$sanitized_filename = str_replace(array_keys($invalid), array_values($invalid), $sanitized_filename);
	$sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
	$sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
	$sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
	$sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
	$sanitized_filename = strtolower($sanitized_filename); // Lowercase
	return $sanitized_filename;
}
add_filter('sanitize_file_name', 'sanitize_file_name_chars', 10);


function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	//register_widget( 'Twenty_Fourteen_Ephemera_Widget' );
	register_widget( 'WP_Widget_Text_Sidebar' );

	register_sidebar( array(
		'name'          => __( 'Filter Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<div id="%1$s" class="block-left clearfix widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading_box">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );
register_nav_menus( array(
 'primary' => __( 'Primary Navigation', 'Menu Standard' ),
) );
add_theme_support( 'post-thumbnails' ); // Bật ảnh đại diện nếu ko có woo
require_once( 'functions-theme.php' );


// require_once( CSVR_ROOT. 'websites/csvr-data/functions-remove-scripts.php' ); // Gỡ script mặc định

// Đoạn mã khởi tạo dữ liệu custom
global $themename, $shortname, $options, $optionsGroup;
$themename = "Template";
$shortname = "custom";
$options = array ();
$optionsGroup= array ();
$filesf = scandir(get_template_directory().'/functions');
unset($filesf[0]);
unset($filesf[1]);
foreach($filesf as $file){
	require_once(get_template_directory().'/functions/'.$file);
}
// Đoạn mã lấy dữ liệu cũng như xử lý ngôn ngữ
global $language;
$language = '';
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('polylang/polylang.php') && function_exists('pll_current_language') &&
	pll_current_language() && pll_current_language()!='' && pll_current_language()!='vi') $language = pll_current_language();
$new_options = array(); $new_options_by_id = array(); $new_optionsGroup = array();
foreach($options as $option) {
    if(isset($option['id'])) {
        if (get_option($language . $option['id']) !== FALSE && get_option($language . $option['id']) != '') {
            $option['value'] = stripslashes(get_option($language . $option['id']));
        } elseif (get_option($option['id']) !== FALSE && get_option($option['id']) != '') {
            $option['value'] = stripslashes(get_option($option['id']));
        } else {
            $option['value'] = stripslashes($option['value']);
        }
        $new_options[] = $option;
        $new_options_by_id[$option['id']] = $option;
    }
}
$options = $new_options;
foreach($optionsGroup as $key=>$dataoptions) {
	$arrDataOfKey = array();
	foreach ($dataoptions as $itemoption) {
        if (isset($itemoption['id'])) {
            if ($itemoption['id'] != '') {
                $arrDataOfKey[] = $new_options_by_id[$itemoption['id']];
            } else {
                $arrDataOfKey[] = $itemoption;
            }
        }
    }
	$new_optionsGroup[$key] = $arrDataOfKey;
}
$optionsGroup = $new_optionsGroup;
// Kết thúc lấy ngôn nữa
function clearCache(){
	$rootSupercache = realpath(WP_CONTENT_DIR.'/cache/supercache');
//	removeDir($rootSupercache);
	@mkdir($rootSupercache);
	$rootMeta = realpath(WP_CONTENT_DIR.'/cache/meta');
//	removeDir($rootMeta);
	@mkdir($rootMeta);
	$allheader = realpath(WP_CONTENT_DIR.'/themes/thanhlinh/css/all-header.css');
	if(file_exists($allheader)) unlink($allheader);
	$allfooter = realpath(WP_CONTENT_DIR.'/themes/thanhlinh/css/all-footer.css');
	if(file_exists($allfooter)) unlink($allfooter);
}
// function removeDir($dir) {
//     if (!file_exists($dir)) return true;
//     if (!is_dir($dir)) return unlink($dir);
//     foreach (scandir($dir) as $item) {
//         if ($item == '.' || $item == '..') continue;
//         if (!removeDir($dir . DIRECTORY_SEPARATOR . $item)) return false;
//     }
//     return rmdir($dir);
// }

if ( ! function_exists( 'twentytwelve_comment' ) ) :
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

add_filter('show_admin_bar', '__return_false');
?>