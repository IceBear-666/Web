<?php


$zygs = $_GET["zygs"];

if($zygs == "百通")
{
	header("Location: http://www.buytong.cn/IndexNew.aspx?region=usa");
}
else if($zygs == "递四方" || $zygs == "转运四方")
{

 header("Location: http://www.4px.com/");	
}
else if($zygs == "斑马物流" || $zygs == "斑马")
{

header("Location: http://www.360zebra.com/Default.aspx");
}
else if($zygs == "友家速递")
{

header("Location: http://www.youjiaus.net/");
}
else if($zygs == "飞洋快递")
{
header("Location: http://ebuy.shipgce.com/ListViewEdit.aspx?ID=17");
}
else if($zygs == "天翼快递")
{
header("Location: http://www.tykd.com/price.asp");
}
else if($zygs == "量子物流")
{
header("Location: http://www.qm-ex.com/");
}
else if($zygs == "先锋快递")
{
header("Location: http://www.xianfengex.com/");
}
else if($zygs == "同舟快递")
{
header("Location: http://www.ship188.com/");
}
else if($zygs == "笨鸟快递")
{
header("Location: http://www.birdex.cn/");
}
else if($zygs == "海带宝")
{
header("Location: http://www.haidaibao.com/");
}
else if($zygs == "傲天转运")
{
header("Location: http://www.ats-ex.com/");
}
exit;
?>
