<?php
require_once '../common/wlutil_1.php';

$u = new walautil('walatao');
$u->connect();

$userid = isset($_GET["uid"]) ? $_GET["uid"] : 0;
$page = $_GET["page"];
$page_size = $_GET["pgcount"];

$ts = time();

$sql = "select pid,stock,origion_req,location,itemid from walatao.user_stock_remind where uid='".$userid."' and valid_flag=1 limit ".($page*$page_size).",".$page_size;
file_put_contents('/tmp/get_user_stock_remind.log', date('Y-m-d H:i:s',time()).$sql."\n", FILE_APPEND);     

$row= $u->query('walatao', $sql , true);
 
$result = array();
for($i = 0; $i <  count($row); $i++)
{  
    $return_val = array();
	$return_val["result"] = 0;
	$return_val["operation"] = $operation;
	$return_val["stock"] = "%e6%97%a0%e8%b4%a7";
	$return_val["index"] = $req_arr["index"];
    $return_val["al"] = 1;
    $return_val["stock"] = $row[$i][1];
    $return_val["origion_req"] = $row[$i][2];
	
    $itemid = trim($row[$i][4]);
    $location = $row[$i][3];	
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
