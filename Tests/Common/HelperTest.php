<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */
namespace Wiz\PaymentGatewayBundle\Tests\Common;

use Wiz\PaymentGatewayBundle\Common\Helper;

/**
 * Class HelperTest
 * @package Wiz\PaymentGatewayBundle\Tests\Common
 */
class HelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGetGatewayShortNameSimple()
    {
        $shortName = Helper::getGatewayShortName('Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\Gateway');
        $this->assertSame('Alipay', $shortName);
    }

    /**
     *
     */
    public function testGetGatewayShortNameSimpleLeadingSlash()
    {
        $shortName = Helper::getGatewayShortName('\\Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\Gateway');
        $this->assertSame('Alipay', $shortName);
    }

    /**
     *
     */
    public function testGetGatewayShortNameUnderscore()
    {
        $shortName = Helper::getGatewayShortName('Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\ExpressGateway');
        $this->assertSame('Alipay_Express', $shortName);
    }

    /**
     *
     */
    public function testGetGatewayShortNameUnderscoreLeadingSlash()
    {
        $shortName = Helper::getGatewayShortName('\\Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\ExpressGateway');
        $this->assertSame('Alipay_Express', $shortName);
    }

    /**
     *
     */
    public function testGetGatewayShortNameCustomGateway()
    {
        $shortName = Helper::getGatewayShortName('\\Custom\\Alipay');
        $this->assertSame('\\Custom\\Alipay', $shortName);
    }

    /**
     *
     */
    public function testGetGatewayClassNameExistingNamespace()
    {
        $class = Helper::getGatewayClassName('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway');
        $this->assertSame('\\Wiz\\PaymentGatewayBundle\\Alipay\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameExistingNamespaceUnderscore()
    {
        $class = Helper::getGatewayClassName('\\WapExpressGateway');
        $this->assertSame('\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameSimple()
    {
        $class = Helper::getGatewayClassName('Alipay');
        $this->assertSame('\\Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\Gateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNamePartialNamespace()
    {
        $class = Helper::getGatewayClassName('Alipay\\WapExpress');
        $this->assertSame('\\Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\WapExpressGateway', $class);
    }

    /**
     *
     */
    public function testGetGatewayClassNameUnderscoreNamespace()
    {
        $class = Helper::getGatewayClassName('Alipay_WapExpress');
        $this->assertSame('\\Wiz\\PaymentGatewayBundle\\Gateway\\Alipay\\WapExpressGateway', $class);
    }
}