<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */
namespace Wiz\PaymentGatewayBundle\Common;

/**
 * Payment gateway interface
 *
 * Interface GatewayInterface
 * @package Wiz\PaymentGatewayBundle\Common
 */
interface GatewayInterface
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     *
     * @return string
     */
    public function getName();

    /**
     * Get gateway short name
     *
     * This name can be used with GatewayFactory as an alias of the gateway class,
     * to create new instances of this gateway.
     *
     * @return string
     */
    public function getShortName();

    /**
     * Initialize gateway with parameters
     *
     * @param array $paramaters
     */
    public function initialize(array $paramaters = array());
}