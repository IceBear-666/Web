<?php
header('Content-Type: text/html; charset=utf-8');  

require('phpquery/phpQuery/phpQuery/phpQuery.php');

function object2array(&$cgi,$type=0) {
    if(is_object($cgi)) {
        $cgi = get_object_vars($cgi);
    }
    if(!is_array($cgi)) {
        $cgi = array();
    }
    foreach($cgi as $kk=>$vv) {
        if(is_object($vv)) {
            $cgi[$kk] = get_object_vars($vv);

            object2array($cgi[$kk],$type);
        }
        else if(is_array($vv)) {
            object2array($cgi[$kk],$type);
        } else {
            $v = $vv;
            $k = $kk;
            $cgi["$k"] = $v;
        }
    }
    return $cgi;
}


$allkdgs = '{"ztsd":{"name":"\u4e2d\u901a\u901f\u9012","type":0,"url":"http:\/\/www.zto.cn\/","exid":"ztsd"},"sfsy":{"name":"\u987a\u4e30\u901f\u8fd0","type":0,"url":"http:\/\/www.sf-express.com","exid":"sfsy"},"ems":{"name":"EMS\u4e2d\u56fd\u90ae\u653f","type":0,"url":"http:\/\/www.ems.com.cn","exid":"ems"},"dhl_global":{"name":"DHL\u5168\u7403","type":1,"url":"http:\/\/dhlglobalmail.com\/","exid":"dhl_global"},"fedex":{"name":"FEDEX\u8054\u90a6\u5feb\u9012","type":1,"url":"http:\/\/www.fedex.com\/","exid":"fedex"},"ontrac":{"name":"ONTRAC","type":1,"url":"http:\/\/www.ontrac.com\/","exid":"ontrac"},"trakpak":{"name":"TrakPak","type":1,"url":"http:\/\/www.trackmytrakpak.com\/","exid":"trakpak"},"ups":{"name":"UPS","type":1,"url":"http:\/\/www.ups.com\/cn","exid":"ups"},"usps":{"name":"USPS\u7f8e\u56fd\u90ae\u653f","type":1,"url":"https:\/\/www.usps.com\/","exid":"usps"},"qfkd":{"name":"\u5168\u5cf0\u5feb\u9012","type":0,"url":"http:\/\/www.qfkd.com.cn\/","exid":"qfkd"},"gjyz":{"name":"\u56fd\u9645\u90ae\u653f\u5305\u88f9","type":0,"url":"http:\/\/intmail.11185.cn\/","exid":"gjyz"},"ytsd":{"name":"\u5706\u901a\u901f\u9012","type":0,"url":"http:\/\/www.yto.net.cn","exid":"ytsd"},"ttkd":{"name":"\u5929\u5929\u5feb\u9012","type":0,"url":"http:\/\/www.ttkdex.com\/","exid":"ttkd"},"zjs":{"name":"\u5b85\u6025\u9001","type":0,"url":"http:\/\/www.zjs.com.cn\/","exid":"zjs"},"ane":{"name":"\u5b89\u80fd\u7269\u6d41","type":0,"url":"http:\/\/www.ane56.com","exid":"ane"},"dbwl":{"name":"\u5fb7\u90a6\u7269\u6d41","type":0,"url":"http:\/\/www.deppon.com","exid":"dbwl"},"yama":{"name":"\u65e5\u672c\u5927\u548c\u8fd0\u8f93(Yamato)","type":1,"url":"http:\/\/www.kuronekoyamato.co.jp\/","exid":"yama"},"jpost":{"name":"\u65e5\u672c\u90ae\u4fbf","type":1,"url":"http:\/\/www.post.japanpost.jp\/top.html","exid":"jpost"},"bpost":{"name":"\u6bd4\u5229\u65f6\u90ae\u653f","type":1,"url":"http:\/\/www.bpostinternational.com\/en\/","exid":"bpost"},"htky":{"name":"\u6c47\u901a\u5feb\u8fd0","type":0,"url":"http:\/\/www.htky365.com","exid":"htky"},"stkd":{"name":"\u7533\u901a\u5feb\u9012","type":0,"url":"http:\/\/www.sto.cn\/","exid":"stkd"},"ndsd":{"name":"\u80fd\u8fbe\u901f\u9012","type":0,"url":"http:\/\/www.nd56.com\/","exid":"ndsd"},"nlpost":{"name":"\u8377\u5170\u90ae\u653f","type":1,"url":"http:\/\/www.postnlpakketten.nl\/","exid":"nlpost"},"sure":{"name":"\u901f\u5c14\u5feb\u9012","type":0,"url":"http:\/\/www.sure56.com\/","exid":"sure"},"yzpy":{"name":"\u90ae\u653f\u5e73\u90ae","type":0,"url":"http:\/\/yjcx.chinapost.com.cn\/","exid":"yzpy"},"ydkd":{"name":"\u97f5\u8fbe\u5feb\u9012","type":0,"url":"http:\/\/www.yundaex.com\/","exid":"ydkd"},"dhl_de":{"name":"DHL(\u5fb7\u56fd)","type":1,"url":"http:\/\/www.dhl.de\/en.html","exid":"dhl_de"},"uc56":{"name":"\u4f18\u901f\u5feb\u9012","type":0,"url":"http:\/\/www.uc56.com\/","exid":"uc56"},"dhl":{"name":"DHL(\u7f8e\u56fd)","type":1,"url":"http:\/\/www.dhl.com\/","exid":"dhl"},"tmzy":{"name":"\u5929\u9a6c\u8fc5\u8fbe\u5feb\u9012","type":2,"url":"http:\/\/www.expresstochina.com\/","exid":"tmzy"},"fdkd":{"name":"\u98de\u789f\u5feb\u9012 ","type":2,"url":"http:\/\/www.ufokuaidi.com\/","exid":"fdkd"},"bmwl":{"name":"\u6591\u9a6c\u7269\u6d41","type":2,"url":"http:\/\/www.gels2000.com\/","exid":"bmwl"},"xfkd":{"name":"\u5148\u950b\u5feb\u9012","type":2,"url":"http:\/\/www.xianfengex.com","exid":"xfkd"},"ctm":{"name":"\u8d64\u5154\u9a6c\u8f6c\u8fd0","type":2,"url":"http:\/\/www.ctmex.com\/","exid":"ctm"},"tykd":{"name":"\u5929\u7ffc\u5feb\u9012","type":2,"url":"http:\/\/www.tykd.com\/","exid":"tykd"},"sonic":{"name":"Sonic-Ex\u901f\u9012","type":2,"url":"http:\/\/www.sonic-ex.com\/","exid":"sonic"},"yqwl":{"name":"\u4e00\u67d2\u7269\u6d41","type":2,"url":"http:\/\/www.17htb.com\/","exid":"yqwl"},"tsz":{"name":"\u5510\u4e09\u85cf\u6d77\u5916\u8f6c\u8fd0 ","type":2,"url":"http:\/\/www.ship2china.com","exid":"tsz"},"boz":{"name":"\u8d25\u6b27\u6d32","type":2,"url":"http:\/\/www.8europe.com\/","exid":"boz"},"360hitao":{"name":"360hitao\u8f6c\u8fd0","type":2,"url":"http:\/\/www.360hitao.com\/","exid":"360hitao"},"yunpan":{"name":"\u4e91\u7554\u7f51","type":2,"url":"http:\/\/www.yunpanshop.com\/","exid":"yunpan"},"xckd":{"name":"\u661f\u8fb0\u5feb\u9012","type":2,"url":"http:\/\/www.xingchenex.com\/","exid":"xckd"},"mxzy":{"name":"\u7f8e\u897f\u8f6c\u8fd0","type":2,"url":"http:\/\/www.20014.com\/","exid":"mxzy"},"tnkd":{"name":"\u817e\u725b\u5feb\u9012","type":2,"url":"http:\/\/www.oxexpress.com\/","exid":"tnkd"},"zysf":{"name":"\u8f6c\u8fd0\u56db\u65b9","type":2,"url":"http:\/\/www.4px.com","exid":"zysf"},"lzwl":{"name":"\u91cf\u5b50\u7269\u6d41","type":2,"url":"http:\/\/www.qm-ex.com\/","exid":"lzwl"},"jdzy":{"name":"\u9a8f\u8fbe\u8f6c\u8fd0","type":2,"url":"http:\/\/www.jdzyusa.com\/","exid":"jdzy"},"shangteng":{"name":"\u4e0a\u817e\u5feb\u9012","type":2,"url":"http:\/\/www.shangtengex.com\/","exid":"shangteng"},"yqkd":{"name":"\u4e91\u9a91\u5feb\u9012","type":2,"url":"http:\/\/www.yunqiexp.com\/ ","exid":"yqkd"},"qmt":{"name":"\u5168\u7f8e\u901a","type":2,"url":"http:\/\/qmtexpress.com\/","exid":"qmt"},"8da":{"name":"\u516b\u8fbe\u7f51","type":2,"url":"http:\/\/8dexpress.com\/","exid":"8da"},"tjwl":{"name":"\u5929\u9645\u7269\u6d41","type":2,"url":"http:\/\/www.tj-ex.com\/","exid":"tjwl"},"azy":{"name":"\u6fb3\u8f6c\u8fd0","type":2,"url":"http:\/\/www.aozhuanyun.com\/","exid":"azy"},"hckd":{"name":"\u7693\u6668\u4f18\u9012","type":2,"url":"http:\/\/www.uschen.com\/","exid":"hckd"},"cmsd":{"name":"\u7b56\u9a6c\u901f\u9012","type":2,"url":"http:\/\/www.cema-express.com\/","exid":"cmsd"},"zcsd":{"name":"\u81f3\u8bda\u901f\u9012","type":2,"url":"http:\/\/www.trust-usexpress.com\/","exid":"zcsd"},"byeco":{"name":"\u8d1d\u6613\u8d2d","type":2,"url":"http:\/\/www.byeco.cn\/","exid":"byeco"},"ytmg":{"name":"\u8fd0\u6dd8\u7f8e\u56fd","type":2,"url":"http:\/\/www.easytocn.com\/","exid":"ytmg"},"lpzkd":{"name":"\u9886\u8dd1\u8005\u5feb\u9012","type":2,"url":"http:\/\/www.abcus.net\/","exid":"lpzkd"},"fckd":{"name":"\u98ce\u9a70\u5feb\u9012","type":2,"url":"http:\/\/www.fceship.com","exid":"fckd"},"hmkd":{"name":"\u534e\u7f8e\u5feb\u9012","type":2,"url":"http:\/\/www.hmus.net\/","exid":"hmkd"},"haitk":{"name":"365\u6d77\u6dd8\u5ba2","type":2,"url":"http:\/\/www.365htk.com\/","exid":"haitk"},"aae":{"name":"AAE\u5168\u7403\u4e13\u9012","type":2,"url":"http:\/\/cn.aaeweb.com\/","exid":"aae"},"axo":{"name":"AXO","type":2,"url":"http:\/\/www.axo-europe.com\/","exid":"axo"},"cul":{"name":"CUL\u4e2d\u7f8e\u901f\u9012","type":2,"url":"http:\/\/www.culexpress.com\/","exid":"cul"},"efs":{"name":"EFS POST","type":2,"url":"http:\/\/www.efspost.com\/","exid":"efs"},"hslzy":{"name":"HSL\u5fb7\u56fd\u8f6c\u8fd0","type":2,"url":"http:\/\/www.hslhaitao.com\/","exid":"hslzy"},"logi":{"name":"LogisticsY(iHerb)","type":2,"url":"https:\/\/logisticsy.com","exid":"logi"},"scsgo":{"name":"SCS\u56fd\u9645\u7269\u6d41","type":2,"url":"http:\/\/www.scsgogogo.net\/","exid":"scsgo"},"soho":{"name":"SOHO\u82cf\u8c6a\u56fd\u9645","type":2,"url":"http:\/\/www.thesohoex.com\/","exid":"soho"},"twc":{"name":"TWC\u8f6c\u8fd0\u4e16\u754c","type":2,"url":"http:\/\/www.twcsys.com\/","exid":"twc"},"ucs":{"name":"UCS\u5408\u4f17\u5feb\u9012","type":2,"url":"http:\/\/www.ucsus.com","exid":"ucs"},"jhky":{"name":"\u4e45\u79be\u5feb\u8fd0","type":2,"url":"http:\/\/www.jiuhe3000.com\/","exid":"jhky"},"yssd":{"name":"\u4f18\u665f\u901f\u9012","type":2,"url":"http:\/\/www.1ex.us\/","exid":"yssd"},"ygkd":{"name":"\u4f18\u8d2d\u5feb\u9012","type":2,"url":"http:\/\/usyougou.com\/","exid":"ygkd"},"xjzy":{"name":"\u4fe1\u6377\u8f6c\u8fd0","type":2,"url":"http:\/\/www.xinjie56.net","exid":"xjzy"},"xdsy":{"name":"\u4fe1\u8fbe\u901f\u8fd0","type":2,"url":"http:\/\/www.xdsuyun.com\/","exid":"xdsy"},"qykd":{"name":"\u5168\u4e00\u5feb\u9012","type":2,"url":"http:\/\/www.aplus100.com\/","exid":"qykd"},"hxsy":{"name":"\u534e\u5174\u901f\u8fd0","type":2,"url":"http:\/\/www.huaxingsuyun.com\/","exid":"hxsy"},"huatong":{"name":"\u534e\u901a\u5feb\u8fd0","type":2,"url":"http:\/\/www.htongexpress.com","exid":"huatong"},"yjsd":{"name":"\u53cb\u5bb6\u901f\u9012(UCS)","type":2,"url":"http:\/\/www.youjiaus.net\/","exid":"yjsd"},"tzkd":{"name":"\u540c\u821f\u5feb\u9012","type":2,"url":"http:\/\/www.ship188.com\/","exid":"tzkd"},"junan":{"name":"\u541b\u5b89\u5feb\u9012","type":2,"url":"http:\/\/www.junanex.com\/","exid":"junan"},"stzy":{"name":"\u56db\u901a\u8f6c\u8fd0","type":2,"url":"http:\/\/www.jpsto.com\/","exid":"stzy"},"ttht":{"name":"\u5929\u5929\u6d77\u6dd8","type":2,"url":"http:\/\/tiantian8.us","exid":"ttht"},"tzexp":{"name":"\u5929\u6cfd\u5feb\u9012","type":2,"url":"http:\/\/www.tzexp.com\/","exid":"tzexp"},"tpy":{"name":"\u592a\u5e73\u6d0b\u5feb\u9012","type":2,"url":"http:\/\/www.ptlway.com","exid":"tpy"},"axzy":{"name":"\u5b89\u5fc3\u8f6c\u8fd0","type":2,"url":"http:\/\/www.anxin-ex.com\/","exid":"axzy"},"dghtzj":{"name":"\u5fb7\u56fd\u6d77\u6dd8\u4e4b\u5bb6","type":2,"url":"http:\/\/www.shoppingeuropa.de\/","exid":"dghtzj"},"deyun":{"name":"\u5fb7\u8fd0\u7f51","type":2,"url":"http:\/\/deyunhao.com\/","exid":"deyun"},"xgxkd":{"name":"\u65b0\u5e72\u7ebf\u5feb\u9012","type":2,"url":"http:\/\/www.anlexpress.com\/","exid":"xgxkd"},"mbzy":{"name":"\u660e\u90a6\u8f6c\u8fd0","type":2,"url":"http:\/\/dnjex.com\/","exid":"mbzy"},"yskd":{"name":"\u6613\u9001\u7f51","type":2,"url":"http:\/\/www.etransup.com\/","exid":"yskd"},"oejet":{"name":"\u6b27e\u6377 ","type":2,"url":"http:\/\/oe-jet.com\/","exid":"oejet"},"ozgo":{"name":"\u6b27\u6d32GO","type":2,"url":"http:\/\/www.eur-go.com\/","exid":"ozgo"},"ozfeng":{"name":"\u6b27\u6d32\u75af","type":2,"url":"http:\/\/www.ozfeng.com\/","exid":"ozfeng"},"hfmzsd":{"name":"\u6c47\u4e30\u7f8e\u4e2d\u901f\u9012","type":2,"url":"http:\/\/www.hfmzsudi.com","exid":"hfmzsd"},"hdbao":{"name":"\u6d77\u5e26\u5b9d","type":2,"url":"http:\/\/www.haidaibao.com\/","exid":"hdbao"},"hysd":{"name":"\u6d77\u60a6\u901f\u9012","type":2,"url":"http:\/\/www.haiyuex.com\/","exid":"hysd"},"hxqkd":{"name":"\u6d77\u661f\u6865\u5feb\u9012","type":2,"url":"http:\/\/www.haixingqiao.com\/","exid":"hxqkd"},"htcun":{"name":"\u6d77\u6dd8\u6751","type":2,"url":"http:\/\/www.haitaocun.com\/","exid":"htcun"},"rundong":{"name":"\u6da6\u4e1c\u56fd\u9645\u5feb\u7ebf","type":2,"url":"http:\/\/www.rundongex.com","exid":"rundong"},"ause":{"name":"\u6fb3\u4e16\u901f\u9012","type":2,"url":"http:\/\/www.aus-express.com\/","exid":"ause"},"aoz":{"name":"\u7231\u6b27\u6d32","type":2,"url":"http:\/\/www.love-eu.com\/","exid":"aoz"},"rtsd":{"name":"\u745e\u5929\u901f\u9012","type":2,"url":"http:\/\/rtexpress.com\/","exid":"rtsd"},"blkd":{"name":"\u767e\u5229\u5feb\u9012","type":2,"url":"http:\/\/www.blzexpress.com\/","exid":"blkd"},"btwl":{"name":"\u767e\u901a\u7269\u6d41","type":2,"url":"http:\/\/www.buytong.com\/","exid":"btwl"},"ryzy":{"name":"\u777f\u9e70\u56fd\u9645\u8f6c\u8fd0","type":2,"url":"http:\/\/www.ryexpress.com\/","exid":"ryzy"},"bnkd":{"name":"\u7b28\u9e1f\u5feb\u9012","type":2,"url":"http:\/\/www.birdex.cn\/","exid":"bnkd"},"mjkd":{"name":"\u7f8e\u5609\u5feb\u9012","type":2,"url":"http:\/\/www.mejex.com","exid":"mjkd"},"mgag":{"name":"\u7f8e\u56fd\u7231\u8d2d","type":2,"url":"http:\/\/www.igot.hk\/","exid":"mgag"},"mgkd":{"name":"\u7f8e\u56fd\u8f6c\u8fd0","type":2,"url":"http:\/\/www.us-ex.com\/","exid":"mgkd"},"mlkd":{"name":"\u7f8e\u8054\u5feb\u9012","type":2,"url":"http:\/\/www.letseml.com\/","exid":"mlkd"},"99mst":{"name":"\u7f8e\u901f\u901a","type":2,"url":"http:\/\/www.99mst.com\/","exid":"99mst"},"lbzy":{"name":"\u8054\u90a6\u8f6c\u8fd0FedRoad","type":2,"url":"http:\/\/www.fedroad.com\/","exid":"lbzy"},"bee":{"name":"\u871c\u8702\u901f\u9012","type":2,"url":"http:\/\/www.bee001.us\/","exid":"bee"},"xipost":{"name":"\u897f\u90ae\u5bc4","type":2,"url":"http:\/\/www.xipost.com\/","exid":"xipost"},"hjsd":{"name":"\u8c6a\u6770\u901f\u9012","type":2,"url":"http:\/\/www.hjusaexpress.com\/","exid":"hjsd"},"bhsd":{"name":"\u8d1d\u6d77\u901f\u9012","type":2,"url":"http:\/\/www.xlobo.com\/","exid":"bhsd"},"xdkd":{"name":"\u8fc5\u8fbe\u5feb\u9012","type":2,"url":"http:\/\/www.xundaex.com\/","exid":"xdkd"},"ydsy":{"name":"\u8fd0\u8fbe\u901f\u8fd0","type":2,"url":"http:\/\/www.yundausa.com\/","exid":"ydsy"},"tcmzkd":{"name":"\u901a\u8bda\u7f8e\u4e2d\u5feb\u9012","type":2,"url":"http:\/\/www.tcmzkd.com\/","exid":"tcmzkd"},"sdkd":{"name":"\u901f\u8fbe\u5feb\u9012 ","type":2,"url":"http:\/\/ez2cn.com\/","exid":"sdkd"},"jhtzy":{"name":"\u91d1\u6d77\u6dd8\u8f6c\u8fd0","type":2,"url":"http:\/\/www.goldhaitao.us\/","exid":"jhtzy"},"fxsd":{"name":"\u98ce\u884c\u901f\u9012","type":2,"url":"http:\/\/www.fengex.com\/","exid":"fxsd"},"flsd":{"name":"\u98ce\u96f7\u901f\u9012","type":2,"url":"http:\/\/www.thunderex.com\/","exid":"flsd"},"fykd":{"name":"\u98de\u6d0b\u5feb\u9012","type":2,"url":"http:\/\/www.shipgce.com\/","exid":"fykd"},"fgkj":{"name":"\u98de\u9e3d\u5feb\u4ef6","type":2,"url":"http:\/\/www.fegcn.com\/","exid":"fgkj"},"jdkd":{"name":"\u9a8f\u8fbe\u5feb\u9012","type":2,"url":"http:\/\/www.jdexpressusa.com\/","exid":"jdkd"},"etd":{"name":"ETD","type":2,"url":"http:\/\/www.etdexpress.com","exid":"etd"},"168mzkd":{"name":"168 \u7f8e\u4e2d\u5feb\u9012","type":2,"url":"http:\/\/www.168tochina.com\/","exid":"168mzkd"},"dcs":{"name":"\u6587\u8fbe\u56fd\u9645DCS","type":2,"url":"http:\/\/www.dcslogistics.us\/","exid":"dcs"},"qqex":{"name":"QQ\u5feb\u9012","type":2,"url":"http:\/\/www.qq-ex.com\/","exid":"qqex"}}';

