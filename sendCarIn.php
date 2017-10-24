<?php 
/*
向微信发送入库信息
 */
require 'config.php';
require 'curlCenter.class.php';


$str = '{"car_num":"沪b12121","carno":"沪b12121","in_date":"2017-09-30 13:34:29","c_type":"0","count_place":"6","indoorid":"1","signData":{"tmptime":1506749669,"randomStr":"zQInV5JrI","sign":"BDF5042B080E963B98DB875ABECCDECC"},"host":"longtone2.com"}';

// var_dump($arr);
// var_dump($arr);
var_dump(json_decode($str,true));
exit;









$curlCenter = new curlCenter($park_host,$park_token);

$dbh = new PDO($dsn, $user, $pass);

date_default_timezone_set('prc');
		// 1505285394
	if ( !isset($_GET['carNum']) || !isset($_GET['indate']) || !isset($_GET['c_type']) || !isset($_GET['indoorid']) ) {
		
		$msg['code'] = 0;
		$msg['msg'] = '参数不完整';
		echo json_encode($msg,JSON_UNESCAPED_UNICODE);
		exit;
	}

	//调用记录
	file_put_contents(__DIR__.'/log/'.date('Y-m-d',time()).'sendCarIn.txt','写入时间'.date('Y-m-d H:i:s',time())."\t"
		.'carNum'.$_GET['carNum']."\t"
	    .'indate'.$_GET['indate']."\t"
	    .'c_type'.$_GET['c_type']."\t"
	    .'indoorid'.$_GET['indoorid']."\r\n"
	    ,FILE_APPEND);
	
	
	//车牌处理
	$carNum = $_GET['carNum'];
    if (!empty($_GET['carno'])) {
        $carno = $_GET['carno'];
    } else {
        $carno = $carNum;
    }

    if(strlen($carNum)==9){
        $str = substr($carNum, -6);
        //新能源车牌
    }elseif(strlen($carNum)==10){
        $str = substr($carNum,-7);
    }else{
        $msg['code'] = 0;
		$msg['msg'] = '车牌不正确';
		echo json_encode($msg,JSON_UNESCAPED_UNICODE);
		exit;
    }

	// 用户类型
	if($_GET['c_type']=='长期用户'){
        $c_type='1';
    }elseif($_GET['c_type']=='临时用户'){
        $c_type='0';
    }

    //入库车辆数
    $sql = "select count(id) total  from Carin ";

    $count  =$dbh->query($sql)->fetch(PDO::FETCH_ASSOC);

    // var_dump($res);
    // exit;
	//测试url
	$url = "http://longtone.com/weixin.php/Api/getCarIn";

	
	$arr['car_num']=$carNum;
	$arr['carno'] = $carno;
	// $arr['in_date']=date("Y-m-d H:i:s" ,$_GET['indate']);
	$arr['in_date']=date("Y-m-d H:i:s" ,time());
	$arr['c_type']=$c_type;
	$arr['count_place']=$count['total'];
	$arr['indoorid']  =$_GET['indoorid'];
	// var_dump($arr);
	// exit;

	$curlCenter = new curlCenter($park_host,$park_token);

	$res = $curlCenter->doPost($url,$arr);

	echo $res;
	

