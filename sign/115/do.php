<?php
/*
*115网盘签到
*在代码里填上你的用户名和密码~
*By Perfare (www.perfare.net)
*update 2014-5-1
*/
set_time_limit(0);
ignore_user_abort(true);
header("content-Type: text/html; charset=utf-8");

function curl_get($url, $use = false, $save = false, $referer = null, $post_data = null){
	global $cookie_file;
    $ch=curl_init($url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.3.5; zh-cn; MI-ONE Plus Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//需要使用cookies
	if($use){
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    }
	//需要保存cookies
	if($save){
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    }
	//需要referer伪装
	if(isset($referer))
		curl_setopt($ch, CURLOPT_REFERER, $referer);
	//需要post数据
	if(is_array($post_data)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

//签到代码
$user = $_GET['user'];//用户名
$pwd = $_GET['pwd'];//密码

//存放Cookies的文件
$cookie_file = tempnam('./','cookie');

$baseUrl = "http://115.com";//115主页
$loginUrl = "http://passport.115.com//?ct=login&ac=ajax&is_ssl=1";//登录链接
$signInfoUrl = "http://115.com/?ct=event&ac=get_active_param";//获取签到信息的URL
$signSubmitUrl = "http://115.com/?ct=ajax_user&ac=checkin";//提交签到请求的URL
$yaoPageUrl = "http://115.com/?ct=yao";//摇奖页面URL
$yaoSignUrl = "http://115.com/?ct=ajax_user&ac=pick_spaces&u=1&token=";//摇奖的签到链接
//$signUrl = "http://115.com/?ct=ajax_user&ac=pick_spaces&u=1&token=cecb75ae9c54e04285d968c0ef31234b&_=1366028854220";//签到链接

//签到与摇奖所用的token，可以在获取的签到信息中得到
$token = "";

//访问115网盘首页
$res=curl_get($baseUrl, false, true);

//构造登陆需要发送的数据
$back = 'http://www.115.com';
$timeStr = time();
$ssopw = sha1(sha1(sha1($pwd).sha1($user)).$timeStr);
$login_array=array(
					'login[ssoln]'=>$user,
					'login[ssopw]'=>$ssopw,
					'login[ssovcode]'=>$timeStr,
					'login[ssoent]'=>'A1',
					'login[version]'=>'2.0',
					'login[ssoext]'=>$timeStr,
					'login[time]'=>'0',
					'back'=>$back,
                   );

//登录网站
$res = curl_get($loginUrl, true, true, $baseUrl, $login_array);
$json = json_decode($res, true);
if (!$json['state']) {
	exit('登录失败');
}

//开始签到
//获取签到信息
$res = curl_get($signInfoUrl, true, true, $baseUrl);
$json = json_decode($res, true);
$token = $json['is_take_token'];
if ($json['state']) {
	$is_checkin = $json['is_checkin'];
	if ($is_checkin == 1) {
		$signinResultStr = "今天已签到 第".$json['this_turn']."天\n";
	}
	else {
		//提交签到请求
		$post_data = array('token' => $token);
		$res = curl_get($signSubmitUrl, true, true, $baseUrl, $post_data);
		$json = json_decode($res, true);
		if ($json['state']) {
			$sb = "签到成功，";
			$sb .= "第".$json['data']['this_turn']."天，";
			$sb .= "本次奖励".$json['data']['this_turn_space']."，";
			$sb .= "下次奖励".$json['data']['next_turn_space']."\n";
			$signinResultStr = $sb;
		}
		else {
			$signinResultStr = $json['err_msg']."\n";
		}
	}
}
else {
	$signinResultStr = "115服务器错误，无法连接签到服务器\n";
}

//开始摇奖
//访问摇奖页面并用正则表达式提取包含在JS中的token
$res = curl_get($yaoPageUrl, true, true, $baseUrl);

//用正则查找token
preg_match("/take_token.*=.*'(.+)'/i" , $res , $matches);
if (isset($matches[1])) {
	$token = $matches[1];
	$yaoSignUrl = $yaoSignUrl.$token."&_=".time();
	$res = curl_get($yaoSignUrl, true, true, $baseUrl);
	$json = json_decode($res, true);
	if ($json['state']) {
		//签到成功
		$picked = $json['picked'];
		$totalSize = $json['total_size'];
		$exp = $json['exp'];
		$resultStr = "摇奖成功，获得".$picked."空间，账户总容量".$totalSize."，总经验值".$exp;
	}
	else {
		$resultStr = '登录成功，但提交摇奖请求后返回失败信息';
	}
}
else
	$resultStr = "已摇过奖到或第二次摇奖机会还没开启\n\n115网盘每日可摇奖两次，第一次机会一般是中午12点前，第二次是12点后";

$resultStr = $signinResultStr."\n".$resultStr;
echo $resultStr;
unlink($cookie_file);//删除cookie文件
?>