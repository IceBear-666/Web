<?php
header('Content-Type: text/html; charset=utf-8');  
$r = array();
$non = array();
$non[] = "if (shExpMatch(host, '192.168.[0-9]+.[0-9]+')) return D;";

$r["nonproxyexp"] = $non;
$r["servers"] = array();
$s1 = array();
$s1["proxy"] = "HTTPS usa1.y700.com:8080";
$s1["speed"] = "http://usa1.y700.com:8081";
$s1d = array();

if(1){
	$n = array();
	$n["name"] = "ebags官网";
	$n["index"] = "http://www.ebags.com/";
	
	$m = array();
	$m[] = "ebags.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "A&F官网(abercrombie)";
	$n["index"] = "http://www.abercrombie.com";
	
	$m = array();
	$m[] = "abercrombie.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "Tommy Hilfiger官网";
	$n["index"] = "http://www.tommy.com";
	
	$m = array();
	$m[] = "tommy.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "CK官网(calvinklein)";
	$n["index"] = "http://explore.calvinklein.com/en_US/explore";
	
	$m = array();
	$m[] = "calvinklein.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "Kate Spade官网(katespade)";
	$n["index"] = "http://www.katespade.com";
	
	$m = array();
	$m[] = "katespade.com";
	$m[] = "edgesuite.net";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "丝芙兰SEPHORA";
	$n["index"] = "http://www.sephora.com";
	
	$m = array();
	$m[] = "www.sephora.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "NORDSTROM";
	$n["index"] = "http://shop.nordstrom.com";
	
	$m = array();
	$m[] = "nordstrom.com";
	$m[] = "nordstromimage.com";
	$n["urls"] = $m;
	$s1d[] = $n;
} 

if(1){
	$n = array();
	$n["name"] = "德国喜宝官网(hipp)";
	$n["index"] = "http://www.hipp.de";
	
	$m = array();
	$m[] = "hipp.de";
	$m[] = "cybershop.de";
	$n["urls"] = $m;
	$s1d[] = $n;
} 
 
if(1){
	$n = array();
	$n["name"] = "BELK百货";
	$n["index"] = "http://www.belk.com";
	
	$m = array();
	$m[] = "www.belk.com";
	$n["urls"] = $m;
	$s1d[] = $n;
} 

if(1){
	$n = array();
	$n["name"] = "nike美国官网";
	$n["index"] = "http://www.nike.com";
	
	$m = array();
	$m[] = "nike.com";
	$n["urls"] = $m;
	$s1d[] = $n;
} 

if(1){
	$n = array();
	$n["name"] = "hollisterco美国官网";
	$n["index"] = "http://www.hollisterco.com";
	
	$m = array();
	$m[] = "hollisterco.com";
	$n["urls"] = $m;
	$s1d[] = $n;
} 

$s1["domain"] = $s1d;
$r["servers"][] = $s1;

$s1 = array();
$s1["proxy"] = "HTTPS usa1.y700.com:8080";
$s1["speed"] = "http://usa1.y700.com:8081";
$s1d = array();

if(1){
	$n = array();
	$n["name"] = "Groupon";
	$n["index"] = "http://www.groupon.com";
	
	$m = array();
	$m[] = "www.groupon.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "Target美国官网";
	$n["index"] = "http://www.target.com";
	
	$m = array();
	$m[] = "target.com";
	$m[] = "targetimg1.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "guess美国官网";
	$n["index"] = "http://www.guess.com";
	
	$m = array();
	$m[] = "guess.com";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "asos官网";
	$n["index"] = "http://www.asos.com";
	
	$m = array();
	$m[] = "asos.com";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "tigerdirect官网";
	$n["index"] = "http://www.tigerdirect.com";
	
	$m = array();
	$m[] = "tigerdirect.com";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "steves百叶窗&墙纸";
	$n["index"] = "https://www.stevesblindsandwallpaper.com";
	
	$m = array();
	$m[] = "stevesblindsandwallpaper.com";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "普丽普莱(Puritan)官网";
	$n["index"] = "http://www.puritan.com/";
	
	$m = array();
	$m[] = "puritan.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}
if(1){
	$n = array();
	$n["name"] = "科尔士(kohls)百货公司";
	$n["index"] = "http://www.kohls.com";
	
	$m = array();
	$m[] = "kohls.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}
if(1){
	$n = array();
	$n["name"] = "sportchalet官网";
	$n["index"] = "http://www.sportchalet.com/";
	
	$m = array();
	$m[] = "sportchalet.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}

if(1){
	$n = array();
	$n["name"] = "timbuk2官网";
	$n["index"] = "http://www.timbuk2.com/";
	
	$m = array();
	$m[] = "timbuk2.com";
	$m[] = "googleapis.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}


if(1){
	$n = array();
	$n["name"] = "UGG官网";
	$n["index"] = "http://www.uggaustralia.com/";
	
	$m = array();
	$m[] = "uggaustralia.com";
	$m[] = "edgesuite.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}
if(1){
	$n = array();
	$n["name"] = "bonton官网";
	$n["index"] = "http://www.bonton.com/";
	
	$m = array();
	$m[] = "bonton.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}
if(1){
	$n = array();
	$n["name"] = "lacoste(鳄鱼)官网";
	$n["index"] = "http://www.lacoste.com/us/";
	
	$m = array();
	$m[] = "lacoste.com";
	$n["urls"] = $m;
	$s1d[] = $n;
}
if(1){
	$n = array();
	$n["name"] = "windeln.de官网";
	$n["index"] = "http://www.windeln.de/";
	
	$m = array();
	$m[] = "windeln.de";
	$n["urls"] = $m;
	$s1d[] = $n;
}

 
$s1["domain"] = $s1d;
$r["servers"][] = $s1;

////////////////////////
$s1 = array();
$s1["proxy"] = "HTTPS usa2.y700.com:8080";
$s1["speed"] = "http://usa2.y700.com:8081";
$s1d = array();

if(1){
	$n = array();
	$n["name"] = "jcpenney美国官网";
	$n["index"] = "http://www.jcpenney.com";
	
	$m = array();
	$m[] = "jcpenney.com";
	$m[] = "akamai.net";
	$n["urls"] = $m;
	$s1d[] = $n;
}


 
$s1["domain"] = $s1d;
$r["servers"][] = $s1;

echo json_encode($r);


