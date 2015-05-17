<?php
require("../global.php");

include_once "include/WXBizMsgCrypt.php";


//logit( curPageURL());// ."<br>"; 
/**
 * 一般url格式:
 * http://120.26.192.243/wechat/flamedeer/flamedeer.php?
 * msg_signature=b47666a944619d82837bc209e7f8a4c9fcd678d4
 * &timestamp=1431846716&nonce=1194673696
 */
$msg_signature = $_GET['msg_signature'];
$timestamp = $_GET['timestamp'];
$nonce = $_GET['nonce'];
$echostr = $_GET['echostr'];

//如果echostr为空 ,解析post数据
/**
 * 数据格式：
 * <xml> 
   <ToUserName><![CDATA[toUser]]</ToUserName>
   <AgentID><![CDATA[toAgentID]]</AgentID>
   <Encrypt><![CDATA[msg_encrypt]]</Encrypt>
   </xml>
 */
 $sVerifyEchoStr="";
 $sReqData="";
if(!$echostr)
{
	$sReqData =$HTTP_RAW_POST_DATA;
	if($sReqData)
	{
		//logit($sReqData);
		$xmlObj =  simplexml_load_string($sReqData);
		$sVerifyEchoStr = $xmlObj->Encrypt;
	}
}
else
{
	$sVerifyEchoStr=$echostr;
}

$corpId = "wx6644ea819a82da81";
$token = "flameDeerTest";
$encodingAesKey = "hOxPkI4NFEYKVTjBtbdcz8zdptjMcaLLdXqBTm9EF8c";
//logit("0000");

$wxcpt = new WXBizMsgCrypt($token, $encodingAesKey, $corpId);
//logit("111111");


$sEchoStr="";
//logit("msg_signature:" . $msg_signature);
//$msg_signature="b47666a944619d82837bc209e7f8a4c9fcd678d4";
//logit("timestamp:". $timestamp);
//$timestamp="1431846716";
//logit("nonce:" .$nonce);
//$nonce="1194673696";
//logit("sVerifyEchoStr:".$sVerifyEchoStr);
//$echostr="uoVSRIsxF1V4k9N0dPJsj9aNwD84MTmIklgXYe2jVUnnva2KADfc7R3eF8qsGFritr39DSavjoB7LFCFk67/v/QfqXB664ymvJFbSesAMlpiUVz0apQg/XUY/T2Y7HwfhUMADpuGQPk74V7veR3jOe9gb0RTwFk6aVdPSrfG54hUoxeIb/6dUo1N2g9BCcHJjTBipwnITOdMX3k7gsAexatdrtFZZuoADCmBwj30qckcvntaztgqPZcIOWFTYbkcIMTzzu6HYAln25xLPE7JTVywtTDao16p3VzF5QHoYkp+a/+2/00ZBnmaTIasbpxgXV5pqya3jpR51nwjTTHxb5KAQOB5sdjKbq0U7bmscTrc1RBu51tiCLn7XIhLwjslaAP9aydOpewrtjjAbRbpRiDuca9CvcD5M5dArFplnUY=";
$errCode = $wxcpt->VerifyURL($msg_signature, $timestamp, $nonce, $sVerifyEchoStr, $sEchoStr);
//logit("errCode".$errCode);
if ($errCode == 0) { 
 	if($echostr)
 	{
 		echo $sEchoStr;
 		exit(0);
 	}
  	//logit("sEchoStr".$sEchoStr);
}
else 
{
	//验证不通过，可以考虑日志
	exit(0);
}


$sMsgXmlObj=simplexml_load_string($sEchoStr);

$FromUserName=$sMsgXmlObj->FromUserName;
$MsgType=$sMsgXmlObj->MsgType;
$MsgId=$sMsgXmlObj->MsgId;
$AgentId=$sMsgXmlObj->AgentId;

// return msgs
$retTmp="<xml>" .
		"<ToUserName><![CDATA[%s]]></ToUserName>" .
		"<FromUserName><![CDATA[%s]]></FromUserName>" .
		"<CreateTime>%s</CreateTime>" .
		"<MsgType><![CDATA[text]]></MsgType>" .
		"<Content><![CDATA[%s]]></Content>" .
		"<MsgId>%s</MsgId>" .
		"<AgentID>%s</AgentID>" .
		"</xml>";
$realStr=sprintf($retTmp,$FromUserName,"flameDeer",time(),"test just",$MsgId,$AgentId);
$sEncryptMsg = ""; 

$errCode = $wxcpt->EncryptMsg($realStr, $timestamp, $nonce, $sEncryptMsg);
if ($errCode == 0) {
	 echo $sEncryptMsg;
} else {
	print("ERR: " . $errCode . "\n\n");
	// exit(-1);
}


?>
