<?php
include_once "./rsa.php";

$d5 = md5($argv[1]);

echo urlencode(encode_rsa($d5));
