<?php 
/*
费率参数发送微信云数据库
 */
require 'config.php';
include 'curlCenter.class.php';

$str ='{"cardfee":[{"id":"21","cid":"0","fid":"12"},{"id":"22","cid":"1","fid":"32"}],"costday":[{"id":"12","name":"小荧星","money":"80.00","crossnight":null},{"id":"21","name":"中福彩","money":"80.00","crossnight":null},{"id":"22","name":"渝兴川菜","money":"80.00","crossnight":null},{"id":"23","name":"金乐汇","money":"80.00","crossnight":null},{"id":"24","name":"临时用户","money":"80.00","crossnight":null},{"id":"25","name":"东方航空","money":"0.00","crossnight":null},{"id":"26","name":"第一财经","money":"0.00","crossnight":null},{"id":"27","name":"欣起源","money":"80.00","crossnight":null},{"id":"28","name":"光大银行","money":"0.00","crossnight":null},{"id":"29","name":"小荧星周末","money":"80.00","crossnight":null},{"id":"30","name":"520","money":"80.00","crossnight":null},{"id":"31","name":"特殊车辆 ","money":"0.00","crossnight":null},{"id":"32","name":"长期卡","money":"0.00","crossnight":null}],"costdaydetail":[{"id":"1","did":"1","hid":"1"},{"id":"2","did":"2","hid":"2"},{"id":"3","did":"3","hid":"3"},{"id":"4","did":"4","hid":"4"},{"id":"5","did":"5","hid":"5"},{"id":"6","did":"6","hid":"6"},{"id":"7","did":"1","hid":"7"},{"id":"8","did":"2","hid":"8"},{"id":"9","did":"3","hid":"9"},{"id":"10","did":"4","hid":"10"},{"id":"11","did":"7","hid":"11"},{"id":"15","did":"13","hid":"18"},{"id":"19","did":"14","hid":"15"},{"id":"21","did":"14","hid":"18"},{"id":"24","did":"14","hid":"20"},{"id":"25","did":"14","hid":"21"},{"id":"26","did":"14","hid":"23"},{"id":"28","did":"14","hid":"25"},{"id":"31","did":"12","hid":"17"},{"id":"33","did":"12","hid":"28"},{"id":"34","did":"12","hid":"29"},{"id":"35","did":"14","hid":"17"},{"id":"36","did":"14","hid":"24"},{"id":"37","did":"14","hid":"28"},{"id":"38","did":"14","hid":"29"},{"id":"43","did":"15","hid":"32"},{"id":"44","did":"15","hid":"33"},{"id":"47","did":"16","hid":"32"},{"id":"48","did":"16","hid":"33"},{"id":"52","did":"15","hid":"31"},{"id":"53","did":"15","hid":"34"},{"id":"54","did":"15","hid":"35"},{"id":"58","did":"19","hid":"30"},{"id":"65","did":"21","hid":"38"},{"id":"66","did":"21","hid":"39"},{"id":"67","did":"21","hid":"40"},{"id":"68","did":"22","hid":"41"},{"id":"69","did":"22","hid":"42"},{"id":"70","did":"22","hid":"43"},{"id":"71","did":"22","hid":"44"},{"id":"72","did":"22","hid":"45"},{"id":"86","did":"27","hid":"50"},{"id":"87","did":"27","hid":"51"},{"id":"92","did":"30","hid":"52"},{"id":"93","did":"30","hid":"53"},{"id":"94","did":"24","hid":"48"},{"id":"95","did":"28","hid":"16"},{"id":"96","did":"26","hid":"16"},{"id":"97","did":"31","hid":"54"},{"id":"104","did":"32","hid":"54"},{"id":"105","did":"23","hid":"47"},{"id":"107","did":"23","hid":"46"},{"id":"108","did":"29","hid":"49"},{"id":"109","did":"29","hid":"56"},{"id":"112","did":"12","hid":"36"},{"id":"113","did":"12","hid":"37"},{"id":"114","did":"12","hid":"57"}],"costhour":[{"id":"16","name":"长期用户","money":null,"starttime":"","endtime":"","cishu":"999"},{"id":"36","name":"小荧星","money":"80.00","starttime":"00:00:00","endtime":"17:59:59","cishu":"999"},{"id":"37","name":"小荧星折扣","money":null,"starttime":"18:00:00","endtime":"20:29:59","cishu":"999"},{"id":"38","name":"中福彩白天","money":null,"starttime":"00:00:00","endtime":"17:30:00","cishu":"999"},{"id":"39","name":"中福彩晚上","money":null,"starttime":"17:30:01","endtime":"22:00:00","cishu":"999"},{"id":"40","name":"中福彩夜间","money":null,"starttime":"22:00:01","endtime":"23:59:59","cishu":"999"},{"id":"41","name":"川菜白天","money":null,"starttime":"00:00:00","endtime":"11:00:00","cishu":"999"},{"id":"42","name":"川菜中午","money":null,"starttime":"11:00:01","endtime":"14:00:00","cishu":"999"},{"id":"43","name":"川菜下午","money":null,"starttime":"14:00:01","endtime":"17:30:00","cishu":"999"},{"id":"44","name":"川菜晚上","money":null,"starttime":"17:30:01","endtime":"21:00:00","cishu":"999"},{"id":"45","name":"川菜夜间","money":null,"starttime":"21:00:01","endtime":"23:59:59","cishu":"999"},{"id":"46","name":"金乐汇夜间","money":"80.00","starttime":"10:00:00","endtime":"02:00:00","cishu":"999"},{"id":"47","name":"金乐汇白天","money":"80.00","starttime":"02:00:01","endtime":"09:59:59","cishu":"999"},{"id":"48","name":"临时 ","money":null,"starttime":"","endtime":"","cishu":"999"},{"id":"49","name":"小荧星周末白天","money":"80.00","starttime":"09:00:00","endtime":"18:30:00","cishu":"999"},{"id":"50","name":"欣起源收费","money":null,"starttime":"02:00:00","endtime":"10:00:00","cishu":"999"},{"id":"51","name":"欣起源免费","money":null,"starttime":"10:00:01","endtime":"01:59:59","cishu":"999"},{"id":"52","name":"mf","money":null,"starttime":"","endtime":"14:00:00","cishu":"999"},{"id":"53","name":"mf1","money":null,"starttime":"14:00:01","endtime":"10:59:59","cishu":"999"},{"id":"54","name":"特殊车辆","money":null,"starttime":"","endtime":"","cishu":"999"},{"id":"56","name":"小荧星周末晚上","money":"80.00","starttime":"18:30:00","endtime":"08:59:59","cishu":"999"},{"id":"57","name":"小荧星夜间","money":null,"starttime":"20:30:00","endtime":"23:59:59","cishu":"999"}],"costhourdetail":[{"id":"4","hid":"2","cid":"10"},{"id":"5","hid":"2","cid":"11"},{"id":"6","hid":"2","cid":"12"},{"id":"7","hid":"3","cid":"13"},{"id":"9","hid":"4","cid":"15"},{"id":"11","hid":"5","cid":"17"},{"id":"12","hid":"5","cid":"18"},{"id":"13","hid":"6","cid":"19"},{"id":"16","hid":"7","cid":"20"},{"id":"17","hid":"2","cid":"23"},{"id":"19","hid":"8","cid":"21"},{"id":"20","hid":"9","cid":"14"},{"id":"21","hid":"10","cid":"16"},{"id":"22","hid":"11","cid":"25"},{"id":"29","hid":"1","cid":"7"},{"id":"32","hid":"1","cid":"8"},{"id":"33","hid":"1","cid":"9"},{"id":"34","hid":"1","cid":"22"},{"id":"35","hid":"3","cid":"26"},{"id":"36","hid":"4","cid":"27"},{"id":"37","hid":"11","cid":"28"},{"id":"38","hid":"5","cid":"29"},{"id":"39","hid":"15","cid":"32"},{"id":"43","hid":"15","cid":"36"},{"id":"44","hid":"15","cid":"37"},{"id":"45","hid":"15","cid":"38"},{"id":"46","hid":"16","cid":"39"},{"id":"50","hid":"16","cid":"40"},{"id":"52","hid":"15","cid":"35"},{"id":"56","hid":"18","cid":"44"},{"id":"57","hid":"18","cid":"45"},{"id":"58","hid":"17","cid":"41"},{"id":"59","hid":"17","cid":"42"},{"id":"60","hid":"17","cid":"46"},{"id":"61","hid":"17","cid":"43"},{"id":"62","hid":"19","cid":"47"},{"id":"63","hid":"19","cid":"48"},{"id":"64","hid":"19","cid":"49"},{"id":"67","hid":"18","cid":"51"},{"id":"69","hid":"20","cid":"53"},{"id":"74","hid":"23","cid":"56"},{"id":"77","hid":"16","cid":"57"},{"id":"89","hid":"24","cid":"58"},{"id":"92","hid":"27","cid":"59"},{"id":"96","hid":"29","cid":"59"},{"id":"99","hid":"28","cid":"56"},{"id":"100","hid":"28","cid":"34"},{"id":"101","hid":"17","cid":"33"},{"id":"102","hid":"17","cid":"34"},{"id":"104","hid":"17","cid":"60"},{"id":"105","hid":"24","cid":"61"},{"id":"106","hid":"28","cid":"60"},{"id":"107","hid":"29","cid":"61"},{"id":"127","hid":"36","cid":"62"},{"id":"128","hid":"36","cid":"66"},{"id":"129","hid":"37","cid":"62"},{"id":"130","hid":"37","cid":"66"},{"id":"136","hid":"39","cid":"71"},{"id":"137","hid":"40","cid":"72"},{"id":"139","hid":"41","cid":"75"},{"id":"140","hid":"42","cid":"76"},{"id":"142","hid":"44","cid":"78"},{"id":"145","hid":"46","cid":"83"},{"id":"146","hid":"46","cid":"84"},{"id":"157","hid":"16","cid":"95"},{"id":"164","hid":"50","cid":"103"},{"id":"165","hid":"50","cid":"102"},{"id":"166","hid":"51","cid":"104"},{"id":"167","hid":"52","cid":"105"},{"id":"173","hid":"53","cid":"106"},{"id":"177","hid":"46","cid":"85"},{"id":"178","hid":"46","cid":"86"},{"id":"179","hid":"46","cid":"87"},{"id":"180","hid":"46","cid":"88"},{"id":"181","hid":"46","cid":"89"},{"id":"182","hid":"46","cid":"90"},{"id":"183","hid":"46","cid":"91"},{"id":"184","hid":"46","cid":"92"},{"id":"185","hid":"46","cid":"93"},{"id":"195","hid":"38","cid":"73"},{"id":"197","hid":"54","cid":"95"},{"id":"200","hid":"41","cid":"109"},{"id":"201","hid":"43","cid":"110"},{"id":"202","hid":"45","cid":"111"},{"id":"203","hid":"41","cid":"112"},{"id":"215","hid":"49","cid":"99"},{"id":"216","hid":"49","cid":"108"},{"id":"221","hid":"55","cid":"116"},{"id":"223","hid":"37","cid":"114"},{"id":"224","hid":"37","cid":"115"},{"id":"225","hid":"47","cid":"102"},{"id":"230","hid":"48","cid":"118"},{"id":"235","hid":"48","cid":"98"},{"id":"236","hid":"48","cid":"97"},{"id":"237","hid":"56","cid":"121"},{"id":"238","hid":"56","cid":"122"},{"id":"239","hid":"36","cid":"67"},{"id":"240","hid":"36","cid":"69"},{"id":"241","hid":"57","cid":"123"}],"costpiece":[{"CP_ID":"67","CP_NAME":"小荧星30分钟","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"16"},{"CP_ID":"68","CP_NAME":"小荧星6元","CP_TIME":"01:00","CP_MONEY":"6.00","CP_COUNT":"6"},{"CP_ID":"69","CP_NAME":"小荧星白天补","CP_TIME":"10:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"70","CP_NAME":"中福彩10元","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"8"},{"CP_ID":"71","CP_NAME":"中福彩6元","CP_TIME":"01:00","CP_MONEY":"6.00","CP_COUNT":"6"},{"CP_ID":"72","CP_NAME":"中福彩10元2","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"2"},{"CP_ID":"73","CP_NAME":"中福彩10元补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"9"},{"CP_ID":"74","CP_NAME":"川菜10元","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"76","CP_NAME":"川菜3小时免费","CP_TIME":"03:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"77","CP_NAME":"川菜10元2","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"78","CP_NAME":"川菜3小时免费2","CP_TIME":"03:30","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"79","CP_NAME":"川菜10元3","CP_TIME":"01:30","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"80","CP_NAME":"川菜10元4","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"81","CP_NAME":"金乐汇10元","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"8"},{"CP_ID":"82","CP_NAME":"金乐汇10元补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"2"},{"CP_ID":"83","CP_NAME":"金乐汇5元1","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"84","CP_NAME":"金乐汇5元1补","CP_TIME":"02:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"85","CP_NAME":"金乐汇5元2","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"86","CP_NAME":"金乐汇5元2补","CP_TIME":"02:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"87","CP_NAME":"金乐汇5元3","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"88","CP_NAME":"金乐汇5元3补","CP_TIME":"02:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"89","CP_NAME":"金乐汇5元4","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"90","CP_NAME":"金乐汇5元4补","CP_TIME":"02:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"91","CP_NAME":"金乐汇5元5","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"92","CP_NAME":"金乐汇5元5补","CP_TIME":"02:30","CP_MONEY":"5.00","CP_COUNT":"1"},{"CP_ID":"93","CP_NAME":"金乐汇5元6","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"2"},{"CP_ID":"94","CP_NAME":"金乐汇5元7","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"14"},{"CP_ID":"95","CP_NAME":"免费","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"999"},{"CP_ID":"96","CP_NAME":"临时10元","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"97","CP_NAME":"临时10元补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"16"},{"CP_ID":"98","CP_NAME":"临时5元","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"14"},{"CP_ID":"99","CP_NAME":"小荧星周末6元首次","CP_TIME":"01:00","CP_MONEY":"6.00","CP_COUNT":"1"},{"CP_ID":"100","CP_NAME":"小荧星周末 补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"16"},{"CP_ID":"101","CP_NAME":"欣起源","CP_TIME":"16:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"102","CP_NAME":"金乐汇半小时","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"16"},{"CP_ID":"103","CP_NAME":"欣起源一小时","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"104","CP_NAME":"欣起源免费","CP_TIME":"16:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"105","CP_NAME":"免费3小时","CP_TIME":"03:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"106","CP_NAME":"3","CP_TIME":"13:00","CP_MONEY":"0.00","CP_COUNT":"1"},{"CP_ID":"107","CP_NAME":"金乐会首小时","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"108","CP_NAME":"小荧星3元","CP_TIME":"00:30","CP_MONEY":"3.00","CP_COUNT":"17"},{"CP_ID":"109","CP_NAME":"川菜10元","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"16"},{"CP_ID":"110","CP_NAME":"川菜10元","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"7"},{"CP_ID":"111","CP_NAME":"川菜10元4","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"6"},{"CP_ID":"112","CP_NAME":"川菜10元补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"3"},{"CP_ID":"114","CP_NAME":"小荧星折扣首小时6元","CP_TIME":"01:00","CP_MONEY":"6.00","CP_COUNT":"1"},{"CP_ID":"115","CP_NAME":"小荧星折扣3元","CP_TIME":"00:30","CP_MONEY":"3.00","CP_COUNT":"3"},{"CP_ID":"116","CP_NAME":"小荧星折扣22点","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"4"},{"CP_ID":"117","CP_NAME":"小荧星半小时","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"14"},{"CP_ID":"118","CP_NAME":"临时首10元","CP_TIME":"01:00","CP_MONEY":"10.00","CP_COUNT":"1"},{"CP_ID":"119","CP_NAME":"小荧星10元补","CP_TIME":"01:00","CP_MONEY":"0.00","CP_COUNT":"14"},{"CP_ID":"120","CP_NAME":"小荧星周末首小时6元","CP_TIME":"01:00","CP_MONEY":"6.00","CP_COUNT":"1"},{"CP_ID":"121","CP_NAME":"小荧星周末晚上","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"16"},{"CP_ID":"122","CP_NAME":"小荧星周末晚上补","CP_TIME":"00:30","CP_MONEY":"0.00","CP_COUNT":"13"},{"CP_ID":"123","CP_NAME":"小荧星夜间","CP_TIME":"00:30","CP_MONEY":"5.00","CP_COUNT":"7"}],"costdayfreetime":[],"freetime":[{"FT_ID":"1","FT_NAME":"15分钟免费","FT_TIME":"00:15","FT_COUNT":null,"COUNTTYPE":"1"}],"signData":{"tmptime":"1507525922","ramdomStr":"bno4SKyN0","sign":"374BDAAE502798B603C76849D53238A2"},"host":"longtone2.com"}';

	// $str = str_replace("'\'", '', $str);
	
	echo '<pre>';
	// echo $str;
	// echo '<br />';
	//数组转字符串
	// echo json_encode($str,JSON_UNESCAPED_UNICODE);
	var_dump(json_decode($str,true) );
	echo '</pre>';
	exit;


