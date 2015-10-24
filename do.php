<?php 
function zhihu_zan($answer_id,$z_c0,$_xsrf){
    //$cookie_jar = dirname(__FILE__)."\\1.txt";echo $cookie_jar;
    $header = array ('Content-Type: application/x-www-form-urlencoded',
			        'Cookie: z_c0="'.$z_c0.'"; _xsrf='.$_xsrf.';',
			        'Referer: http://www.zhihu.com/',
			        'User-Agent: Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36',
			        'Origin: http://www.zhihu.com',
			        'X-Requested-With: XMLHttpRequest');
    $data=array('method=vote_up','params={"answer_id":"'.$answer_id.'"}','_xsrf='.$_xsrf);
    $data=implode('&', $data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.zhihu.com/node/AnswerVoteBarV2');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); 
    //curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    $re = curl_exec($ch);//json_decode(curl_exec($ch)); 
    curl_close($ch);
    return $re;
}
print_r(zhihu_login());
?>