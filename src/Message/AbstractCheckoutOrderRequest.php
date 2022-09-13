<?php
/**
 * Payson Abstract Request
 */

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\PaysonItemBag;
use Omnipay\Common\ItemBag;
use Psr\Http\Message\ResponseInterface;

/**
 * Payson Abstract Order Request
 *
 * This class forms the base class for Payson Checkout requests.
 *
 * @link https://checkoutapi.svea.com/docs/#/data-types?id=createordermodel
 * @link https://checkoutapi.svea.com/docs/#/data-types?id=updateordermodel
 */
abstract class AbstractCheckoutOrderRequest extends AbstractCheckoutRequest
{
    public function setMerchantData($value)
    {
        return $this->setParameter('merchantData', $value);
    }

    public function getMerchantData()
    {
        return $this->getParameter('merchantData');
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
}
