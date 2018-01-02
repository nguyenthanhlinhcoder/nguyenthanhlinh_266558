<?php
$options_new = array (
	array(	"name" => "Thiết lập trang list",
			"type" => "title"),
	array(	"name" => "Hiện popup thông tin",
			"desc" => "Cài đặt hiển thị thông tin sản phẩm khi di chuột vào sản phẩm trong trang list.",
            "id" => $shortname."_show_popup_list_page",
			"options" => array("Show Popop Up","Hide Popop Up"),
			"value" => "Show Popop Up",
            "type" => "select"),
);
$options=array_merge($options,$options_new);
if(array_key_exists('Sản phẩm',$optionsGroup)){ $optionsGroup['Sản phẩm']=array_merge($optionsGroup['Sản phẩm'],$options_new); }else{ $optionsGroup=array_merge($optionsGroup,array('Sản phẩm'=>$options_new));}
?>