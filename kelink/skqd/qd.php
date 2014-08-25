<?php
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
$content=$_GET['content'];
$sid=$_GET['sid'];
if(!$content or !$sid){echo"<font color='red'>输入不完整<a href='index.php'>返回重新填写</a></font>";
}else{
$url="http://wap.mrpyx.cn/izysq/Signin.asp?Action=index&Mod=Signin&siteid=1000&sid={$sid}";
$post="2A7E92B98D89=92A7B52D4AD4&content={$content}";
$ch=curl_init();
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
ob_start();
curl_exec($ch);
$result=ob_get_contents();
ob_end_clean();
echo $result;
}
?>
