<?php
/*
*新浪微盘签到
*By Perfare
*/
set_time_limit(0);
ignore_user_abort(true);
header("content-Type: text/html; charset=utf-8");

function curl_get($url, $use = false, $save = false, $referer = null, $post_data = null){
	global $cookie_file;
    $ch=curl_init($url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.3.5; zh-cn; MI-ONE Plus Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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

//是否转发微博
$isSendWeibo = $_GET['weibo'];

//存放Cookies的文件
$cookie_file = tempnam('./','cookie');

$loginPageUrl = 'http://vdisk.weibo.com/wap/account/login';
$loginSubmitUrl = '';
$ssoUrl = '';// 单点登录URL
$signinfoUrl = 'http://vdisk.weibo.com/wap/api/weipan/2/checkin/checkin_info';// 检查签到状态的URL
$siginUrl = 'http://vdisk.weibo.com/wap/api/weipan/2/checkin/checkin';
$sendWeiBoUrl = 'http://vdisk.weibo.com/wap/api/weipan/2/checkin/checkin_send_weibo';

// 得带登陆页面
$res=curl_get($loginPageUrl);

// 分析登录页面的数据
preg_match('/<form action="(.*?)"/i', $res, $matches);
$action = $matches[1];
preg_match('/<input type="password" name="(.*?)"/i', $res, $matches);
$pwdFieldName = $matches[1];
preg_match('/<input type="hidden" name="backURL" value="(.*?)"/i', $res, $matches);
$backURL = $matches[1];
preg_match('/<input type="hidden" name="vk" value="(.*?)"/i', $res, $matches);
$vk = $matches[1];
$loginSubmitUrl = 'https://login.weibo.cn/login/'.$action;

// 提交登录信息
$login_array=array(
					'mobile'=>$user,
                    $pwdFieldName=>$pwd,
                    'remember'=>'',
                    'backURL'=>$backURL,
                    'backTitle'=>'手机新浪网',
					'tryCount'=>'',
					'vk'=>$vk,
					'submit'=>'登录',
					);
$res=curl_get($loginSubmitUrl ,false, true, null, $login_array);

if(strpos($res, '登录名或密码错误'))
	exit('登录名或密码错误');
if(strpos($res, '登录次数过于频繁'))
	exit('登录次数过于频繁');

// 判断是否需要输入验证码
if(strpos($res, '请输入验证码'))
	exit('需要输入验证码');

// 获取单点登录地址	
preg_match('/<a href="(.*?)">/i', $res, $matches);
$ssoUrl = $matches[1];

// 访问单点登录网址获取Cookies
$res = curl_get($ssoUrl, true, true);

// 先检查今天是否已经签过到
$res = curl_get($signinfoUrl, true, true, $loginPageUrl);
if(strpos($res, 'als'))
{
	// 今天还没签过到
	// 访问签到链接，并获取签到返回的Json数据
	// {"error_code":"C1","error":"\u5df2\u7ecf\u7b7e\u5230\u8fc7\u4e86"}
	// //今天已签过到
	// [346,4] //获得346M空间，4星级运气
	$res = curl_get($siginUrl, true, true, $ssoUrl);
	if(strpos($res, 'error_code\":\"C1'))
	{
		$resultStr = '今天已签过到';
	}
	else
	{
		$res = substr($res, 1);
		$res = substr($res, 0, strlen($res)-1);
		list($signedSpace, $luck) = explode(",", $res);
		
		// 获取配置信息里是否需要转发微博的配置
		if($isSendWeibo == false)
		{
			$resultStr = '签到成功，根据用户设置不转发微博，共获得'.$signedSpace.'M空间';
		}
		else
		{
			$sendWeiBoMsg = "我刚刚签到微盘，增加了".$signedSpace."M空间";
			$post_data = array('msg' => $sendWeiBoMsg);
			$weiboAwardSpace = curl_get($sendWeiBoUrl ,true, true, $loginSubmitUrl, $post_data);
			$totalSpace = $signedSpace + $weiboAwardSpace;
			$resultStr = "签到获得".$signedSpace."M空间，转发微博成功获得".$weiboAwardSpace."M空间，共获得".$totalSpace."M空间";
		}
	}
}
else
{
	$json = json_decode($res, true);
	$size = $json[size];
	$sent_weibo_size = $json[sent_weibo_size];
	$totalSize = $size + $sent_weibo_size;
	$resultStr = '今天已签过到，共获得'.$totalSize.'M空间';
}
echo $resultStr;
unlink($cookie_file);//删除cookie文件
?>