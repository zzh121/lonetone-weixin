<?php 
require 'config.php';
require 'curlCenter.class.php';

// header('Content-Type=text/xml');
// $str = '{"car_num":"测A12345","carno":"测A12346","in_date":"2017-10-09 14:30:30","c_type":"0","count_place":"20","indoorid":"1","signData":{"tmptime":"1507529058","randomStr":"wOlkK6fqy","sign":"E5665490344B466B19522E965403B38C"},"flag":"longtone2.com"}';

// $arr['startTime '] = '2017-10-24';
// $arr['carid ']  ='测试123';
// $arr['fee']  = 20;
// $arr['mobile'] = 1234567890;

$arr['carNo'] = '鄂EF7284';
$arr['indate'] = '';
$arr['Signdata'] = [
					'tmptime'=>'',
					'randomStr'=>'',
					'sign'=>''

				];
$url = "http://192.168.1.252:8080/fee";

// $curl = new curlCenter();

// $res = $curl->doPost($url,$arr);

// print_r($res);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_PORT, 8080);
// 执行后不直接打印出来
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 设置请求方式为post
curl_setopt($ch, CURLOPT_POST, true);

$arr = json_encode($arr,JSON_UNESCAPED_UNICODE);
// print_r($post_data);
// exit;
 curl_setopt($ch, CURLOPT_POSTFIELDS,$arr);

// 请求头，可以传数组
curl_setopt($ch, CURLOPT_HEADER, false);
// 跳过证书检查
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 不从证书中检查SSL加密算法是否存在
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$output = curl_exec($ch);

curl_close($ch);

var_dump($output);
echo '<br />';
print_r(json_decode($output,true));

