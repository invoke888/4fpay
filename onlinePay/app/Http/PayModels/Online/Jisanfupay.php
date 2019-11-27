<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Jisanfupay extends ApiModel
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
        self::$unit = 2; // 单位 ： 分

        $data              = array(
            'merchantCode'      => $payConf['business_num'],
            'outOrderId'        => $order,
            'outUserId'         => $payConf['business_num'],
            'totalAmount'       => $amount * 100,
            'merchantOrderTime' => date('YmdHis'),
            'notifyUrl'         => $ServerUrl,
        );
        $signStr           = self::getSignStr($data, true, true);
        $data['sign']      = strtoupper(md5($signStr . '&KEY=' . $payConf['md5_private_key']));
        $data['merUrl']    = $returnUrl;
        $data['randomStr'] = self::randStr(16);
        unset($reqData);
        return $data;
    }

    public static function SignOther($model, $data, $payConf)
    {
        $sign = $data['sign'];
        unset($data['sign']);
        $signStr = self::getSignStr($data, true, true);
        $mySign  = strtoupper(md5($signStr . '&KEY=' . $payConf['md5_private_key']));
        if ($sign == $mySign && $data['state'] == '00')
        {
            return true;
        } else {
            return false;
        }

    }


}