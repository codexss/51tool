<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>柯林签到机</title>
</head>
<body>
<div class="title">柯林签到机(SID版) [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='qd.php' method='GET'>
网站域名:（不要加“http://”）<br/>
<input id='text' type='text' name='u' class="txt"/>
<br/>签到内容(5字内):<br/>
<input id='text' type='text' name='content' class="txt"/> 
<br/><div>siteid:</div>
<input id='text' type='text' name='siteid' value="1000" class="txt"/>
<br/><div>SID: [<a href="../qdnew/">切换密码模式</a>]</div>
<input type='text' id='text' name='sid' class="txt"/>
<p><input type='submit' id='submit' value='签到'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：网站域名格式如mrp6688.52n.cn<br/>
<br/>将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。
<br/>建议使用<a href="../qdnew/">密码版</a>，sid版可能会因为sid失效而无法签到。</div>
<?php include '../../sign/foot.php';?>