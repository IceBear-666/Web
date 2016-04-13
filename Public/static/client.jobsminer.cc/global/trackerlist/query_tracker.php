<?php
error_reporting(0);
require_once '../common/wlutil_1.php';

$u = new walautil('walatao');
$u->connect();

$php_input = file_get_contents("php://input");
$req = urldecode($php_input);
$req_arr = object2array(json_decode($req));
$userid = isset($_GET["uid"]) ? $_GET["uid"] : 0;
$ship_num = $_GET["shipnum"];
$trans_ship_num = urlencode( $req_arr["transShipNum"] );
$ship_company = urlencode( $req_arr["shipComp"]);
$trans_company = urlencode( $req_arr["transCompanyName"]);
$ship_status = urlencode( $req_arr["shipStatusText"]);
$trans_status = urlencode( $req_arr["transShipStatusText"]);
$ship_short = urlencode( $req_arr["shipStatusShort"]);
$trans_short = urlencode( $req_arr["transShipStatusShort"]);


$operation = $_GET["op"];
$pid = $_GET["pid"];

$ts = time();
 
$sql = "select uid,ship_num from walatao.user_tracker_list where uid='".$_GET["uid"]."' and ship_num='".$ship_num."' and valid_flag = 1";
//var_dump($sql);
$row= $u->query('walatao', $sql , true);

$has=0;
 
$return_val["result"] = 0;
$return_val["operation"] = $operation;
$return_val["ship_num"] =  $ship_num;
$return_val["al"] = 0;
for($i = 0; $i <  count($row); $i++)
{  
    $has = 1;
    $return_val["al"] = 1;
}


$sql = '';
if($operation == "add" && $has == 0){
	$origion_req = @mysql_escape_string(htmlspecialchars($php_input));
    $sql = "insert into walatao.user_tracker_list set pid='".$pid."', uid='".$userid."',origion_req='".$origion_req."',ship_num='".$ship_num."',ts='".$ts."', trans_ship_num='".$trans_ship_num."',ship_status_detail='".$ship_status."',trans_status_detail='".$trans_status."',ship_status_short='".$ship_short."',trans_status_short='".$trans_short."',ship_company='".$ship_company."',trans_company='".$trans_company."' on duplicate key update origion_req='".$origion_req."', valid_flag=1, trans_ship_num='".$trans_ship_num."',ship_status_detail='".$ship_status."',trans_status_detail='".$trans_status."',ship_status_short='".$ship_short."',trans_status_short='".$trans_short."',ship_company='".$ship_company."',trans_company='".$trans_company."'";
//var_dump($sql);
}elseif($operation == "update" && $has == 1){
	$origion_req = @mysql_escape_string(htmlspecialchars($php_input));
    $sql = "update walatao.user_tracker_list set origion_req='".$origion_req."',ship_num='".$ship_num."',ts='".$ts."',ship_company='".$ship_company."',trans_company='".$trans_company."', valid_flag=1 where uid='".$userid."' and ship_num='".$ship_num."'";
    $return_val["result"] = 1;
//var_dump($sql);
}elseif ($operation == "del" && $userid != 0 && $has == 1){
    $sql = "update walatao.user_tracker_list set valid_flag=0 where uid='".$userid."' and ship_num='".$ship_num."'";
}

if($sql != ''){
    $u->query('walatao', $sql, false);
    file_put_contents('/tmp/user_tracker_list.log', date('Y-m-d H:i:s',time())." operation:".$operation. "  ".$sql."\n", FILE_APPEND);     
}


echo json_encode($return_val);

?>
