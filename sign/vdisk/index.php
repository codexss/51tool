<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>新浪微盘签到</title>
</head>
<body>
<div class="title">新浪微盘签到 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='do.php' method='GET'>
登录你的新浪微博账户：<br/>用户名(邮箱):<br/>
<input id='text' type='text' name='user' class="txt"/> 
<br/>密码:<br/>
<input id='text' type='text' name='pwd' class="txt"/>
<br/>是否转发微博:(签到后发微博会获得更多空间)<br/>
<select name="weibo" ivalue="false"><option value="false">否</option><option value="true">是</option></select>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：<br/>
将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。<br/><br/>
网络任务执行频率一天1～2次即可，过于频繁地登录会出现提示“登录次数过于频繁”而签到失败，严重的会被冻结账号。<br/><br/>如果出现“<b>需要输入验证码</b>”，请在新浪微博的[账号设置]—[账号安全]—[登录保护]里将本服务器所在地“<b>北京</b>”加入不需要输入验证码，如下图。<img src="screenshot.jpg"></div>
<?php include '../foot.php';?>