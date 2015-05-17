<?php
include_once 'WXInInfor.php';
include_once 'include/WeiXinConfig.php';

$code=$_GET['code'];
echo "code".$code."<Br>";
$WXInit=new WXInInfor(CORPID,SECRET);
$UserId=$WXInit->getUseId($code,"1");
echo $UserId;
?>