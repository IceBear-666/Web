<?php
header('Content-Type: text/html; charset=utf-8');  

require('phpquery/phpQuery/phpQuery/phpQuery.php');

function object2array(&$cgi,$type=0) {
    if(is_object($cgi)) {
        $cgi = get_object_vars($cgi);
    }
    if(!is_array($cgi)) {
        $cgi = array();
    }
    foreach($cgi as $kk=>$vv) {
        if(is_object($vv)) {
            $cgi[$kk] = get_object_vars($vv);

            object2array($cgi[$kk],$type);
        }
        else if(is_array($vv)) {
            object2array($cgi[$kk],$type);
        } else {
            $v = $vv;
            $k = $kk;
            $cgi["$k"] = $v;
        }
    }
    return $cgi;
}



$html = urldecode(file_get_contents("php://input"));

file_put_contents('./log/Curve.log',date('Y-m-d H:i:s')."  ".$_GET["install"]." ".$_GET["link"]." ".$html."\n",FILE_APPEND);
if($_GET["install"] == "yes")
{
    echo $html;
}
else
{
    echo "wl_empty_callback()";
}

