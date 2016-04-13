<?php
$filename = "/data/vhosts/js.client.walatao.com/svr/dolarrate/dolar.txt";
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