function curl_get($url, $gzip=false){
       $curl = curl_init($url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
       if($gzip) curl_setopt($curl, CURLOPT_ENCODING, "gzip"); 
       $content = curl_exec($curl);
       curl_close($curl);
       return $content;
}


$html =   iconv("gb2312" , "utf-8", urldecode(file_get_contents("php://input")));

$html =  urldecode(file_get_contents("php://input"));


$p = phpQuery::newDocument($html);


$r = array();
$r["result"] = -1;

#国内单号
$r["kddh"] = "0";
$r["kdgs"] = "";
if($p && $p->find('.newest'))
{
  $r["newstatus"] = urlencode($p->find('.newest')->text());
  $r["list"] = array();
 
  foreach(pq($p->find('.detail ul li')) as $i)
  {
     $t = array();
     $has = false;
     foreach(pq($i)->find('p') as $j)
     {
       if(pq($j)->hasclass('time'))
       {
          $t["tm"] = urlencode(pq($j)->text());
       }
       else
       {
          $status = pq($j)->text();
          $t["status"] = urlencode($status);
          if(preg_match('/\[([0-9]+)\]/',$status,$m))
          {
				$r["kddh"] = $m[1];	
				if(preg_match('/已换国内渠道(.*)\[/', $status, $n))
				{
					$r["kdgs"] = urlencode($n[1]);
					/*
					$arr_allkdgs = object2array(json_decode($allkdgs));
					foreach($arr_allkdgs as $key=>$value)
					{
						$v = ($value);
						if($v["name"] == $n[1])
						{
							echo $v["exid"];
						}
					}
					*/
				}
          }
	  
       }
       $has = true;

     }

     if($has)
     {
		array_unshift($r["list"], $t);
  		$r["result"] = 0;
     }
     
  }
  

}

$jsons = json_encode($r);
echo $jsons;



