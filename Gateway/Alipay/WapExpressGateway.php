<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Gateway\Alipay;

/**
 * 支付宝WAP客户端接口
 *
 * Class WapExpressGateway
 * @package Wiz\PaymentGatewayBundle\Gateway\Alipay
 */
class WapExpressGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Alipay Wap Express';
    }
}