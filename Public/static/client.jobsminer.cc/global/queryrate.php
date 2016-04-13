<?php

$filename = "";
if($_GET["fh"] == "www_amazon_de"){
	$filename = "/data/vhosts/js.client.walatao.com/svr/EUR/eur.txt";	
}	
else if($_GET["fh"] == "www_amazon_co_jp"){
	$filename = "/data/vhosts/js.client.walatao.com/svr/jp/jp.txt";
}
else{
	$filename = "/data/vhosts/js.client.walatao.com/svr/dolarrate/dolar.txt";
}
$handle = fopen($filename, "r");
$contents = fread($handle, filesize ($filename));
fclose($handle);

if(strpos($contents, "olar") != 0)
{
	echo $contents;
}
else
{
	echo "dolar,6.1";
}
?>

