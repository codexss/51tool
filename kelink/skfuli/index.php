<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>斯凯网VIP福利自动领取</title>
</head>
<body>
<div class="title">斯凯网VIP福利自动领取 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='qd.php' method='GET'>
你的ID:<br/>
<input type='text' id='text' name='userid' value="" class="txt"/>
<br/>SID:<br/>
<input type='text' id='text' name='sid' class="txt"/>
<p><input type='submit' id='submit' value='点击领取'/></p></form>
</div>
<div class="read">
提示：<br/>
将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可每天自动领取福利。<br/>
<br/>说明：斯凯网VIP会员每天可以领取一次，奖品随机发放。</div>
<?php include '../../sign/foot.php';?>
