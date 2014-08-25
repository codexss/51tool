<?php
/*
*虾米音乐签到
*在代码里填上你的用户名和密码~
*By Perfare (www.perfare.net)
*update 2014-3-23
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
$user = $_GET['user'];;//用户名
$pwd = $_GET['pwd'];//密码

//登录地址
$loginUrl = 'http://www.xiami.com/web/login';
//签到页面的地址
$signPageUrl = 'http://www.xiami.com/web';

//存放Cookies的文件
$cookie_file = tempnam('./','cookie');

//设置登录需要提交的数据
$login_array=array(
                    'email'=>$user,
                    'password'=>$pwd,
                    'LoginButton'=>'登录',
                   );

//直接提交数据(如果要验证码也没办法了)
$res = curl_get($loginUrl, false, true, null, $login_array);

//访问签到页面
$res = curl_get($signPageUrl, true, true);

//判断今天是否已经签过到
if(strpos($res, '已连续签到')){
	preg_match('/<div class="idh">(.+)<\/div>/i' , $res , $matches);
	$continueDays = '，'.$matches[1];
	$resultStr = "今天已签过到".$continueDays;
}
else if(strpos($res, '每日签到')){
		//构造提交签到信息的URL
		//用正则获取check_in
  		preg_match('/<a class="check_in" href="(.+)">每日签到<\/a>/i' , $res , $matches);
		$signUrl = 'http://www.xiami.com'.$matches[1];
		
		//提交签到请求
		$res = curl_get($signUrl, true, true, 'http://www.xiami.com/web');

		//判断是否签到成功(再次访问主页)
		$res = curl_get($signPageUrl, true, true);
		if(strpos($res, '已连续签到')){
			preg_match('/<div class="idh">(.+)<\/div>/i' , $res , $matches);
			$continueDays = '，'.$matches[1];
			$resultStr = "签到成功".$continueDays;
		}
		else
			$resultStr = '签到失败';
	}
	else
		$resultStr = '登录失败,可能是需要验证码';
echo $resultStr;
unlink($cookie_file);//删除cookie文件
?>