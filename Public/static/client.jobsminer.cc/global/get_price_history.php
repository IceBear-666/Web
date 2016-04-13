<?php
error_reporting(0);
$refer = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : 'unknow';
$test_mode = false;
$refers = array(
	'6pm.com' => array('price_history', 'us_6pm'),
	'iherb.com' => array('price_history', 'us_iherb'),
	'drugstore.com' => array('price_history', 'us_drugstore'),
	'ashford.com' => array('price_history', 'us_ashford'),
	'gnc.com' => array('price_history', 'us_gnc'),
	'jomashop.com' => array('price_history', 'us_jomashop'),
	//'victoriassecret.com' => array('price_history', 'us_victoriassecret'),
	'nordstrom.com' => array('price_history', 'us_nordstrom'),
	'rakuten.co.jp' => array('price_history', 'jp_rakuten'),
);
$realUrlsTabs = array('us_gnc');
$pathUriTabs = array('us_ashford');
$needItemTabs = array('jp_rakuten');

$info = '';
foreach($refers as $key=>$val){
	if( !strstr($refer, $key) ) continue;
	$info = $val;
	break;
}

if( $info=='' ) exit('{}');

function getCurveData($info){
	global $realUrlsTabs, $pathUriTabs, $needItemTabs;
	require_once 'common/wlutil_1.php';
	$u = new walautil('walatao');
	$u->connect();
	$url = urldecode($_GET["link"]);
	$arr = parse_url($url);
	$realurl = $arr["scheme"]."://".$arr["host"].$arr["path"];
	if( in_array($info[1], $realUrlsTabs) ){
		$realurl = $url;
	}
	if( in_array($info[1], $pathUriTabs) ){
		$realurl = explode('/', $arr["path"]);
		$realurl = $realurl[count($realurl)-1];
	}
	
	if( in_array($info[1], $needItemTabs) ){
		$realurl .= substr($realurl, -1)!='/' ? '/' : '';
		$hash = hash('md5',$realurl);
		$r = $u->query($info[0], "select curve from {$info[1]} where itemid='{$hash}'", true);
	}else{
		$r = $u->query($info[0], "select curve from {$info[1]} where url like '%{$realurl}%'", true);
	}
	
	$ret = array();
	$ret["result"] = -1;
	if(count($r)  > 0){
		$ret["result"] = 0;
		$ret["curve"] = $r[0][0];
	}
	return $ret;
}

echo json_encode( getCurveData($info) );

