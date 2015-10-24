<?php
    $link = mysql_connect('127.0.0.1','root','123456');
    mysql_query("SET NAMES 'utf8'");
    $shijian = date('y-m-d h:i:s',time());
    $ip = $_SERVER["REMOTE_ADDR"];
    mysql_select_db('zhihu', $link);