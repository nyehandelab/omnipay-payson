<?php

namespace Nyehandel\Omnipay\Payson\Message;

/**
 * Payson Checkout Authorize Request
 */
class PaysonCreateCheckoutRequest extends AbstractCheckoutRequest
{
    public function getData()
    {
        $this->validate(
            'items',
            'currency',
            'checkoutUri',
            'confirmationUri',
            'notificationUri',
            'termsUri',
        );

        $data = [
            'merchant' => [
                'checkoutUri' => $this->getCheckoutUri(),
                'confirmationUri' => $this->getConfirmationUri(),
                'notificationUri' => $this->getNotificationUri(),
                'termsUri' => $this->getTermsUri(),
                'validationUri' => $this->getValidationUri(),
                'integrationInfo' => $this->getIntegrationInfo(),
                'partnerId' => $this->getPartnerId(),
            ],
            'customer' => $this->getCustomerData(),
            'order' => [
                'currency' => $this->getCurrency(), // Can be ‘sek’ or ‘eur’.
                'items' => $this->getItemsData(),
            ],
            'gui' => [
                'locale' => $this->getLocale(), // Language of the checkout snippet. Can be ‘sv’, ‘en’, ‘fi’, ‘no’, ‘da’, ‘es’ or ‘de’.
                'countries' => $this->getCountries(), // List of countries a customer can choose in the checkout snippet. Case sensitive, e.g use: [“SE”, “GB”, “DK”]
                //'verification' => $this->getVerification(), // Used to enable BankID verification. Can be ‘none’ or ‘bankid’. Default ‘none’
            ],
        ];

        return $data;
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setIntegrationInfo($value)
    {
        return $this->setParameter('integrationInfo', $value);
    }

    public function getIntegrationInfo()
    {
        return $this->getParameter('integrationInfo');
    }

    public function setPartnerId($value)
    {
        return $this->setParameter('partnerId', $value);
    }

    public function getPartnerId()
    {
        return $this->getParameter('partnerId');
    }


    public function getEndpoint()
    {
        return parent::getEndpoint() . '/checkouts';
    }

    public function sendData($data)
    {
        //$data = json_encode(self::formatData($data));
        $data = json_encode($data);

        $httpResponse = $this->httpClient->request(
            'POST',
            $this->getEndpoint(),
            $this->getHeaders($data),
            $data,
        );

        return new PaysonCreateCheckoutResponse(
            $this,
            $this->getResponseBody($httpResponse),
            $httpResponse->getStatusCode()
        );
    }
}
