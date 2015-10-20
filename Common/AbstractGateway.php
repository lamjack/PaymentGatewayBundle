<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Common;

abstract class AbstractGateway implements GatewayInterface
{
    public function getShortName()
    {
    }
}