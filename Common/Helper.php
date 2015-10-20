<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Common;

/**
 * Class Helper
 * @package Wiz\PaymentGatewayBundle\Common
 */
final class Helper
{
    const GATEWAY_NAMESPACE = 'Wiz\\PaymentGatewayBundle\\';
    const GATEWAY_SUFFIX = 'Gateway';

    /**
     * Resolve a gateway class to a short name.
     *
     * The short name can be used with GatewayFactory as an alias of the gateway class,
     * to create new instances of a gateway.
     *
     * @param string $className
     * @return string
     */
    public static function getGatewayShortName($className)
    {
        if (0 === strpos(self::GATEWAY_NAMESPACE, '\\')) {
            $className = substr($className, 1);
        }

        if (0 === strpos($className, self::GATEWAY_NAMESPACE)) {
            return trim(str_replace('\\', '_', substr($className, strlen(self::GATEWAY_NAMESPACE), -7)), '_');
        }

        return '\\' . $className;
    }

    /**
     * Resolve a short gateway name to a full namespaced gateway class.
     *
     * Class names beginning with a namespace marker (\) are left intact.
     * Non-namespaced classes are expected to be in the \Omnipay namespace, e.g.:
     *
     *      \Custom\Gateway     => \Custom\Gateway
     *      \Custom_Gateway     => \Custom_Gateway
     *      Stripe              => \Wiz\PaymentGatewayBundle\Stripe\Gateway
     *      PayPal\Express      => \Wiz\PaymentGatewayBundle\PayPal\ExpressGateway
     *      PayPal_Express      => \Wiz\PaymentGatewayBundle\PayPal\ExpressGateway
     *
     * @param string $shortName
     * @return string
     */
    public static function getGatewayClassName($shortName)
    {
        if (0 === strpos($shortName, '\\')) {
            return $shortName;
        }

        $shortName = str_replace('_', '\\', $shortName);
        if (false === strpos($shortName, '\\')) {
            $shortName .= '\\';
        }

        return sprintf('\\%s\\%s', self::GATEWAY_NAMESPACE, $shortName . self::GATEWAY_SUFFIX);
    }
}