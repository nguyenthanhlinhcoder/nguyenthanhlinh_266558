<?php
$options_new = array (
    array(	"name" => "Nội dung giao hàng",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_title_infor_more0",
        "value" => "SẼ CÓ TẠI NHÀ BẠN",
        "type" => "text"),
    array(	"name" => "Thời gian nhận hàng",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_text_infor_more0",
        "value" => "Từ 1-5 ngày làm việc",
        "type" => "text"),

    array(	"name" => "Logo thông tin thêm 1",
        "desc" => "Chọn mục upload",
        "id" => $shortname."_logo_infor_more1",
        "value" => "/themes/thanhlinh/css/images/pd_policies_1.png",
        "type" => "image"),
    array(	"name" => "Tiêu đề dưới thông tin thêm 1",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_title_infor_more1",
        "value" => "MIỄN PHÍ VẬN CHUYỂN",
        "type" => "text"),
    array(	"name" => "Nội dung thông tin thêm 1",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_text_infor_more1",
        "value" => "Trên toàn quốc",
        "type" => "text"),

    array(	"name" => "Logo thông tin thêm 2",
        "desc" => "Chọn mục upload",
        "id" => $shortname."_logo_infor_more2",
        "value" => "/themes/thanhlinh/css/images/pd_policies_2.png",
        "type" => "image"),
    array(	"name" => "Tiêu đề dưới thông tin thêm 2",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_title_infor_more2",
        "value" => "ĐỔI TRẢ MIỄN PHÍ",
        "type" => "text"),
    array(	"name" => "Nội dung thông tin thêm 2",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_text_infor_more2",
        "value" => "Đổi trả miễn phí trong 7 ngày",
        "type" => "text"),

    array(	"name" => "Logo thông tin thêm 3",
        "desc" => "Chọn mục upload",
        "id" => $shortname."_logo_infor_more3",
        "value" => "/themes/thanhlinh/css/images/pd_policies_3.png",
        "type" => "image"),
    array(	"name" => "Tiêu đề dưới thông tin thêm 3",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_title_infor_more3",
        "value" => "THANH TOÁN",
        "type" => "text"),
    array(	"name" => "Nội dung thông tin thêm 3",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_text_infor_more3",
        "value" => "Thanh toán khi nhận hàng",
        "type" => "text"),

    array(	"name" => "Logo thông tin thêm 4",
        "desc" => "Chọn mục upload",
        "id" => $shortname."_logo_infor_more4",
        "value" => "/themes/thanhlinh/css/images/pd_policies_4.png",
        "type" => "image"),
    array(	"name" => "Tiêu đề dưới thông tin thêm 4",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_title_infor_more4",
        "value" => "HỖ TRỢ MUA NHANH",
        "type" => "text"),
    array(	"name" => "Số điện thoại thông tin thêm 4",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_phone_infor_more4",
        "value" => "1800 xxx",
        "type" => "text"),
    array(	"name" => "Nội dung thông tin thêm 4",
        "desc" => "Nhập tiêu đề...",
        "id" => $shortname."_text_infor_more4",
        "value" => "từ 8:30 - 21:30 mỗi ngày",
        "type" => "text"),





);
$options=array_merge($options,$options_new);
if(array_key_exists('Trang sản phẩm',$optionsGroup)){ $optionsGroup['Trang sản phẩm']=array_merge($optionsGroup['Trang sản phẩm'],$options_new); }else{ $optionsGroup=array_merge($optionsGroup,array('Trang sản phẩm'=>$options_new));}
?>