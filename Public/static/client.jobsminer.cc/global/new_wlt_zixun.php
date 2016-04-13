<?php

$host = $_GET["fh"];

if(strstr($host, "_de") || strstr($host, "_jp")){
    echo '{  
                        "zixun":[], 
                        "yhtxt":
                            {
                            "title":"专属福利  注册海淘1号仓就送100元优惠券",
                            "url":"http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRndlLndhbGF0YW8uY29tJTJGYXJ0aWNsZSUyRjI3NQ=="
                            }
       }';
}else{
    echo '{  "zixun":[],
                        "yhtxt":
                            {
                            "title":"专属福利  注册海淘1号仓就送100元优惠券",
                            "url":"http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRndlLndhbGF0YW8uY29tJTJGYXJ0aWNsZSUyRjI3NQ=="
                            }
        }';
}