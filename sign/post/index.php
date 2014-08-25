<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>万能签到机</title>
</head>
<body>
<div class="title">万能签到机 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='post.php' met
hod='get'>
目标站签到后的页面地址:<br>
<input name='url' value='http://' class="txt"/>
<br>需要提交的post数据:<br>
<input name='post' value='' class="txt"/>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">说明:先<font color=red>登陆目标站帐号后</font>然后返回此页，填写POST数据，如 msg=[txt]
<br>将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。
<hr>
</form>模板:<br>
<font color=red>柯林签到</font><br>签到后的页面:<br><input value="http://域名/Signin/Signin.aspx?Action=index&Mod=Signin&siteid=网站siteid&sid=" class="txt" /><br>POST数据填:<br><input value="content=[txt]" class="txt" /></div>
<?php include '../foot.php';?>
