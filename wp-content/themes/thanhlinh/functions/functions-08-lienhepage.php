<?php
$options_new = array (
	array(	"name" => "Url google map",
			"desc" => "Địa chỉ google map",
			"id" => $shortname."_contact_map",
			"value"=>" <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.815044239468!2d105.80957861446586!3d21.000049886013905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9a047989dd%3A0xc71a3888285d097f!2zTmfDtSA0MCAtIENow61uaCBLaW5oLCBOaMOibiBDaMOtbmgsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1514146578947\" width=\"100%\" height=\"500\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>",
			"type" => "textarea"),
	array(	"name" => "Tiêu đề contact form",
			"desc" => "Nhập tiêu đề...",
			"id" => $shortname."_contact_title_form",
			"value"=>'Liên hệ với chúng tôi ',
			"type" => "text"),
	array(	"name" => "Tiêu đề hộp thông tin liên hệ",
			"desc" => "Nhập tiêu đề...",
			"id" => $shortname."_contact_title_info",
			"value"=>'Nguyễn Thanh Linh',
			"type" => "text"),
    array(	"name" => "Tên Công Ty",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_contact_info_company",
        "value"=>'Công ty TNHH Keysky',
        "type" => "text"),
	array(	"name" => "Địa chỉ liên hệ",
			"desc" => "Nhập tiêu đề...",
			"id" => $shortname."_contact_info_dia_chi",
			"value"=>'Số 36, Ngõ 1, Đình Thôn, Mỹ Đình, Hà Nội',
			"type" => "text"),
			
	array(	"name" => "Email liên hệ",
			"desc" => "Nhập tiêu đề...",
			"id" => $shortname."_contact_info_email",
			"value"=>'hotro@keyweb.vn',
			"type" => "text"),
			
//	array(	"name" => "Website liên hệ",
//			"desc" => "Nhập tiêu đề...",
//			"id" => $shortname."_contact_info_website",
//			"value"=>'http://keyweb.vn',
//			"type" => "text"),
			
	array(	"name" => "Điện thoại liên hệ",
			"desc" => "Nhập tiêu đề...",
			"id" => $shortname."_contact_info_dt",
			"value"=>'0981 759 726',
			"type" => "text"),
			
);
$options=array_merge($options,$options_new);
if(array_key_exists('Trang liên hệ',$optionsGroup)){ $optionsGroup['Trang liên hệ']=array_merge($optionsGroup['Trang liên hệ'],$options_new); }else{ $optionsGroup=array_merge($optionsGroup,array('Trang liên hệ'=>$options_new));}
?>