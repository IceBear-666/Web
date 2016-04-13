<?php
require_once '../common/wlutil_1.php';

$ts = time();
$userid = isset($_GET["uid"]) ? intval($_GET["uid"]): 0;
$u = new walautil('walatao');
$u->connect();

$page = intval($_GET["page"]);
$page_size = intval($_GET["pgcount"]);

if($userid == 0){
	echo "[]";
	exit;
}



$sql = "select pid,uid,origion_req from walatao.user_tracker_list where uid=".$userid." and valid_flag=1 and ship_num!='' order by ts desc  limit ".($page*$page_size).",".$page_size;


$result = array();

$row = $u->query('walatao', $sql, true);
for($i = 0;  $i < count($row); $i++)
{  
	$return_val["result"] = 0;
    $return_val["origion_req"] = $row[$i][2];
    $result[] = $return_val;
}


echo json_encode($result);
 

?>
