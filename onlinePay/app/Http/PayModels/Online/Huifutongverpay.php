<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Huifutongverpay extends ApiModel
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
        $ServerUrl = $reqData['ServerUrl']; // 异步通知地址
        $returnUrl = $reqData['returnUrl']; // 同步通知地址

        //判断是否需要跳转链接 is_app=1开启 2-关闭
        if ($payConf['is_app'] == 1) {
            self::$isAPP = true;
        }

        //TODO: do something
        $data['merchantNo'] = $payConf['business_num'];
        $data['orderNo'] = $order;
        $data['amount'] = sprintf('%.2f', $amount);
        $data['bank'] = $bank;
        $data['name'] = 'ceshi';
        $data['version'] = '2.0';
        $data['notifyUrl'] = $ServerUrl;
        $data['returnUrl'] = $returnUrl;

        $str="amount={$data['amount']}&bank={$data['bank']}&merchantNo={$data['merchantNo']}&name={$data['name']}&notifyUrl={$data['notifyUrl']}&orderNo={$data['orderNo']}&returnUrl={$data['returnUrl']}&version={$data['version']}";
        $data['sign'] = strtolower(md5($str . '#' . $payConf['md5_private_key']));
        $data['count'] = 1;
        unset($reqData);
        return $data;
    }

    /**
     * @param $type
     * @param $json
     * @param $payConf
     * @return bool
     */
    public static function SignOther($type, $data, $payConf)
    {
        $sign = $data['sign'];
        $signStr = "amount={$data['amount']}&orderNo={$data['orderNo']}&transactionNo={$data['transactionNo']}";
        $signTrue = strtolower(md5($signStr."#".$payConf['md5_private_key']));
        if (strtolower($sign) == strtolower($signTrue) && $data['payStatus'] == '1') {
            return true;
        } else {
            return false;
        }
    }
}