$curlCenter = new curlCenter($park_host,$park_token);

$dbh = new PDO($dsn, $user, $pass);

//cardfee
$res1  =array();
$sql1 = "select * from cardfee where cid = 8";
$res = $dbh->query($sql1)->fetch(PDO::FETCH_ASSOC);
array_push($res1,$res);
$arr['cardfee'] = $res1;

//costday
$res2 = array();
for ($i=0; $i <count($res1) ; $i++) { 
	$sql2 = "select * from costday where id = '{$res1[$i]['fid']}'";
	$res = $dbh->query($sql2)->fetch(PDO::FETCH_ASSOC);
	array_push($res2,$res);
	// unset($res);
}
$arr['costday'] = $res2;

//costdaydetail
$res3 = array();
for ($i=0; $i <count($res2) ; $i++) { 
	$sql3 = "select * from costdaydetail where did = '{$res2[$i]['id']}'";
	$res = $dbh->query($sql3)->fetch(PDO::FETCH_ASSOC);
	array_push($res3,$res);
	// unset($res);
}
$arr['costdaydetail'] = $res3;




//costhour
$res4  =array();
for ($i=0; $i <count($res3) ; $i++) { 
	$sql4 = "select * from costhour where id = '{$res3[$i]['hid']}' ";
	$res = $dbh->query($sql4)->fetch(PDO::FETCH_ASSOC);
	array_push($res4,$res);
	// unset($res);
}
$arr['costhour'] = $res4;




