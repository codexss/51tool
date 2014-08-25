<?php
/*
*柯林签到
*By 无道&消失的彩虹海
*/
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
header("content-Type: text/html; charset=utf-8"); 

$user=$_GET['user']; 
$pwd=$_GET['pwd'];
$content=$_GET['txt']; 
$siteid=$_GET['siteid']; 
$ym=$_GET['ym']; 

$log_url="http://{$ym}/waplogin.aspx";//登陆url
$log_post="logname=$user&logpass=$pwd&saveid=0&action=login&classid=0&siteid={$siteid}&sid=-2-0-0-0-320&backurl=myfile.aspx?siteid={$siteid}";//登陆post

$s_url="http://{$ym}/Signin/Signin.aspx?Action=index&Mod=Signin&siteid={$siteid}";//签到url
$s_post="content={$content}";//签到post

 
$cookie=tempnam('./','cookie');

//访问登录页面
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$log_url);
curl_setopt($ch,CURLOPT_REFERER,$log_url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$log_post);
curl_setopt($ch,CURLOPT_TIMEOUT,30);//超时
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookie);
$html=curl_exec($ch);
curl_close($ch);

if(strpos($html, '登录成功'))
{}
else
{
$resultStr = '登录失败！请检查账号密码是否输入正确。';
}

//访问签到页面
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$s_url);
curl_setopt($ch,CURLOPT_REFERER,$s_url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$s_post);
curl_setopt($ch,CURLOPT_TIMEOUT,30);//超时
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie);
$content=curl_exec($ch);
curl_close($ch);

if(strpos($content, '您的签到次数'))
{
	preg_match('@</div><div class="tip">(.+)</div><div class="content">您的签到次数@i' , $content , $matches);
	$resultStr = $matches[1];
}

echo $resultStr;

@unlink($cookie);
?>