<?php 
//token 
        $arr['token'] = "longtone";

        $arr['tmptime'] = '1507535285';
        $arr['randomStr'] = 'UYoau4MM8';

       $sign = 'BB7A0EA8FD221A3BAEAF78EE4F7AC6CC';

        //字典排序
        sort($arr);
        //拼接字符串
        $str = implode($arr);


        var_dump($str);
        //md5加密
        $signstr =md5($str);
        $newSign = strtoupper($signstr);

    	var_dump('发过来的sign:'.$sign);
    	var_dump('重新加密的：'.$newSign);
       // exit;
       echo '<br />';

    	if($sign == $newSign) {
    		echo '验证成功';
    	}else{
    		echo '验证失败';
    	}