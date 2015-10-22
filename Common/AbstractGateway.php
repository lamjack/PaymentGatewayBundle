<?php
/**
 * Author: jack<linjue@wilead.com>
 * Date: 15/10/20
 */

namespace Wiz\PaymentGatewayBundle\Common;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class AbstractGateway
 *
 * @package Wiz\PaymentGatewayBundle\Common
 */
abstract class AbstractGateway implements GatewayInterface
{
    /**
     * @var ParameterBag
     */
    protected $parameters;

    /**
     *
     */
    function __construct()
    {
        $this->initialize();
    }

    /**
     * Initialize this gateway with default parameters
     *
     * @param array $paramaters
     *
     * @return $this
     */
    public function initialize(array $paramaters = array())
    {
        $this->parameters = new ParameterBag();
        return $this;
    }

    /**
     * Get the short name of the Gateway
     *
     * @return string
     */
    public function getShortName()
    {
        return Helper::getGatewayShortName(get_class($this));
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * @param array $parameters
     *
     * @return $this
     */
    protected function setParameters($parameters = array())
    {
        foreach ($parameters as $k => $v) {
            $this->setParameter($k, $v);
        }
        return $this;
    }

    /**
     * @return array
     */
    protected function getParameters()
    {
        return $this->parameters->all();
    }
}