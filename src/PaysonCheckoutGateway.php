<?php

namespace Nyehandel\Omnipay\Payson;

use Nyehandel\Omnipay\Payson\Traits\GeneralGatewayParameters;
use Omnipay\Common\AbstractGateway;

/**
 * Payson Checkout Class
 */
class PaysonCheckoutGateway extends AbstractGateway
{
    use GeneralGatewayParameters;

    public function getDefaultParameters()
    {
        return array(
            'agentId' => '',
            'apiKey' => '',
            'testMode' => false,
        );
    }

    public function getName()
    {
        return 'Payson Checkout';
    }

    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Nyehandel\Omnipay\Payson\Message\PaysonCreateCheckoutRequest', $parameters);
    }

    public function getOrder(array $parameters = [])
    {
        return $this->createRequest('\Nyehandel\Omnipay\Payson\Message\PaysonGetCheckoutRequest', $parameters);
    }

    public function updateOrder(array $parameters = [])
    {
        return $this->createRequest('\Nyehandel\Omnipay\Payson\Message\PaysonUpdateCheckoutRequest', $parameters);
    }

    public function retrievePayment(array $parameters = [])
    {
        return $this->createRequest('\Nyehandel\Omnipay\Payson\Message\PaysonGetOrderRequest', $parameters);
    }

    public function capture(array $parameters = [])
    {
        // TODO: Implement capture
    }

    public function completePurchase(array $parameters = [])
    {
        // TODO: Implement completePurchase
    }

    public function cancel(array $parameters = [])
    {
        // TODO: Implement cancel
    }

    public function refund(array $parameters = [])
    {
        // TODO: Implement refund
    }
}
