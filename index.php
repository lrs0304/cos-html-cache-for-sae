<?php
define("SUMMETA","<!--this is the first view page created at ".date("Y-m-d H:i:s")." by summer  -->");

 $kv = new SaeKV();
 $kv->init();
 	$sitemap = $kv->get($_SERVER['SCRIPT_URI'].'index.html');
 	if ($sitemap) {
 		header('Content-type:text/html; charset=utf-8');

  		echo $sitemap;
 	}else{
 		//echo "111111111111";
 		//echo $_SERVER['SCRIPT_URI'];
 		echo fetchUrl($_SERVER['SCRIPT_URI']).SUMMETA;
 	}
 
 function fetchUrl($url){
 	$ch=curl_init();
 	curl_setopt($ch, CURLOPT_AUTOREFERER,0);
 	curl_setopt($ch, CURLOPT_REFERER, 'staticindex');
 	curl_setopt($ch, CURLOPT_URL, $url);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	$ret=curl_exec($ch);
 	curl_close($ch);
 	if ($ret) {
 		return $ret;
 	}else{
 		return false;
 	}
 }
 ?>
