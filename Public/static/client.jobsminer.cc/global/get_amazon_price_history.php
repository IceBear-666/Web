<?php
$refer = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'unknow';

$test_mode = true;
if(!strstr($refer, 'www.amazon') && !$test_mode){
	echo "{}";
	exit;
}

require_once 'common/wlutil_1.php';
$u = new walautil('walatao');
 
$url = urldecode($_GET["link"]);
$itemid = $u->get_amazon_id($url);

$arr = parse_url($url);
$host = $arr["host"];

$ret = array();
$ret["result"] = -1;
echo json_encode($ret);

