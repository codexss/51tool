<?php
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
header("Content-type:text/html;charset=utf-8"); 
$content=$_GET['content'];
$domain=$_GET['u'];
$siteid=$_GET['siteid'];
$sid=$_GET['sid'];
if(!$domain or !$sid){echo"<font color='red'>输入不完整<a href='index.php'>返回重新填写</a></font>";
}else{
$url="http://{$domain}/Signin/Signin.aspx?Action=index&Mod=Signin&siteid={$siteid}&sid={$sid}";
$post="content={$content}";
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
