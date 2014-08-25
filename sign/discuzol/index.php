<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>Discuz!挂在线时间</title>
</head>
<body>
<div class="title">Discuz!挂在线时间 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='do.php' method='GET'>
[密码模式][<a href="index2.php">cookie模式</a>]
<br/>(密码模式仅适用于登录不需要验证码的论坛，cookie模式适用于所有论坛)<hr/>
网站域名:（结尾带上”/”）<br/>
<input id='text' type='text' name='u' value="http://" class="txt"/>
<br/>用户名:<br/>
<input id='text' type='text' name='user' class="txt"/> 
<br/>密码:<br/>
<input id='text' type='text' name='pwd' class="txt"/>
<br/>密码提示问题ID（没有的话默认为0）:<br/>
<input id='text' type='text' name='quest' value="0" class="txt"/>
<br/>密码提示问题答案（没有的话默认为空）:<br/>
<input id='text' type='text' name='answ' class="txt"/>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：网站域名格式如http://agrj.cn/<br/>
将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。
</div>
<?php include '../foot.php';?>
