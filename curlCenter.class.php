<?php 

/**
 * 安全模型
 */

class curlCenter 
{	
    private $flag;
    private $token;

    /**
     * 初始化
     *
     * @param [string] $host  [停车场外网网址]
     * @param [string] $token [接口token密令]
     */
    public function __construct($flag=null,$token=null)
    {   
        $arr['flag'] = $flag;
        $this->flag = $arr;

        $this->token = $token;
    }

	//接收数据时验证签名
	public function verifySign($arr=null,$sign=null)
	{  
        if ( !isset($_POST['signData']) ) {
           return false;
        }

		$signData = $_POST['signData'];
      
        //token 
        $arr['token'] = $this->token;
        $arr['tmptime'] = $signData['tmptime'];
        $arr['randomStr'] = $signData['randomStr'];
        //字典排序
        sort($arr,SORT_STRING);
        //拼接字符串
        $str = implode($arr);

        //sha1加密
        $signstr =md5($str);
        $newSign = strtoupper($signstr);

        if($signData['sign'] == $newSign) {
            return true;
        }else{
            return false;
        }


	}

	/**
     * @param string $url
     * @return mixed
     */
    public function doGet($url)
    {
        //初始化
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //执行并获取HTML文档内容
        $output = curl_exec($ch);

        //释放curl句柄
        curl_close($ch);
        
        return $output;
    }

    /**
     * @param string $url
     * @param array $post_data
     * @param array | boolean $header
     * @return mixed
     */
    public function doPost($url,$post_data,$header=false)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 设置请求方式为post
        curl_setopt($ch, CURLOPT_POST, true);

        // post的变量
        // 自动向post变量添加签名和签名必要参数
        $post_data = array_merge($post_data,$this->makeSign());

        //向微信发送信息多了一个host
       
        if ($this->flag) {
            
            $post_data = array_merge($post_data,$this->flag);
        }

        // echo json_encode($post_data,JSON_UNESCAPED_UNICODE);
        // // var_dump( json_($post_data));
        // exit;
       
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post_data));
        // 请求头，可以传数组
        curl_setopt($ch, CURLOPT_HEADER, $header);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);

        curl_close($ch);
      
        return $output;
    }

    //自动生成签名包
    private function makeSign()
    {
    	$time = $arr['tmptime'] =time();
    	$randomStr = $arr['randomstr'] = $this->randomStr();
    	//token 
    	$arr['token'] = $this->token;
    	//字典排序
    	sort($arr,SORT_STRING);
    	//拼接字符串
    	$str = implode($arr);

        // var_dump($str);
        // exit;

    	//md5加密
    	$signstr =md5($str);
    	$sign = strtoupper($signstr);
    	

    	$pakage['signData']['tmptime'] = $time;
    	$pakage['signData']['randomStr'] = $randomStr;
    	$pakage['signData']['sign'] = $sign;

    	//不带token
    	return $pakage;
    }


    //生成随机数
    private function randomStr($length=8)
    {
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return "z".$str;
    }
}