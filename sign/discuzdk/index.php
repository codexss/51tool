<?php echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">';?>
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<meta http-equiv="Cache-control" content="no-cache" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link rel="stylesheet" type="text/css" href="/sign/style.css">
<title>Discuz!打卡机</title>
</head>
<body>
<div class="title">Discuz!打卡机 [ <a href="javascript:history.back();">返回</a> ]</div>
<div class="content"><form action='do.php' method='GET'>
网页编码类型:<br/>
<select name="code" ivalue="0" class="txt"><option value="0">UTF-8</option><option value="1">GBK</option></select>
<br/>网站域名:（结尾带上”/”）<br/>
<input id='text' type='text' name='u' value="http://" class="txt"/>
<br/>用户名:<br/>
<input id='text' type='text' name='user' class="txt"/> 
<br/>密码:<br/>
<input id='text' type='text' name='pwd' class="txt"/>
<br/>密码提示问题ID（没有的话默认为0）:<br/>
<input id='text' type='text' name='quest' value="0" class="txt"/>
<br/>密码提示问题答案（没有的话默认为空）:<br/>
<input id='text' type='text' name='answ' class="txt"/>
<p><input type='submit' id='submit' value='打卡'/><input type="reset" value="重填" /></p></form>
</div>
<div class="read">提示：网站域名格式如http://agrj.cn/<br/>
将提交后的网址添加到 <a href="http://cron.aliapp.com/">网络任务</a> 即可自动签到。<br/><br/>
本签到机只针对Discuz!的dsu_amupper打卡插件。本身没有此插件的论坛无法签到。如果点击签到后提示“签到失败”也不一定是真的失败，有可能是程序未检测到签到成功的页面，实际能否签到成功以论坛显示为准。<br/><br/>
网页编码类型在网页源代码的meta标签里可见，这个选项不会影响签到的结果，但可能会让程序误判为“签到失败”，实际上是签到成功。</div>
<?php include '../foot.php';?>