<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */
namespace Wiz\PaymentGatewayBundle\Test\Common;

use Wiz\PaymentGatewayBundle\Common\Helper;

/**
 * Class HelperTest
 * @package Wiz\PaymentGatewayBundle\Test\Common
 */
class HelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetGatewayClassNameExistingNamespace()
    {
        $class = Helper::getGatewayClassName('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway');
        $this->assertEquals('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameExistingNamespaceUnderscore()
    {
        $class = Helper::getGatewayClassName('\\WapExpressGateway');
        $this->assertEquals('\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameSimple()
    {
        $class = Helper::getGatewayClassName('Alipay');
        $this->assertEquals('\\Wiz\\PaymentGatewayBundle\\Alipay\\Gateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNamePartialNamespace()
    {
        $class = Helper::getGatewayClassName('Alipay\\WapExpress');
        $this->assertEquals('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameUnderscoreNamespace()
    {
        $class = Helper::getGatewayClassName('Alipay_WapExpress');
        $this->assertEquals('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway', $class);
    }
}