//costhourdetail
$res5 = array();
for ($i=0; $i <count($res4) ; $i++) { 
	$sql5 = "select * from costhourdetail where hid = '{$res4[$i]['id']}' ";
	$res = $dbh->query($sql5)->fetch(PDO::FETCH_ASSOC);
	array_push($res5,$res);
	// unset($res);
}
$arr['costhourdetail'] = $res5;



//costpiece
$res6 = array();
for ($i=0; $i <count($res5) ; $i++) { 
	$sql6 = "select * from CostPiece where CP_ID = '{$res5[$i]['cid']}' ";
	$res = $dbh->query($sql6)->fetch(PDO::FETCH_ASSOC);
	array_push($res6,$res);
	// unset($res);
}
$arr['costpiece'] = $res6;



//costdayfreetime
$res7 = array();
for ($i=0; $i <count($res6) ; $i++) { 
	$sql7 = "select * from costdayFreeTime where did = '{$res2[$i]['id']}' ";
	$res = $dbh->query($sql7)->fetch(PDO::FETCH_ASSOC);
	array_push($res7,$res);
	// unset($res);
}
$arr['costdayfreetime'] = $res7;



//freetime
$res8 = array();
for ($i=0; $i <count($res6) ; $i++) { 
	$sql8 = "select * from FreeTime where FT_ID = '{$res7[$i]['fid']}' ";
	$res = $dbh->query($sql8)->fetch(PDO::FETCH_ASSOC);
	array_push($res8,$res);
	// unset($res);
}
$arr['freetime'] = $res8;


