<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */
namespace Wiz\PaymentGatewayBundle\Test\Common;

use Wiz\PaymentGatewayBundle\Common\Helper;

class HelperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetGatewayShortNameSimple()
    {
        $shortName = Helper::getGatewayShortName('\\Wiz\\PaymentGatewayBundle\\Alipay\\ExpressGateway');
        $this->assertSame('Alipay\\Express', $shortName);
    }
}