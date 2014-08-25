<?php
set_time_limit(0);
ignore_user_abort(true);
$f=getcwd()."cookie.txt";
$url=$_GET['url'];
$p=$_GET['post'];
$txt=file("reply.txt");
shuffle($txt);
$str=preg_replace("!(\[txt\])!i",$txt[2],$p);
if(!$url or !$post){echo"<font color='red'>输入不完整!<a href='index.php'>返回重新填写</a></font>";
}else{
$ch=@curl_init();
curl_setopt($ch,CURLOPT_HEADER,0);
$tt=curl_setopt($ch,CURLOPT_TIMEOUT,20);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_URL,$url);
@curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
curl_setopt($ch,CURLOPT_COOKIEJAR,$f);
curl_setopt($ch,CURLOPT_COOKIEFILE,$f);
@curl_setopt($ch,CURLOPT_RETURNTRANSFSER,0);
ob_start();
curl_exec($ch);
$result=ob_get_contents();
ob_end_clean();
echo $result;
}
?>