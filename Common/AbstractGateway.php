<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Common;

/**
 * Class AbstractGateway
 * @package Wiz\PaymentGatewayBundle\Common
 */
abstract class AbstractGateway implements GatewayInterface
{
    /**
     * Get the short name of the Gateway
     *
     * @return string
     */
    public function getShortName()
    {
        return Helper::getGatewayShortName(get_class($this));
    }
}