<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Caifbvepay extends ApiModel
{
    public static $method = 'post'; //提交方式 必加属性 post or get

    public static $reqType = 'form'; //提交类型 必加属性 form or curl or fileGet

    public static $payWay = 0; //是否需要生成二维码 必加属性 2 3 4 5

    public static $resType = 'json'; //curl file_get_contents 返回的数据类型json/xml/str

    public static $unit = 1; //金额单位  默认1为元  2:单位为分

    public static $postType = false; //数据提交类型 默认false 一维数组 or json/str/多维数组  getRequestByType

    public static $httpBuildQuery = false; //默认false/true为curl提交参数需要http_build_query

    public static $isAPP = false; // 判断是否跳转APP 默认false

    /**
     * @param array       $reqData 接口传递的参数
     * @param array $payConf
     * @return array
     */
    public static function getAllInfo($reqData, $payConf)
    {
        /**
         * 参数赋值，方法间传递数组
         */
        $order     = $reqData['order'];
        $amount    = $reqData['amount'];
        $bank      = $reqData['bank'];
        $ServerUrl = $reqData['ServerUrl']; // 异步通知地址
        $returnUrl = $reqData['returnUrl']; // 同步通知地址

        //判断是否需要跳转链接 is_app=1开启 2-关闭
        if ($payConf['is_app'] == 1) {
            self::$isAPP = true;
        }

        //TODO: do something
        self::$unit    = 2; // 单位 ： 分
        self::$reqType = 'curl';
        self::$method  = 'header';
        self::$payWay  = $payConf['pay_way'];

        $data['amount']  = $amount * 100;
        $data['backUrl'] = $ServerUrl;
        $data['mcnNum']  = $payConf['business_num'];
        $data['orderId'] = $order;
        $data['payType'] = $bank;
        $data['ip']        = self::getIp();
        $data['returnUrl'] = $returnUrl;
        $signStr             = "mcnNum={$data['mcnNum']}&orderId={$order}&backUrl={$ServerUrl}&payType={$bank}&amount={$data['amount']}&secreyKey={$payConf['md5_private_key']}";
        $data['sign']        = strtoupper(md5($signStr));

        $post['data']        = json_encode($data);
        $post['httpHeaders'] = array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen(json_encode($data))
        );
        $post['outTradeNo'] = $data['orderId'];
        $post['amount']     = $data['amount'];

        unset($reqData);
        return $post;
    }

    public static function getVerifyResult($request, $mod)
    {
        $arr = $request->getContent();
	    $res =  json_decode($arr,true);
	    $data['orderId'] = $res['orderId'];
	    $data['amount'] = $res['amount'] / 100;
	    return $data;
    }
	
	public static function SignOther($type, $datas, $payConf)
	{
		$json = file_get_contents('php://input');  //获取POST流
		$data=json_decode($json,true);
		$sign     = $data['sign'];
		$signStr  = 'orderId='.$data['orderId'].'&payTime='.$data['payTime'].'&payStatus='.$data['payStatus'].'&amount='.$data['amount'].'&secreyKey='.$payConf['md5_private_key'];
		$signTrue = md5($signStr);
		if (strtoupper($sign) == strtoupper($signTrue) && $data['payStatus'] == '1') {
			return true;
		} else {
			return false;
		}
	}

}