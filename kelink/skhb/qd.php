<?php
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
$sid=$_GET['sid'];
if(!$sid){echo"<font color='red'>输入不完整<a href='index.php'>返回重新填写</a></font>";
}else{
$url="http://wap.mrpyx.cn/hb/hb.aspx?siteid=1000&sid={$sid}";
$post="action=hb";
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
