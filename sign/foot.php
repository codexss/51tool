<?php
$url=$_SERVER['PHP_SELF'];
if(preg_match('/index2.php/i', $url)||preg_match('/vdisk/i', $url))
echo '<div class="foot">[<a href="http://3600.aliapp.com'.$url.'">集群①</a>][<a href="http://zztool.aliapp.com'.$url.'">集群②</a>][集群③]';
else
echo '<div class="foot">[<a href="http://3600.aliapp.com'.$url.'">集群①</a>][<a href="http://zztool.aliapp.com'.$url.'">集群②</a>][<a href="http://51tool.aliapp.com'.$url.'">集群③</a>][<a href="http://qweb.sinaapp.com'.$url.'">集群④</a>]';
echo '<hr/>©Powered by 彩虹!</div>
</body>
</html>';

?>