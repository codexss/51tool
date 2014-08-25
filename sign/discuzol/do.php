<?php
/*
*DiscuzX系列论坛挂在线时间
*By Perfare
*update 2014-3-23
*/
set_time_limit(0);
ignore_user_abort(true);
header("content-Type: text/html; charset=utf-8");

function curl_get($url, $use = false, $save = false, $referer = null, $post_data = null){
	global $cookie_file;
    $ch=curl_init($url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36');
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

function get_formhash($res){
	preg_match('/name="formhash" value="(.*?)"/i', $res, $matches);
	if(isset($matches))
        return $matches[1];
	else
		exit('没有找到formhash');
}


//签到代码
$user = $_GET['user'];//用户名
$pwd = $_GET['pwd'];//密码
$quest = $_GET['quest'];//密码提示问题
$answ = $_GET['answ'];//密码提示问题答案

//论坛首页地址
$baseUrl = $_GET['u'];//结尾带上”/”
//账号登录地址
$loginPageUrl = $baseUrl.'member.php?mod=logging&action=login';
//账号信息提交地址
$loginSubmitUrl = $baseUrl.'member.php?mod=logging&action=login&loginsubmit=yes&loginhash=LNvu3';
//个人资料地址
$applyUrl = $baseUrl.'home.php?mod=space';


//存放Cookies的文件
$cookie_file = tempnam('./','cookie');

//访问论坛登录页面，保存Cookies
$res=curl_get($loginPageUrl, false, true);

if(preg_match('!content=\"text/html; charset=gbk\" />!i', $res) || preg_match('!<meta charset=\"gbk\" />!i', $res))$gbk=1;else $gbk=0;

//获取DiscuzX论坛的formhash验证串
$formhash = get_formhash($res);

//构建登录信息
$login_array=array(
					'username'=>$user,
                    'password'=>$pwd,
                    'referer'=>$baseUrl,
                    'questionid'=>$quest,
                    'answer'=>$answ,
					'formhash'=>$formhash,
					);

//携带cookie提交登录信息
$res=curl_get($loginSubmitUrl ,true, true, null, $login_array);

//访问个人资料页面
$res=curl_get($applyUrl, true, false, null);
if($gbk){$res=iconv('gbk', 'UTF-8', $res);}

echo $res;
unlink($cookie_file);//删除cookie文件
?>