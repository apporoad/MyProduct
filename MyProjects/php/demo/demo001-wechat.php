<?php
/*
 * Created on 2015Äê5ÔÂ10ÈÕ
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 /**
  * wechat token flamedeerTest
  * EncodingAESKey:2Ddv7PTamTcrc19s2CcVm87EwEvEIyJJ9juLrCSGU7l
  */
 define("TOKEN","flamedeerTest");
 
 function checkSignature() {
	//get ¡°Get¡± param
	$signature =$_GET ['signature'];
	$nonce=$_GET ['nonce'];
	$timestamp=$_GET ['timestamp'];
	//to array
	$tmpArr=array ($nonce,$timestamp,TOKEN);
	sort($tmpArr);
	//join togather
	$tempStr=implode($tmpArr);
	//shal
	$tempStr=sha1($tempStr);
	// judge
	if($tempStr==$signature){
		return true;
	}
	return false;
}


//go
if(false == checkSignature()){
	exit(0);
}
// echostr
$echostr=$_GET['echostr'];
if($echostr)
{
	echo $echostr;
	exit(0);
}


/**
 * then do our things ,and return right result
 */
 $PostData=$HTTP_RAW_POST_DATA;
 // or 
 //$PostData=file_get_contents("php://input");
 if(!$PostData)
 {
 	echo "wrong input";
 	exit(0);
 }
// analyse xml
$xmlObj= simplexml_load_string($PostData,'SimpleXMLElement',LIBXML_NOCDATA);
if(!$xmlObj)
{
	echo 'worong input ';
	exit(0);
}
// get fromusername
$fromUserName=$xmlObj->FromUserName;
// get toUserName
$toUserName=$xmlObj->ToUserName;
// get msgType
$msgType=$xmlObj->MsgType;

// judage msgtype
if('text'!=$msgType)
{
	$retMsg='only text ';
}
else
{
	$content=$xmlObj->Content;
	$retMsg=$content;
	
}

// final return your xml result 
$resultTemp="<xml>" .
		"<ToUserName><![CDATA[%s]]></ToUserName>" .
		"<FromUserName><![CDATA[%s]]></FromUserName>" .
		"<CreateTime>%s</CreateTime>" .
		"<MsgType><![CDATA[text]]></MsgType>" .
		"<Content><![CDATA[%s]]></Content>" .
		"<FuncFlag>0</FunFlag>" .
		"</xml>";
//replace
$resultStr=sprintf($resultTemp,$fromUserName,$toUserName,time(),$retMsg);

// your msg
echo $resultStr
		
?>
