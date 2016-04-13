<?php
require_once '../common/wlutil_1.php';

$u = new walautil('walatao');
$u->connect();

$php_input = file_get_contents("php://input");
$req = urldecode($php_input);
$req_arr = object2array(json_decode($req));
$param=urlencode(json_encode($req_arr["json"]["uniq"]));
$userid = isset($_GET["uid"]) ? $_GET["uid"] : 0;

$operation = $_GET["op"];

$ts = time();

$id = $req_arr["json"]["uniq"]["id"];

$url = $req_arr["json"]["url"];

$ajaxv2hash = hash('md5',$param.$url);


$sql = "select pid,stock from walatao.user_stock_remind where uid='".$_GET["uid"]."' and itemid='".$id."' and ajaxhash='".$ajaxv2hash."' and valid_flag = 1";

$row= $u->query('walatao', $sql , true);

$has=0;
 
$return_val["result"] = 0;
$return_val["operation"] = $operation;
$return_val["stock"] = "%e6%97%a0%e8%b4%a7";
$return_val["index"] = $req_arr["index"];
for($i = 0; $i <  count($row); $i++)
{  
    $has = 1;
    $return_val["al"] = 1;
    $return_val["stock"] = $row[$i][1];
}

if($has == 0)
{
    $return_val["al"] = 0;
}


$sql = '';
if($operation == "add" && $has == 0){
    $sql = "insert into walatao.user_stock_remind set uid='".$userid."',origion_req='".$php_input."',itemid='".$id."',location='".$url."',ajaxv='".$param."',ajaxhash='".$ajaxv2hash."',ts='".$ts."'".",stock='%e6%97%a0%e8%b4%a7' on duplicate key update last_query_ts='".$ts."',valid_flag=1";
}elseif ($operation == "del" && $userid != 0 && $has == 1){
    $sql = "update walatao.user_stock_remind set valid_flag=0 where uid='".$userid."' and itemid='".$id."' and ajaxhash='".$ajaxv2hash."'";
}

if($sql != ''){
    $u->query('walatao', $sql, false);
    file_put_contents('/tmp/amazon_stock.log', date('Y-m-d H:i:s',time())." operation:".$operation. "  ".$sql."\n", FILE_APPEND);     
}
echo json_encode($return_val);

?>
