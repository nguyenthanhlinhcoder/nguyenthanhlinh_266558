<?php 
header('Content-type: text/css; charset: UTF-8');
header('Cache-Control: must-revalidate');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
$url = $_REQUEST['url'];
?>
#pagination li.page.selected, #pagination li.page.selected a,
.uds-bb-position-indicator-bullets .uds-bb-bullet{
	-moz-border-radius: 99px;
	-khtml-border-radius: 99px;
	-webkit-border-radius: 99px;
	border-radius: 99px;
	behavior: url(<?php echo $url; ?>/css3.htc);
}
#header-right button{
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	behavior: url(<?php echo $url; ?>/css3.htc);
}
.searchform .btntext{
	-moz-border-radius: 0px;/*[B[]S]*/
	-khtml-border-radius: 0px;/*[B[]S]*/
	-webkit-border-radius: 0px;/*[B[]S]*/
	border-radius: 0px;/*[B[]S]*/
	behavior: url(<?php echo $url; ?>/css3.htc);
}
#menubar{
	-moz-border-radius: 0px;/*[B[]S]*/
	-khtml-border-radius: 0px;/*[B[]S]*/
	-webkit-border-radius: 0px;/*[B[]S]*/
	border-radius: 0px;/*[B[]S]*/
	behavior: url(<?php echo $url; ?>/css3.htc);
}
#megaMenu ul.megaMenu > li > a, #megaMenu ul.megaMenu > li > span.um-anchoremulator, .megaMenuToggle {
	-moz-border-radius: 3px;/*[B[]S]*/
	-khtml-border-radius: 3px;/*[B[]S]*/
	-webkit-border-radius: 3px;/*[B[]S]*/
	border-radius: 3px;/*[B[]S]*/
	behavior: url(<?php echo $url; ?>/css3.htc);
}