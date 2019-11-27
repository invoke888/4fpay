<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Chaofanzfpay extends ApiModel
{
    public static $method = 'post'; //提交方式 必加属性 post or get

    public static $reqType = 'form'; //提交类型 必加属性 form or curl or fileGet

    public static $payWay = 0; //是否需要生成二维码 必加属性 2 3 4 5

    public static $resType = 'json'; //curl file_get_contents 返回的数据类型json/xml/str   other

    public static $unit = 1; //金额单位  默认1为元  2:单位为分

    public static $httpBuildQuery = false; //默认 false  true为curl提交参数 需要http_build_query

    public static $postType = false; //数据提交类型 默认false 一维数组   or  json ／str ／多维数组

    public static $isAPP = false; // 判断是否跳转APP 默认false

    /**
     * @param array $reqData 接口传递的参数
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
        $ServerUrl = $reqData['ServerUrl'];// 异步通知地址
        $returnUrl = $reqData['returnUrl'];// 同步通知地址

        self::$unit           = 2;
        self::$reqType        = 'curl';
        self::$payWay         = $payConf['pay_way'];
        self::$httpBuildQuery = true;
        self::$isAPP          = true;

        $data                 = [];
        $data['mchntId']      = $payConf['business_num']; //商户号
        $data['mchntOrderId'] = $order; //订单号
        $data['orderSubject'] = 'cf'; //标题
        $data['orderDesc']    = 'cf'; //描述
        $data['bizType']      = $bank; //支付类型
        $data['txnAmt']       = $amount * 100; //金额（分）
        $data['currency']     = 'CNY'; //人民币
        $data['notifyUrl']    = $ServerUrl; //异步通知地址
        $data['returnUrl']    = $returnUrl; //同步跳转地址
        $data['sendIp']       = '127.0.0.1';
        $data['txnTime']      = date('YmdHis'); //订单发送时间
        $data['remarks']      = 'cf';
        $signStr              = self::getSignStr($data, false, true);
        $data['signature']    = strtoupper(self::getMd5Sign($signStr, $payConf['md5_private_key']));
        $data['signMethod']   = 'MD5';
        unset($reqData);
        return $data;
    }


    /**
     * @param $request
     * @return mixed
     */
    public static function getVerifyResult($request)
    {
        $result           = $request->all();
        $result['txnAmt'] = $result['txnAmt'] / 100;
        return $result;
    }

    /**
     * @param $type
     * @param $data
     * @param $payConf
     * @return bool
     */
    public static function SignOther($type, $data, $payConf)
    {
        $signature = $data['signature'];
        unset($data['signature']);
        unset($data['signMethod']);
        $signStr = self::getSignStr($data, true, true);
        $sign    = strtoupper(md5($signStr . $payConf['md5_private_key']));
        if ($sign == $signature && $data['success'] == true) {
            return true;
        }
        return false;
    }
}