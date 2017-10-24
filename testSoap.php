<?php 

 $Client=new SoapClient("http://192.168.1.252/ParkServie/Service.asmx?wsdl");
 // $Client=new SoapClient(" http://192.168.1.252/ParkServie/Service.asmx?wsdl");

 // http://192.168.1.252/ParkServie/Service.asmx?startTime=2016-10-24&cardid=232&fee=200&mobile=123456778
 
 if($Client){
  //解决中文乱码问题
    $Client->soap_defencoding = 'utf-8';
     $Client->decode_utf8 = false;
    $Client->xml_encoding = 'utf-8';

    // $param=array('startTime'=>"2016-10-24",'cardid'=>'2312','fee'=>'1','mobile'=>'1231321');

    try{

        // $result=$Client->__soapCall("makeApp",array());
        
        $result = $Client->makeApp( array('startTime'=>"2016-10-24",'cardid'=>'2312','fee'=>'1','mobile'=>'1231321') );

        // echo ("SOAP服务器提供的开放函数:");
        // echo ('<pre>');
        // var_dump ( $Client->__getFunctions () );//获取服务器上提供的方法
        // var_dump ( $Client );//获取服务器上提供的方法
        // echo ('</pre>');

        // echo ('<pre>');
        // var_dump ( $Client->__getTypes () );//获取服务器上数据类型
        // echo ('</pre>');



        if (is_soap_fault($result))

        {

            trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);

        }


       	echo '<pre>';
       	print_r($result);
       	var_dump($result);
       	// echo $result;
       	echo '</pre>';

     }catch(Exception $e){

        echo $e->getMessage();

     }

 }else{
        echo "请求失败";
 }