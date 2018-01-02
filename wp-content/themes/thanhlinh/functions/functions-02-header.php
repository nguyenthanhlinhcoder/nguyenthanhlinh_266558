<?php
$options_new = array (
    array(	"name" => "Số điện Thoại ",
        "desc" => "Nhập sologan hoặc đoạn văn bản ngắn.",
        "id" => $shortname."_header_phone",
        "value" => "19001267",
        "type" => "text"),

    array(	"name" => "Email",
        "desc" => "Nhập sologan hoặc đoạn văn bản ngắn.",
        "id" => $shortname."_header_email",
        "value" => "hello@egany.com",
        "type" => "text"),

);
$options=array_merge($options,$options_new);
if(array_key_exists('Chỉnh sửa Header(Đầu trang)',$optionsGroup)){ $optionsGroup['Chỉnh sửa Header(Đầu trang)']=array_merge($optionsGroup['Chỉnh sửa Header(Đầu trang)'],$options_new); }else{ $optionsGroup=array_merge($optionsGroup,array('Chỉnh sửa Header(Đầu trang)'=>$options_new));}
?>