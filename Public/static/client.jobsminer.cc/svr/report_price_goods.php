<?php

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



function execute_sql($sql, $dbname){
 

        $mysql_server_name="localhost"; 

        $mysql_username="root"; 

        $mysql_password="iwala9898";

        $mysql_database= $dbname;

        // 连接到数据库

        $conn=mysql_connect($mysql_server_name, $mysql_username,$mysql_password);

        $result = mysql_db_query($mysql_database, $sql, $conn);

        mysql_free_result($result);

        mysql_close();

}



$req =  file_get_contents("php://input");
if(strlen($req) > 0){

}else{
  $req =  $_SERVER["QUERY_STRING"];
  $req = substr($req, strpos($req, "&%7B%22")+1);
}



$req = json_decode(urldecode($req));

$req = object2array($req);


$ts = time();
 
$sql = "insert into walatao.amazon_price_report set ts='".$ts."',host='',itemid='".$req["info"]["uniq"]["id"]."', price='".$req["ac_price"]."',param='".urlencode(json_encode($req["info"]["uniq"]))."',url='".$req["info"]["url"]."',pid='".$_GET["pid"]."',vi='".$_GET["vi"]."',browser='".$_GET["bw"]."'";



execute_sql($sql, 'walatao');


$country = 'USA';
$url = $req["info"]["url"];
$itemid = $req["info"]["uniq"]["id"];

file_put_contents('/tmp/amazon_info_report.log', date('Y-m-d H:i:s',time())." itemid:".$itemid." ".$country."\n", FILE_APPEND);

if(strlen($itemid) != 10)
	exit;

if(strstr($url, "www.amazon.co.jp"))
	$country = 'JP';
else if(strstr($url, "www.amazon.de") )
	$country = 'DE';
$sql = "insert into walatao.amazon_price_history set country='".$country."',itemid='".$itemid."',url='".$url."', insert_ts='".$ts."'  on duplicate key update query_count=query_count+1,query_ts='".$ts."'";

execute_sql($sql, 'walatao');
 

$api_table_name = '';
$countryname = '';
$refresh_country = "";
if(strstr($url, 'www.amazon.co.jp')){
    $api_table_name = 'jp_amazon_api_price_history';
    $countryname = 'JP1';
    $refresh_country = 'JP';
}else if(strstr($url, 'www.amazon.com')){
    $api_table_name = 'amazon_api_price_history';
    $countryname = 'USA1';
    $refresh_country = 'US';
}else if(strstr($url, 'www.amazon.de')){
    $api_table_name = 'de_amazon_api_price_history';
    $countryname = 'DE1';
    $refresh_country = 'DE';
}


function get_hex_by_itemid($itemid){
    $h = hash('md5',$itemid);
    $g = substr($h, 0, 2);
    return strtoupper($g);
}
if($api_table_name != ''){
    $hex = get_hex_by_itemid($itemid);
    $sql = "insert into price_history.".$api_table_name."_".$hex." set country='".$countryname."',itemid='".$itemid."',insert_ts='".$ts."'";
    execute_sql($sql, 'price_history');

    file_get_contents("http://open.walatao.com/global/refresh_amazon_price_history.php?itemid=".$itemid."&country=".$refresh_country);
}
?>
