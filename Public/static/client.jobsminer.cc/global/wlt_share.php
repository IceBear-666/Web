<?php
$url = $_GET['url'];
$url = base64_decode($url);
header("Location: " . $url);

