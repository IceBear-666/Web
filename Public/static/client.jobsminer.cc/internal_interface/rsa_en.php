<?php
include_once "./rsa.php";

$cd = urlencode( file_get_contents('./ad.txt'));
echo $cd;
echo encode_rsa($cd);
