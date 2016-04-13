<?php
require_once '../common/wlutil_2.php';

$ts = time();
$userid = isset($_GET["uid"]) ? $_GET["uid"]: 0;
$u = new walautil('user_remind', "user_remind", "t7u2tey6F" );
$u->connect();

$page = $_GET["page"];
$page_size = $_GET["pgcount"];

if($userid == 0){
	echo "[]";
	exit;
}

$tablename = "user_remind.user_price_remind_" .($userid%100);


$sql = "select pid,c_price,origion_req,location,itemid,ajaxhash,ts from ".$tablename."  where uid='".$userid."' and valid_flag=1 order by ts desc limit ".($page*$page_size).",".$page_size;

 

$result = array();

$row = $u->query('user_remind', $sql, true);
for($i = 0;  $i < count($row); $i++)
{  
    $itemid = trim($row[$i][4]);
    
    $location =  $row[$i][3];

    $arr = parse_url($location);
    $host = $arr["host"];

    if(!strstr($row[$i][5], $host)){
        continue;
    }

    $return_val = array();
	$return_val["result"] = 0;
	$return_val["operation"] = $operation;
	$return_val["price"] = 0;
	$return_val["al"] = 0;
	$return_val["index"] = $req_arr["index"];	
    $return_val["price"] = $row[$i][1];
    $return_val["al"] = 1;
    $return_val["origion_req"] = $row[$i][2];
    $return_val["ts"] = $row[$i][6];
    $return_val["hash"] = $row[$i][5];




    if(strstr($location, "www.amazon.com") && strlen($itemid) > 0){
    	$return_val["svr_location"] = "http://www.amazon.com/gp/product/".($itemid)."/ref=oh_aui_detailpage_o00_s00?ie=UTF8&psc=1";
    }else if(strstr($location, "www.amazon.co.jp")   && strlen($itemid) > 0){
        $return_val["svr_location"] = "http://www.amazon.co.jp/gp/product/".($itemid)."/ref=oh_aui_detailpage_o00_s00?ie=UTF8&psc=1";
    }else if(strstr($location, "www.amazon.de")  && strlen($itemid) > 0){
        $return_val["svr_location"] = "http://www.amazon.de/gp/product/".($itemid)."/ref=oh_aui_detailpage_o00_s00?ie=UTF8&psc=1";
    }else{
         $return_val["svr_location"] = $location;
    }      
    $result[] = $return_val;
}


echo json_encode($result);
 

?>
