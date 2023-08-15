<?php
/**
 * Payson Abstract Request
 */

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\Traits\GeneralGatewayParameters;
use Omnipay\Common\ItemBag;
use Nyehandel\Omnipay\Payson\PaysonItemBag;
use Nyehandel\Omnipay\Payson\PaysonCustomer;
use Psr\Http\Message\ResponseInterface;

/**
 * Payson Abstract Request
 *
 * This class forms the base class for Payson Checkout requests.
 *
 */
abstract class AbstractCheckoutRequest extends AbstractRequest
{
    protected $liveEndpoint = 'https://api.payson.se/2.0';
    protected $testEndpoint = 'https://test-api.payson.se/2.0';

    public $data;

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function setMerchantData($value)
    {
        return $this->setParameter('merchantData', $value);
    }

    public function getMerchantData()
    {
        return $this->getParameter('merchantData');
    }

    public function setPaymentId($value)
    {
        return $this->setParameter('paymentId', $value);
    }

    public function getPaymentId()
    {
        return $this->getParameter('paymentId');
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

    protected function getItemsData()
    {
        $itemsData = [];
        $items = $this->getItems();

        if ($items) {
            foreach ($items as $item) {
                $itemsData[] = [
                    'name' => $item->getName(),
                    'unitPrice' => $item->getPrice() * (1 + $item->getVatPercent() / 100), // Unit price of the article including tax. 2 decimals, make sure all tax rounding is done before sending to Payson.
                    'quantity' => $item->getQuantity(),
                    'taxRate' => $item->getVatPercent() / 100,
                    'reference' => $item->getReference(),
                    'discountRate' => $item->getDiscountRate(),
                    'ean' => $item->getEan(),
                    'imageUri' => $item->getImageUri(),
                    'type' => $item->getType(),
                    'uri' => $item->getUri(),
                ];
            }
        }

        return $itemsData;
    }

    /**
     * Set the items in this order
     *
     * @param ItemBag|array $items An array of items in this order
     */
    public function setItems($items)
    {
        if ($items && !$items instanceof ItemBag) {
            $items = new PaysonItemBag($items);
        }

        return $this->setParameter('items', $items);
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

    public function setPhoneOptional($value)
    {
        return $this->setParameter('phoneOptional', $value);
    }

    public function getPhoneOptional()
    {
        return $this->getParameter('phoneOptional');
    }

    public function setRequestPhone($value)
    {
        return $this->setParameter('requestPhone', $value);
    }

    public function getRequestPhone()
    {
        return $this->getParameter('requestPhone');
    }

    /**
     * A list of items in this order
     *
     * @return ItemBag|null A bag containing items in this order
     */
    public function getCustomer()
    {
        return $this->getParameter('customer');
    }

    /**
     * Set the items in this order
     *
     * @param ItemBag|array $items An array of items in this order
     * @return $this
     */
    public function setCustomer($customer)
    {
        $customer = new PaysonCustomer($customer);

        return $this->setParameter('customer', $customer);
    }

    protected function getCustomerData()
    {
        $customer = $this->getCustomer();

        if (!$customer) return [];

        $customerData = [
            'city' => $customer->getCity(),
            'countryCode' => $customer->getCountryCode(),
            'identityNumber' => $customer->getIdentityNumber(),
            'email' => $customer->getEmail(),
            'firstName' => $customer->getFirstName(),
            'lastName' => $customer->getLastName(),
            'phone' => $customer->getPhone(),
            'postalCode' => $customer->getPostalCode(),
            'street' => $customer->getStreet(),
            'type' => $customer->getType(), // Can be ‘person’ or ‘business’.
        ];

        return $customerData;
    }


}
