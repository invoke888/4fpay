<?php
namespace App\Http\PayModels\Online;

use App\ApiModel;

class Anxinpay extends ApiModel
{
    public static $method = 'post'; //提交方式 必加属性 post or get

    public static $reqType = 'form'; //提交类型 必加属性 form or curl or fileGet

    public static $payWay = 0; //是否需要生成二维码 必加属性 2 3 4 5

    public static $resType = 'json'; //curl file_get_contents 返回的数据类型json/xml/str

    public static $unit = 1; //金额单位  默认1为元  2:单位为分

    public static $postType = false; //数据提交类型 默认false 一维数组 or json/str/多维数组

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
        $ServerUrl = $reqData['ServerUrl'];// 异步通知地址
        $returnUrl = $reqData['returnUrl'];// 同步通知地址

        //TODO: do something

        $type = $bank;
        if($payConf['pay_way'] =='1'){          //网银
            $bank='bank';
        }else{
            $type = '';
        }
        $data=array();
        $data['partner'] = $payConf['business_num'];        //商户号
        $data['version'] = '2.0.1';             //版本号
        $data['banktype'] = $bank;              //银行类型
        $data['bankcode'] = $type;              //银行编码
        $data['paymoney'] = $amount;            //金额
        $data['ordernumber'] = $order;          //商户订单号
        $data['memberno'] = '123';              //用户id
        $data['callbackurl'] = $ServerUrl;      //下行异步通知地址
        $signStr = self::getSignStr($data, false);
        $postKey = self::getMd5Sign("{$signStr}", $payConf['md5_private_key']);
        $data["sign"] = $postKey;
        $data['hrefbackurl'] = $returnUrl;      //下行同步通知地址
        $data['attach'] = '';                   //备注信息
        $data['memberip'] = '';                 //用户ip
        unset($reqData);
        return $data;
    }
}