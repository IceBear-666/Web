<?php
require_once '../common/wlutil_2.php';

$phpinput = file_get_contents("php://input");
$req = urldecode($phpinput);
$tmp1 = json_decode($req);
$req_arr = object2array($tmp1);

//var_dump($req_arr);

$tmp1 = json_encode($req_arr["json"]["uniq"]);
$param=urlencode($tmp1);


$ts = time();
$pid = $_GET["pid"];
$id = trim($req_arr["json"]["uniq"]["id"]);

$ajx = $id;

$price = $req_arr["json"]["price"];
$nowprice = $req_arr["json"]["nowprice"] ? $req_arr["json"]["nowprice"] : $price;
$url =  trim($req_arr["json"]["url"]);
$arr = parse_url($url);
$host = $arr["host"];

$type = 0;
if(isset($req_arr["type"])){
    $type = $req_arr["type"];
}   

if(strstr($host, "amazon.")){

}else{
    $ajx = hash('md5',$url);
}

$userid = isset($_GET["uid"]) ? $_GET["uid"] : 0;
$operation = $_GET["op"];
$ajaxv2hash = $host."_".$ajx;
$u = new walautil('user_remind', "user_remind", "t7u2tey6F" );
$u->connect();

$tablename = "user_remind.user_price_remind_" .($userid%100);

$sql = "select pid,c_price,p_price from ".$tablename." where uid='".$userid."'  and ajaxhash='".$ajaxv2hash."' and valid_flag=1";

//echo $sql;




$row = $u->query('user_remind', $sql, true);
$has=0;

$return_val["al"] = 0;
$return_val["result"] = 0;
$return_val["operation"] = $operation;
$return_val["price"] = $nowprice;
$return_val["index"] = $req_arr["index"];
$return_val["hash"] = $ajaxv2hash;
for($i = 0;  $i < count($row); $i++)
{  
    $has = 1;
    $return_val["price"] = $row[$i][1];
    $return_val["al"] = 1;
    $return_val["assign_price"] = $row[$i][2];
}


$sql = '';

//echo $operation." ".$has;
if($operation == "add"){
    $sql = "insert into ".$tablename." set pid='".$pid."', type='".$type."', uid='".$userid."',itemid='".$id."',location='".$url."',origion_req='".$phpinput."',ajaxhash='".$ajaxv2hash."',ts='".$ts."'".",p_price='".$price."',c_price='".$nowprice."'"." on duplicate key update origion_req='".$phpinput."',type='".$type."' ,p_price='".$price."', last_query_ts='".$ts."',valid_flag=1";
}else if ($operation == "del" && $userid > 0 && $has == 1) {
	$sql = "update ".$tablename." set valid_flag=0 where uid='".$userid."' and itemid='".$id."' and ajaxhash='".$ajaxv2hash."'";
}else if($operation == "update" && $has == 1){
    //更新价格
    $sql = "update ".$tablename." set type='".$type."',origion_req='".$phpinput."', p_price='".$price."', last_query_ts='".$ts."',valid_flag=1 where uid='".$userid."' and itemid='".$id."' and ajaxhash='".$ajaxv2hash."'";
    $return_val["price"] = $price;
    $return_val["result"] = 1;
}else{
    if($has == 0)
        file_put_contents('/tmp/amazon_price.log', date('Y-m-d H:i:s',time())." "." operation:query, but items not exest. "."\n", FILE_APPEND); 
}

file_put_contents('/tmp/amazon_price.log', date('Y-m-d H:i:s',time())." operation:".$operation." ".$sql."\n", FILE_APPEND); 

if($sql != '')
    $u->query('user_remind', $sql, false);



echo json_encode($return_val);
 

?>
