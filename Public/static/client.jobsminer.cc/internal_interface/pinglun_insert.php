<?php
include_once "rsa.php";





$sql = file_get_contents("php://input");
echo "srvsql:".$sql;


$d5 = md5($sql);

echo "svriD5:".$d5."\n";


$key=$_GET["key"];

$key=rawurldecode($key);

echo "KEY1:".$key;

$key=str_replace(' ','+',$key);

$key = decode_rsa($key);

echo "key2:".$key;



function execute_sql($sql){
        $mysql_server_name="localhost"; 

        $mysql_username="root"; 

        $mysql_password="iwala9898";

        $mysql_database="walatao";

        // 连接到数据库

        $conn=mysql_connect($mysql_server_name, $mysql_username,$mysql_password);

        $result = mysql_db_query($mysql_database, $sql, $conn);

        mysql_free_result($result);

        mysql_close();

}

if($key != $d5){
   echo "error.....";
}
else{
   execute_sql($sql);
}
