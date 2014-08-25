<!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="Author-Corporation" content="消失的彩虹海" />
<meta name='keywords' content='彩虹自动签到系统大全'>
<link rel="shortcut icon" href="favicon.ico" >

<link rel="stylesheet" type="text/css" href="css/css.css">
<title>彩虹自动签到系统大全</title>
</head>

<body>

<div class='w h Header'>
<img src="css/logo.png"></div>
<div  class="w h"">
<a href="http://sign.aliapp.com">贴吧签到助手</a><br/>
<a href="/kelink/qdnew">柯林自动签到</a><br/>
<a href="/kelink/klsofa">柯林沙发机</a><br/>
<a href="/kelink/sk.php">斯凯自动领币</a><br/>
<a href="/sign/discuz">Discuz自动签到</a><br/>
<a href="/sign/discuztask">Discuz任务助手</a><br/>
<a href="/sign/discuzol">Discuz挂在线时长</a><br/>
<a href="/sign/115wangpan">115网盘自动签到</a><br/>
<a href="/sign/xiami">虾米音乐自动签到</a><br/>
<a href="/sign/vdisk">新浪微盘自动签到</a><br/>
<a href="/sign/360yunpan">360云盘自动签到</a><br/>
<a href="/sign/360jifen">360积分商城签到</a><br/>
<a href="/sign/post">万能签到工具</a><hr/>
</div>
<div class='box'>
本站域名：<a href='/'>51tool.jd-app.com</a><br>
如果觉得本站不错的话请分享给你的朋友<br/>
<?
include("baoshi.php");
?><br/>
<?php 
class runtime
{ 
    var $StartTime = 0; 
    var $StopTime = 0; 
 
    function get_microtime() 
    { 
        list($usec, $sec) = explode(' ', microtime()); 
        return ((float)$usec + (float)$sec); 
    } 
 
    function start() 
    { 
        $this->StartTime = $this->get_microtime(); 
    } 
 
    function stop() 
    { 
        $this->StopTime = $this->get_microtime(); 
    } 
 
    function spent() 
    { 
        return round(($this->StopTime - $this->StartTime) * 1000, 1); 
    } 
 
}
 
 
//例子 
$runtime= new runtime;
$runtime->start();
 
//你的代码开始
 
$a = 0;
for($i=0; $i<1000000; $i++)
{
    $a += $i;
}
 
//你的代码结束
 
$runtime->stop();
echo "页面执行时间: ".$runtime->spent()." 毫秒";
?>
<br/>
Powered by 彩虹!
</div>
</body></html>