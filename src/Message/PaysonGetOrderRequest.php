<?php

namespace Nyehandel\Omnipay\Payson\Message;

/**
 * Payson Checkout Authorize Request
 */
class PaysonGetOrderRequest extends AbstractCheckoutRequest
{
    public function getData()
    {
        $this->validate('paymentId');

        return [];
    }

    public function getEndpoint()
    {
        return parent::getEndpoint() . '/checkouts/' . $this->getPaymentId();
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'GET',
            $this->getEndpoint(),
            $this->getHeaders(),
        );

        return new PaysonGetOrderResponse(
            $this,
            $this->getResponseBody($httpResponse),
            $httpResponse->getStatusCode()
        );
    }
}
