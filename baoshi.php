<?php
(date_default_timezone_set("PRC"));
$rq = date("Y-n-j ");
$sj = date("H:i:s");
echo "
报时：$rq $sj";
?>
<?php
if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])
{
$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
}
elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])
{
$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
}
elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])
{
$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
}
elseif (getenv("HTTP_X_FORWARDED_FOR"))
{
$ip = getenv("HTTP_X_FORWARDED_FOR");
}
elseif (getenv("HTTP_CLIENT_IP")) 
{
$ip = getenv("HTTP_CLIENT_IP");
}
elseif (getenv("REMOTE_ADDR"))
{
$ip = getenv("REMOTE_ADDR");
}
else
{
$ip = "Unknown";
}
echo "<br/>你的ＩＰ: ".$ip;
?>