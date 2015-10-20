<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Common;

use Util\Json;
use Wiz\PaymentGatewayBundle\Exception\RuntimeException;

/**
 * Wiz Payment Gateway Factory class
 *
 * @package Wiz\PaymentGatewayBundle\Common
 */
class GatewayFactory
{
    /**
     * @param string $shortName
     *
     * @throws RuntimeException
     *
     * @return GatewayInterface
     */
    public function create($shortName)
    {
        $class = Helper::getGatewayClassName($shortName);

        if (!class_exists($class))
            throw new RuntimeException(sprintf('Class %s was not found', $class));

        return new $class;
    }

    /**
     * Get a list of supported gateways which may be available
     *
     * @return array
     */
    public function getSupportedGateways()
    {
        $composer = Json::decode(file_get_contents(__DIR__ . '/../composer.json'));
        return $composer['extra']['gateways'];
    }
}