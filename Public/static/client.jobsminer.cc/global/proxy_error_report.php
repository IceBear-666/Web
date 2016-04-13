<?php
header('Content-Type: text/html; charset=utf-8');  


file_put_contents('/tmp/proxy_error.log',  date('Y-m-d H:i:s',time())." ".$_GET["pid"]." ".urldecode(file_get_contents("php://input"))." ".$_GET["id"]."\n", FILE_APPEND);


