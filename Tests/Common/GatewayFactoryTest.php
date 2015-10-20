<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Tests\Common;

use Mockery as M;
use Wiz\PaymentGatewayBundle\Common\GatewayFactory;
use Wiz\PaymentGatewayBundle\Tests\AbstractTestCase;

/**
 * Class GatewayFactoryTest
 * @package Wiz\PaymentGatewayBundle\Tests\Common
 */
class GatewayFactoryTest extends AbstractTestCase
{
    /**
     * @var GatewayFactory
     */
    private $factory;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        M::mock('alias:Wiz\\PaymentGatewayBundle\\Gateway\\Wiz\\MockGateway');
    }

    /**
     *
     */
    public function testCreateShortName()
    {
        $gateway = $this->factory->create('Wiz_Mock');
        $this->assertInstanceOf('\\Wiz\\PaymentGatewayBundle\\Gateway\\Wiz\\MockGateway', $gateway);
    }

    /**
     *
     */
    public function testCreateFullyQualified()
    {
        $gateway = $this->factory->create('\\Wiz\\PaymentGatewayBundle\\Gateway\\Wiz\\MockGateway');
        $this->assertInstanceOf('\\Wiz\\PaymentGatewayBundle\\Gateway\\Wiz\\MockGateway', $gateway);
    }

    /**
     * @expectedException \Wiz\PaymentGatewayBundle\Exception\RuntimeException
     * @expectedExceptionMessage Class \Wiz\PaymentGatewayBundle\Gateway\Invalid\Gateway was not found
     */
    public function testCreateInvalid()
    {
        $gateway = $this->factory->create('Invalid');
    }

    /**
     *
     */
    protected function setUp()
    {
        $this->factory = new GatewayFactory();
    }

    /**
     *
     */
    protected function tearDown()
    {
        $this->factory = null;
    }
}