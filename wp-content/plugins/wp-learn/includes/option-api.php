<?php
// Hàm bổ sung menu con vào một menu cha
function add_submenu_options()
{
    add_submenu_page(
            'themes.php', // Menu cha
            'Tuỳ biến giao diện', // Tiêu đề của menu
            'Tuỳ biến giao diện', // Tên của menu
            'manage_options',// Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
            'theme-options', // Slug của menu
            'access_menu_options' // Hàm callback hiển thị nội dung của menu
    );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style(){

	wp_register_style('input-style',  plugins_url('wp-learn')."/asset/admin.css",'all');
    wp_enqueue_style('input-style');
}
 
// Hàm xử lý khi click vào menu
function access_menu_options()
{
	 // if (!empty($_POST['save-theme-option']))
  //   {
  //       $email = $_POST['email'];
  //       $pass = $_POST['password'];
         
  //       // Cập nhật (nếu chưa có thì hệ thống tự thêm mới)
  //       update_option('mailer_gmail_username', $email);
  //       update_option('mailer_gmail_password', $pass);
  //   }
     

	 // $email = get_option('mailer_gmail_username');
  //   $pass = get_option('mailer_gmail_password');
    require('template/theme-option.php');
}
 
// Thêm hành động hiển thị menu con vào Action admin_menu Hooks
add_action('admin_menu', 'add_submenu_options');
?>