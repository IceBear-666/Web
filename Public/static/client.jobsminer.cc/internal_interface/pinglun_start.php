<?php


$mysql_server_name="localhost"; 

$mysql_username="root"; 

$mysql_password="iwala9898";

$mysql_database="walatao";

// 连接到数据库

$conn=mysql_connect($mysql_server_name, $mysql_username,$mysql_password);



$ts = time();

$sql = "select max(uniqid) from walatao.amazon_item_pinglun";

$result=mysql_db_query($mysql_database, $sql, $conn);
$row=mysql_fetch_row($result);
mysql_data_seek($result, 0);

$ret["result"] = 0;
$ok = 0;
while ($row=mysql_fetch_row($result))
{  
    echo $row[0];
    exit;
}