//  echo json_encode($arr,JSON_UNESCAPED_UNICODE);

// exit;

// 测试url
$url = "http://longtone.com/weixin.php/Api/getCost";

$result = $curlCenter->doPost($url,$arr);

    //调用记录
    file_put_contents('./log/'.date('Y-m-d',time()).'sendCost.txt','调用时间'.date('Y-m-d H:i:s',time())."\t"
        .'cost：'.json_encode($arr,JSON_UNESCAPED_UNICODE)."\r\n",FILE_APPEND);

//请求成功输出1
echo $result;


// {
//     "cardfee":[{"id":"15","cid":"8","fid":"57"}],
//     "costday":[{"id":"57","name":"收费","money":"80.00","crossnight":null}],
//     "costdaydetail":[{"id":"17","did":"57","hid":"1"}],
//     "costhour":[{"id":"1","name":"临时收费","money":"80.00","starttime":"","endtime":"","cishu":"9"}],
//     "costhourdetail":[{"id":"62","hid":"1","cid":"3"}],
//     "costpiece":[{"CP_ID":"3","CP_NAME":"首小时10元","CP_TIME":"01:00","CP_MONEY":".01","CP_COUNT":"1"}],"costdayfreetime":[{"id":"17","did":"57","fid":"1"}],
//     "freetime":[{"FT_ID":"1","FT_NAME":"免费时间","FT_TIME":" 0:15","FT_COUNT":null,"COUNTTYPE":"1"}],
//     "signData":{"tmptime":1506417028,"randomStr":"zzbYVtfrC","sign":"6FA3A4346AA5081F4B294E310E083541"},
//     "host":"longtone.com"
// }


