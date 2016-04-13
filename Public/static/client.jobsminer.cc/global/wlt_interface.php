<?php
header('Content-Type: text/html; charset=utf-8');  

$action = $_GET['action'];

if( $action == 'fanyi' ){
	$word = (str_replace(' ', '%20', urlencode($_GET['word'])));
	$result = @file_get_contents('http://openapi.baidu.com/public/2.0/bmt/translate?client_id=MqwQL3izVkMazIq2hKOmWqXX&q=' . $word . '&from=auto&to=auto');
	//var_dump('http://openapi.baidu.com/public/2.0/bmt/translate?client_id=MqwQL3izVkMazIq2hKOmWqXX&q=' . $word . '&from=auto&to=auto');
	$result = json_decode($result, true);
	echo $_GET['callback'].'('. json_encode($result) .')'; 

}
