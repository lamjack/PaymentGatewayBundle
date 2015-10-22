<?php
/**
 * JSSDKGateway.php
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    jack <linjue@wilead.com>
 * @copyright 2007-2015 WIZ TECHNOLOGY
 * @link      http://wizmacau.com
 * @link      http://jacklam.it
 * @link      https://github.com/lamjack
 * @version
 */
namespace Wiz\PaymentGatewayBundle\Gateway\Wechat;

use Wiz\PaymentGatewayBundle\Common\AbstractGateway;

/**
 * Class JSSDKGateway
 *
 * @package Wiz\PaymentGatewayBundle\Gateway\Wechat
 */
class JSSDKGateway extends AbstractGateway
{
    /**
     * 创建商户信息
     *
     * @param string $appId
     * @param string $appSecret
     * @param string $mchId
     * @param string $mchKey
     *
     * @return $this
     */
    public function createBusiness($appId, $appSecret, $mchId, $mchKey)
    {
        return $this->setParameters(array(
            'appid' => $appId,
            'appsecret' => $appSecret,
            'mch_id' => $mchId,
            'mch_key' => $mchKey
        ));
    }

    /**
     * @param string $body 商品或支付单简要描述
     * @param string $outTradeNo 商户订单号
     * @param int    $totalFee 订单总金额,只能为整数
     * @param string $notifyUrl 接收微信支付异步通知回调地址
     *
     * @return $this
     */
    public function createOrder($body, $outTradeNo, $totalFee, $notifyUrl)
    {
        return $this->setParameters(array(
            'body' => $body,
            'out_trade_no' => $outTradeNo,
            'total_fee' => $totalFee,
            'notify_url' => $notifyUrl
        ));
    }

    /**
     * 设置订单可选属性
     *
     * @param array $parameters
     *
     * @return $this
     */
    public function setOrderParameters($parameters = array())
    {
        $fields = array('device_info', 'nonce_str', 'detail', 'attach', 'fee_type', 'spbill_create_ip',
            'time_start', 'time_expire', 'goods_tag', 'product_id', 'limit_pay', 'openid');
        foreach ($parameters as $key => $value) {
            if (in_array($key, $fields))
                $this->setParameter($key, $value);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Wechat Payment';
    }
}