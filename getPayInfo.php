<?php 
/**
 * 接收微信支付信息
 */
include 'config.php';
include 'curlCenter.class.php';

$curlCenter = new curlCenter($park_host,$park_token);
// 验证请求者
$res = $curlCenter->verifySign();


if (!$res) {
	$msg['code'] = 0;
	$msg['msg'] = '非法请求';

	echo json_encode($msg,JSON_UNESCAPED_UNICODE);
	exit;
}

$order = $_POST['order'];
$signData = $_POST['signData'];

if ( !isset($order['car_num']) || !isset($order['in_date']) || !isset($order['pay_date']) || !isset($order['money']) || !isset($order['costtype']) || !isset($order['c_type']) || !isset($order['in_door_id']) || !isset($signData['sign']) || !isset($signData['tmptime']) || !isset($signData['randomStr']) ) {
	$msg['code'] = 0;
	$msg['msg'] = '缺少参数';

	echo json_encode($msg,JSON_UNESCAPED_UNICODE);
	exit;
}


//调用记录
file_put_contents(__DIR__.'/log/'.date('Y-m-d',time()).'getPayInfo.txt','写入时间'.date('Y-m-d H:i:s',time())."\t"
	.'停车场'.$order['park_id']."\t"
    .'订单'.$order['order_no']."\t"
    .'用户'.$order['user_id']."\t"
    .'钱'.$order['money']."\t"
    .'入库时间'.$order['in_date']."\t"
    .'查询时间'.$order['end_date']."\t"
    .'车牌号'.$order['car_num']."\t"
    .'是否支付：'.$order['is_pay']."\t"
    .'支付时间：'.$order['pay_date']."\t"
    .'c_type：'.$order['c_type']."\t"
    .'costtype：'.$order['costtype']."\t"
    .'in_door_id：'.$order['in_door_id']."\r\n"
    ,FILE_APPEND);

date_default_timezone_set('prc');

$card_id=$order['car_num'];
$in_date=$order['in_date'];


$cid=$card_id.$in_date;

//这种时间存不了
$pay_date=$order['pay_date'];
// var_dump($pay_date);
// exit;

if ($pay_date == "0000-00-00 00:00:00") {
	$pay_date =date('Y-m-d H:i:s',time());
}

$money=$order['money'];
$costtype=$order['costtype'];
$inid=$order['in_door_id'];
$c_type=$order['c_type'];

$dbh = new PDO($dsn, $user, $pass);
$sql="insert into CentralCharge (cid,Card_id,in_date,pay_date,money,costtype,inid,c_type) values
('$cid','$card_id','$in_date','$pay_date','$money','$costtype','$inid','$c_type')";
$result=$dbh->exec($sql);

if ($result) {
	$msg['code'] = 1;
	$msg['msg'] = '支付信息写入成功';

}else{
	$msg['code'] = 0;
	$msg['msg'] = '支付信息写入失败';
}

echo json_encode($msg,JSON_UNESCAPED_UNICODE);


