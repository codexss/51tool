<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>新版柯林签到机</title>
</head>
<body>
<div class="title">柯林签到机(密码版) [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='qd.php' method='GET'>
网站域名:（不要加“http://”）<br/>
<input type='text' name='ym' class="txt"/>
<br/>用户名/手机/id:<br/>
<input type='text' name='user' class="txt"/>
<br/>密码: [<a href="../klqd/">切换SID模式</a>]<br/>
<input type='text' name='pwd' class="txt"/>
<br/>签到内容:<br/>
<input type='text' name='txt' class="txt"/>
<br/>siteid:<br/>
<input type='text' name='siteid' value='1000' class="txt"/>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：网站域名格式如mrp6688.52n.cn<br/>
<br/>将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可每天自动签到。
</div>
<?php include '../../sign/foot.php';?>