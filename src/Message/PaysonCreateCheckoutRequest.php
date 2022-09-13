<?php

namespace Nyehandel\Omnipay\Payson\Message;

use Omnipay\Common\ItemBag;

/**
 * Payson Checkout Authorize Request
 */
class PaysonCreateCheckoutRequest extends AbstractCheckoutOrderRequest
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
            'customer' => [
                'city' => '',
                'countryCode' => $this->getCountryCode(),
                'identityNumber' => '',
                'email' => '',
                'firstName' => '',
                'lastName' => '',
                'phone' => '',
                'postalCode' => '',
                'street' => '',
                'type' => '', // Can be ‘person’ or ‘business’.
            ],
            'order' => [
                'currency' => $this->getCurrency(), // Can be ‘sek’ or ‘eur’.
                'items' => $this->getItemsData(),
            ],
            'gui' => [
                'locale' => $this->getLocale(), // Language of the checkout snippet. Can be ‘sv’, ‘en’, ‘fi’, ‘no’, ‘da’, ‘es’ or ‘de’.
                'countries' => $this->getCountries(), // List of countries a customer can choose in the checkout snippet. Case sensitive, e.g use: [“SE”, “GB”, “DK”]
                //'verification' => $this->getLocale(), // Used to enable BankID verification. Can be ‘none’ or ‘bankid’. Default ‘none’
            ],
        ];

        return $data;
    }

    public function setCountryCode($value)
    {
        return $this->setParameter('countryCode', $value);
    }

    public function getCountryCode()
    {
        return $this->getParameter('countryCode');
    }

    public function setCountries($value)
    {
        return $this->setParameter('countries', $value);
    }

    public function getCountries()
    {
        return $this->getParameter('countries');
    }

    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCheckoutUri($value)
    {
        return $this->setParameter('checkoutUri', $value);
    }

    public function getCheckoutUri()
    {
        return $this->getParameter('checkoutUri');
    }

    public function setConfirmationUri($value)
    {
        return $this->setParameter('confirmationUri', $value);
    }

    public function getConfirmationUri()
    {
        return $this->getParameter('confirmationUri');
    }

    public function setNotificationUri($value)
    {
        return $this->setParameter('notificationUri', $value);
    }

    public function getNotificationUri()
    {
        return $this->getParameter('notificationUri');
    }

    public function setTermsUri($value)
    {
        return $this->setParameter('termsUri', $value);
    }

    public function getTermsUri()
    {
        return $this->getParameter('termsUri');
    }

    public function setValidationUri($value)
    {
        return $this->setParameter('validationUri', $value);
    }

    public function getValidationUri()
    {
        return $this->getParameter('validationUri');
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
