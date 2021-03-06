<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Chenxingpay extends ApiModel
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

        self::$reqType = 'curl';
        self::$method  = 'header';
        self::$payWay   = $payConf['pay_way'];
        self::$postType = true;

        $data         = array(
            'shop_id'    => $payConf['business_num'],
            'user_id'    => '15537190211',
            'money'      => sprintf('%.2f', $amount),
            'type'       => $bank,
            'shop_no'    => $order,
            'notify_url' => $ServerUrl,
            'return_url' => $returnUrl,
        );
        $signStr      = $data['shop_id'] . $data['user_id'] . $data['money'] . $data['type'] . $payConf['md5_private_key'];
        $data['sign'] = md5($signStr);

        $json                = json_encode($data);
        $post['data']        = $json;
        $post['httpHeaders'] = array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($json)
        );
        $post['money']       = $data['money'];
        $post['shop_no']     = $data['shop_no'];

        unset($reqData);
        return $post;
    }

    public static function getRequestByType($data)
    {
        $json = $data['data'];
        return $json;
    }

    public static function SignOther($model, $data, $payConf)
    {
        $arr = json_decode($data,true);
        $sign = $arr['sign'];
        $mySign = MD5($payConf['business_num'] . $arr['user_id'] . $arr['order_no'] . $payConf['md5_private_key'] . $arr['money'] . $arr['type']);
        if ($sign == $mySign && $arr['status'] == 0) {
            return true;
        } else {
            return false;
        }
    }

}