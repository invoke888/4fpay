<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;
use Illuminate\Http\Request;

class Thbpay extends ApiModel
{
    public static $method = 'post'; //提交方式 必加属性 post or get

    public static $reqType = 'form'; //提交类型 必加属性 form or curl or fileGet

    public static $payWay = 0; //是否需要生成二维码 必加属性 2 3 4 5

    public static $resType = 'json'; //curl file_get_contents 返回的数据类型json/xml/str

    public static $unit = 1; //金额单位  默认1为元  2:单位为分

    public static $postType = false; //数据提交类型 默认false 一维数组 or json/str/多维数组  getRequestByType

    public static $httpBuildQuery = false; //默认false/true为curl提交参数需要http_build_query

    public static $isAPP = false; // 判断是否跳转APP 默认false

    public static $resData = [];

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
        self::$isAPP = true;

        //TODO: do something
        self::$reqType = 'curl';
        self::$payWay  = $payConf['pay_way'];
        self::$resType = 'other';
        self::$unit    = 2;

        $data['user_id']        = $payConf['business_num'];
        $data['out_trade_no']   = $order;
        $data['product_id']     = $bank;
        $data['return_url']     = $returnUrl;
        $data['notify_url']     = $ServerUrl;
        $data['subject']        = 'MateX';
        $data['body']           = 'huawei';
        $data['remark']         = '123';
        $data['attach']         = $amount;
        $data['pay_amount']     = $amount * 100;
        $data['applydate']      = date('Y-m-d H:i:s');
        $signStr                = self::getSignStr($data, true,true);
        $data['sign']           = strtoupper(md5($signStr . '&apikey=' . $payConf['md5_private_key']));

        unset($reqData);
        return $data;
    }

    /**
     * @param $response
     * @return mixed
     */
    public static function getQrCode($response)
    {
        $result = json_decode($response, true);
        if ($result['code'] == '1') {
            $result['qrcode'] = $result['data']['pay_extends']['pay_url'];
        }
        return $result;
    }

    //回调金额化分为元
    public static function getVerifyResult($request, $mod)
    {
        $arr = $request->all();
        $arr['transaction_money'] = $arr['transaction_money'] / 100;
        return $arr;
    }

    /**
     * @param $type
     * @param $json
     * @param $payConf
     * @return bool
     */
    public static function SignOther($type, $data, $payConf)
    {
        $sign     = $data['sign'];
        unset($data['sign']);
        $signStr  = self::getSignStr($data, true,true);
        $signTrue = strtoupper(md5($signStr . '&apikey=' . $payConf['md5_private_key']));
        if (strtoupper($sign) == $signTrue && $data['returncode'] == '00') {
            return true;
        } else {
            return false;
        }
    }
}