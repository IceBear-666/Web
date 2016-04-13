dt=`date +%Y%m%d-%H`
cd /data/vhosts/34tao.com_beian/meiyuanhuilv


wget -S "http://www.baidu.com/s?wd=%E7%BE%8E%E5%85%83%E4%BA%BA%E6%B0%91%E5%B8%81%E6%B1%87%E7%8E%87&ie=utf-8" -O tmp.txt   



huilv=`cat tmp.txt | grep "1美元=[0-9\.]*人民币" |  awk -F "<div>1美元=" '{print $2}' | awk -F "人民币元" '{print $1}'`


isright=`echo $huilv | awk '{if($1>5 && $1 < 7)print 1;else print 0;}'`


if [ $isright -eq 0 ];
then
    echo "chucuole !!!!"
    /usr/local/bin/sendEmail -s localhost  -f stat@auto.44zhe.com -t abisineer@126.com -t 275913647@qq.com -t sbear.ji@gmail.com -t liumaliang.cs@gmail.com  -u "获取汇率失败" -m "获取美元汇率失败"
     exit
fi


echo "dolar,$huilv" > /data/vhosts/js.client.walatao.com/svr/dolarrate/dolar.txt
