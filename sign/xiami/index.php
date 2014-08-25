<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>虾米音乐签到</title>
</head>
<body>
<div class="title">虾米音乐签到 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='do.php' method='GET'>
登录你的虾米账户：<br/>用户名:<br/>
<input id='text' type='text' name='user' class="txt"/> 
<br/>密码:<br/>
<input id='text' type='text' name='pwd' class="txt"/>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：<br/>
将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。<br/><br/>
网络任务执行频率一天1～2次即可，过于频繁地登录会导致登录出现验证码而签到失败。</div>
<?php include '../foot.php';?>

