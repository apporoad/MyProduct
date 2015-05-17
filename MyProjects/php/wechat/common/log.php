<?php

/*
 $postStr=$GLOBALS["HTTP_RAW_POST_DATA"];
logit("Ö±½Ólogpost:".$postStr);
*/
function logit($txt){
	$myfile = fopen("newfile.txt", "a+") or die("Unable to open file!");
	ini_set('date.timezone','Asia/Shanghai');
	$txt=date('Y-m-d H:i:s',time())."\t".$txt."\r\n";
	fwrite($myfile, $txt);
	fclose($myfile);
}


?>
