<?php

namespace App\Http\PayModels\Online;

use App\ApiModel;

class Shishipay extends ApiModel
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
        self::$reqType = 'curl';
        self::$payWay  = $payConf['pay_way'];
        self::$resType = 'other';
        
        $context               = [];
        $context['amount']     = sprintf('%.2f', $amount);
        $context['orderid']    = $order;
        $context['memberid']    = $payConf['business_num'];
        $context['notifyurl']  = $ServerUrl;
        $context['callbackurl']  = $returnUrl;
        $context['applydate']    = time();
        $context['ddlx']     = 1;
        $context['bankcode'] = $bank;//银行编码
        $signStr = self::getSignStr($context, true, true);
        $context['md5sign'] = strtoupper(self::getMd5Sign($signStr.'&key=', $payConf['md5_private_key']));
        $context['serverReturnType'] = 2;
        
        unset($reqData);
        return $context;
    }
    
    public static function getQrCode($response)
    {
        $data = json_decode($response,true);
        if ($data['status'] == '000000') {
            $res['code_url'] = $data['data']['qrcodeUrl'];
        }else{
            $res['msg'] = $data['msg'];
            $res['status'] = $data['status'];
        }
        return $res;
    }
    
    public static function signOther($mod, $data, $payConf)
    {
        $sign = $data['sign'];
        unset($data['sign']);
        $signStr = self::getSignStr($data, true, true);
        $myStr = strtoupper(self::getMd5Sign($signStr.'&key=', $payConf['md5_private_key']));
        if ($myStr == strtoupper($sign) && $data['returncode'] == '00') {
            return true;
        } else {
            return false;
        }
    }
}