// Array ( [cardfee] => Array ( [0] => Array ( [id] => 15 [cid] => 8 [fid] => 57 ) ) [costday] => Array ( [0] => Array ( [id] => 57 [name] => 收费 [money] => 80.00 [crossnight] => ) ) [costdaydetail] => Array ( [0] => Array ( [id] => 17 [did] => 57 [hid] => 1 ) ) [costhour] => Array ( [0] => Array ( [id] => 1 [name] => 临时收费 [money] => 80.00 [starttime] => [endtime] => [cishu] => 9 ) ) [costhourdetail] => Array ( [0] => Array ( [id] => 62 [hid] => 1 [cid] => 3 ) ) [costpiece] => Array ( [0] => Array ( [CP_ID] => 3 [CP_NAME] => 首小时10元 [CP_TIME] => 01:00 [CP_MONEY] => .01 [CP_COUNT] => 1 ) ) [costdayfreetime] => Array ( [0] => Array ( [id] => 17 [did] => 57 [fid] => 1 ) ) [freetime] => Array ( [0] => Array ( [FT_ID] => 1 [FT_NAME] => 免费时间 [FT_TIME] => 0:15 [FT_COUNT] => [COUNTTYPE] => 1 ) ) [signData] => Array ( [tmptime] => 1506667113 [randomStr] => zj0xOpFCP [sign] => 1079FD45274E15A494BEBA5D5FC8B2DA ) [host] => longtone2.com )


