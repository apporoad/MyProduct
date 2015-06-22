<?php
require("../global.php");

include_once "include/WXBizMsgCrypt.php";


//logit( curPageURL());// ."<br>"; 
//logit($HTTP_RAW_POST_DATA);

$appId = "wxff3eb9103e64b7a6";
$token = "flameDeerTest";
$encodingAesKey = "og6bQNSoGVtebpTEyEFyrK3xZIzRpcydUMcoaAMttIS";

/**
 * 一般url格式:  验证时：
 * http://120.26.192.243/wechat/Demo/WechatSubscriberFrame.php?
 * signature=40ae42659ddd29e3d2b6873df8bdf3bea7458405
 * &echostr=2676071176507001758
 * &timestamp=1432128410&nonce=947682869
 * 
 * 正常信息推送：
 * http://120.26.192.243/wechat/Demo/WechatSubscriberFrame.php?
 * signature=3e1ef76884218cac0e005f3c40760c6c402dca5d
 * &timestamp=1432128550&nonce=1088751490
 * &encrypt_type=aes
 * &msg_signature=0b03e3cf117ec418966e87057151b9b9acf11ba1
 * 
 * Post文件:
 * <xml>
 *   <ToUserName><![CDATA[gh_2fe355d973bd]]></ToUserName>
 *   <Encrypt><![CDATA[y8EhS49lgX0yvVv9Tp7lPx+yotKLSOU8syz6iYtK8/NOJqmr2Xjsicz6x6afLlLhjpCa9gnUb4DPuFnFRWcc6ozk2D9dKbF4WEndQo3Zm0TQteVy3FG7uH2GFTT9j6n8tqK6XhabUFUlpdLcZ6EcHHX4UoQa3UdM1uc8voBRnZuQs2cTEx49Kx6ZwnDSYt8BUGiBrwHjRwK0QWuTfAdcjGcz4h948h1+WO6jhatH/Cv3290nhq9IOqlF71kgmEcgm72FK+FGDd0q3H6+YQR8PeunWjT0alIoCwjO6Sp4bs5jzdJiNFVggNkjvdUjJgR4ztjL0r1nu5qrHkdNxhmiBZxiY1v045zo+RMVJVXS9XjEZz0KYrJL/W2XKssaes07m7Aue15o2N1SaFLfqEuuviHhbFtqDQ9Ja2pOKnxRBqM=]]></Encrypt>
 *	</xml>
 */
$signature = $_GET['signature'];
$timestamp = $_GET['timestamp'];
$nonce = $_GET['nonce'];
$echostr = $_GET['echostr'];

$encrypt_type=$_GET['encrypt_type'];
$msg_signature = $_GET['msg_signature'];

//$signature = "4d327b622006b212b4bfca25255ed22e4c5bb44c";
//$timestamp = "1432131544";
//$nonce = "1010177393";
//
//$encrypt_type="aes";
//$msg_signature = "0f4100f698748c81374c2d15a2c992d8d5594eee";

//验证 echostr
if($echostr)
{
 	echo $echostr;
 	exit(0);
}


//获取post数据
$PostData =$HTTP_RAW_POST_DATA;
//$PostData="<xml>
//    <ToUserName><![CDATA[gh_2fe355d973bd]]></ToUserName>
//    <Encrypt><![CDATA[RCvUOUNiN9NAwA2+PBH/KcwhAK5IBcJSHnO09PzPrk17iQXHargnUjfYRLXcharY3ffoyASx28eNGRVuVVvQ6UkEs4Cpx21nl0RG0XBqWTQvQAADc/kCRItF7CZXlrleo/SO0dc38OfdnUwxmsTlFIhdQB1TWmw4GVE/8Nlzx5+3ZLkK1RzjUu1+VpRVpYDtN22VQ6x6K9qK9RA0KGqzs0n1wFRPTwjMOX9LFNNlCjyU4Y7q3RMZbe+pvDHLBGIlTMS9KakOK24b+bXTKjbBymVPJemynORemZ73VBt5PA1ikIr8AmqR+KKI0BrqbdBbWNwNxJ5Tg2rdMddSzYq4lPTx4aDgkfGtSt/0vlze7GdGXw69WwJEpprR/20vMiJjs34j89dRMxzit2NXDbantpgf3XY5ss8+jT92czosPkc=]]></Encrypt>
//</xml>";
//if($PostData)
//{
//	$postXmlObj =  simplexml_load_string($PostData);
//	$PostEncrypt = $postXmlObj->Encrypt;
//}

$ReceiveMsg="";
$wxcpt = new WXBizMsgCrypt($token, $encodingAesKey, $appId);
$errCode = $wxcpt->decryptMsg($msg_signature, $timestamp, $nonce, $PostData, $ReceiveMsg);
if ($errCode == 0) { 
 	
}
else 
{
	//验证不通过，可以考虑日志
	exit(0);
}
// 解析返回结果
$sMsgXmlObj=simplexml_load_string($ReceiveMsg);

$ToUserName=$sMsgXmlObj->ToUserName;
$FromUserName=$sMsgXmlObj->FromUserName;
$MsgType=$sMsgXmlObj->MsgType;
$MsgId=$sMsgXmlObj->MsgId;

$Content=$sMsgXmlObj->Content;

//返回信息
$retTmp="<xml>" .
		"<ToUserName><![CDATA[%s]]></ToUserName>" .
		"<FromUserName><![CDATA[%s]]></FromUserName>" .
		"<CreateTime>%s</CreateTime>" .
		"<MsgType><![CDATA[text]]></MsgType>" .
		"<Content><![CDATA[%s]]></Content>" .
		"</xml>";
$Content="您说的内容是：<a href='https://www.baidu.com/'>".$Content."</a>" ;
$realStr=sprintf($retTmp,$FromUserName,$ToUserName,time(),$Content);
$sEncryptMsg = ""; 

$errCode = $wxcpt->EncryptMsg($realStr, $timestamp, $nonce, $sEncryptMsg);
if ($errCode == 0) {
	 echo $sEncryptMsg;
} else {
	print("ERR: " . $errCode . "\n\n");
	// exit(-1);
}

?>
