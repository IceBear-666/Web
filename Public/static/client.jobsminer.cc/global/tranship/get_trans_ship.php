<?php

if($_GET["fromhost"] == "www_amazon_de"){
	echo file_get_contents('login_ship_addr_de.json');
}else if($_GET["fromhost"] == "www_amazon_co_jp"){
	echo file_get_contents('login_ship_addr_jp.json');
}else{
	echo file_get_contents('login_ship_addr.json');
}

exit;

?>
