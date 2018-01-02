<?php
/***********************************/
// Không được sửa file này
// Update: 15/3/2017
// Author: Pham Ba Quyet
// Edit: Pham Ba Quyet
/***********************************/
$options_new = array (
	array(	"name" => "Thiết lập chung",
			"type" => "title"),
	array(	"name" => "Thiết lập logo banner biểu tượng",
			"type" => "titlesmall"),
	array(	"name" => "Logo hoặc banner",
			"desc" => "Nhập đường dẫn logo hoặc banner nếu bạn muốn thay đổi...",
			"id" => $shortname."_logo",
			"value" => "/themes/thanhlinh/css/images/logo.png",
			"type" => "image"),
	array(	"name" => "Favicon, Biểu tượng",
			"desc" => "Đường dẫn tới file .ico",
			"id" => $shortname."_favicon",
			"value" => "/themes/thanhlinh/css/images/favicon.ico",
			"type" => "image"),
			
	array(	"name" => "Thiết lập cho mã nguồn",
			"type" => "title"),
			
	array("name"=>"Chế độ nén css",
		  "desc"=>"Lựa chọn",
		  "id"	=>$shortname."_zip_css",
		  "type"=>"select",
		  "options" => array("Bật chế độ nén css","Tắt chế độ nén css"),
		  "value" => "Bật chế độ nén css"),
	array("name"=>"Kiểu comment",
		  "desc"=>"Lựa chọn",
		  "id"	=>$shortname."_type_comment",
		  "type"=>"select",
		  "options" => array("Default","Facebook","Google"),
		  "value" => "Default"),
	array(	"name" => "Mã Id Google Analytics",
			"desc" => "Mã Id Google Analytics",
			"id" => $shortname."_google_analytics",
			"value" => "UA-111111-1.",
			"type" => "text"),
	array(	"name" => "Thẻ meta Webmaster tool",
			"desc" => "<meta name='google-site-verification' content='....' />",
			"id" => $shortname."_google_webmaster",
			"value" => "",
			"type" => "textarea"),
    array(	"name" => "Id mã Pixel Facebook",
			"desc" => "Id mã Pixel Facebook",
			"id" => $shortname."_pixel_facebook",
			"value" => "",
			"type" => "text"),
	array(	"name" => "Id mã Remarketing Google",
			"desc" => "Id mã Remarketing Google",
			"id" => $shortname."_remarketing_google",
			"value" => "",
			"type" => "text"),
	array(	"name" => "Id mã Subiz Chat",
			"desc" => "Id mã Subiz Chat",
			"id" => $shortname."_subiz_chat",
			"value" => "",
			"type" => "text"),
	array("name"=>"Thiết lập sử dụng subiz chat",
		  "desc"=>"Lựa chọn",
		  "id"	=>$shortname."_subiz_chat_choose",
		  "type"=>"select",
		  "options" => array("Không sử dụng","Sử dụng"),
		  "value" => "Không sử dụng"),
);
$options=array_merge($options,$options_new);
if(array_key_exists('Thiết lập chung',$optionsGroup)){ $optionsGroup['Thiết lập chung']=array_merge($optionsGroup['Thiết lập chung'],$options_new); }else{ $optionsGroup=array_merge($optionsGroup,array('Thiết lập chung'=>$options_new));}
?>