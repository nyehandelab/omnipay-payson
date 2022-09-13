<?php

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\Message\AbstractRequest;

/**
 * Nets Easy Checkout Authorize Request
 */
class PaysonUpdateCheckoutRequest extends AbstractCheckoutRequest
{
    public function getData()
    {
        $this->validate('items');

        $data = [
            'status' => 'created',
            'id' => $this->getPaymentId(),
            'merchant' => [
                'checkoutUri' => $this->getCheckoutUri(),
                'confirmationUri' => $this->getConfirmationUri(),
                'notificationUri' => $this->getNotificationUri(),
                'termsUri' => $this->getTermsUri(),
                'validationUri' => $this->getValidationUri(),
            ],
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

        return new PaysonUpdateCheckoutResponse(
            $this,
            $this->getResponseBody($httpResponse),
            $httpResponse->getStatusCode()
        );
    }
}
