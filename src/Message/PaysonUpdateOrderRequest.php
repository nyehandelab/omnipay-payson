<?php

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\Message\AbstractOrderRequest;

/**
 * Nets Easy Checkout Authorize Request
 */
class PaysonUpdateOrderRequest extends AbstractCheckoutOrderRequest
{
    public function getData()
    {
        $this->validate('items');

        $data = [
            'order' => [
                'currency' => $this->getCurrency(),
                'items' => $this->getItemsData(),
            ],
        ];

        return $data;
    }

    public function getEndpoint()
    {
        return parent::getEndpoint() . '/checkouts/' . $this->getPaymentId();
    }

    public function sendData($data)
    {
        //$data = json_encode(self::formatData($data));
        $data = json_encode($data);

        $httpResponse = $this->httpClient->request(
            'PUT',
            $this->getEndpoint(),
            $this->getHeaders($data),
            $data,
        );

        return new PaysonUpdateOrderResponse(
            $this,
            $this->getResponseBody($httpResponse),
            $httpResponse->getStatusCode()
        );
    }
}