// [
// 	 'cardfee' => [  [ 'id' => '15' ,'cid' => 8 [fid] => 57 ] ] 

// 	 [costday] => Array ( [0] => Array ( [id] => 57 [name] => 收费 [money] => 80.00 [crossnight] => ) ) 
// 	 [costdaydetail] => Array ( [0] => Array ( [id] => 17 [did] => 57 [hid] => 1 ) ) 
// 	 [costhour] => Array ( [0] => Array ( [id] => 1 [name] => 临时收费 [money] => 80.00 [starttime] => [endtime] => [cishu] => 9 ) ) 
// 	 [costhourdetail] => Array ( [0] => Array ( [id] => 62 [hid] => 1 [cid] => 3 ) ) 
// 	 [costpiece] => Array ( [0] => Array ( [CP_ID] => 3 [CP_NAME] => 首小时10元 [CP_TIME] => 01:00 [CP_MONEY] => .01 [CP_COUNT] => 1 ) ) 
// 	 [costdayfreetime] => Array ( [0] => Array ( [id] => 17 [did] => 57 [fid] => 1 ) ) 
// 	 [freetime] => Array ( [0] => Array ( [FT_ID] => 1 [FT_NAME] => 免费时间 [FT_TIME] => 0:15 [FT_COUNT] => [COUNTTYPE] => 1 ) ) 
// 	 [signData] => Array ( [tmptime] => 1506667113 [randomStr] => zj0xOpFCP [sign] => 1079FD45274E15A494BEBA5D5FC8B2DA ) 
// 	 [host] => longtone2.com 
// ]
// ['id'=>'1','name'=>'longtone']