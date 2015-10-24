<?php
header("Content-type: text/html; charset=utf-8");
//header("Content-type: text/html; charset=gb2312"); 
//,$tid,$pid
//"st_param=pb",
//"st_type=like"

function zhihu_login(){
    //$cookie_jar = dirname(__FILE__)."\\1.txt";echo $cookie_jar;
    $header = array ('Content-Type: application/x-www-form-urlencoded');
    $data=array(
        'email=weishenmezhuceid@sina.com',
        'password=changwei',
        'remember_me=true');
    $data=implode('&', $data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://www.zhihu.com");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    print_r(curl_exec($ch));

    curl_setopt($ch, CURLOPT_URL, 'http://www.zhihu.com/login/email');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); 
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    $re = curl_exec($ch);//json_decode(curl_exec($ch)); 
    curl_close($ch);
    return $re;
}
print_r(zhihu_login());
?>