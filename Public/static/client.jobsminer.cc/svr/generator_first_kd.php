<?php
header('Content-Type: text/html; charset=utf-8');  
$arr=array();
$arr["url"]  = "http://api1.hai0.com/kd.php?key=G00TBPg9aKAAjXZtfFeA&id=".$_GET["id"]."&num=".$_GET["num"]; 
echo json_encode($arr);
?>



