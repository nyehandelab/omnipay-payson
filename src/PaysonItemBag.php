<?php
/**
 * Payson Item bag
 */

namespace Nyehandel\Omnipay\Payson;

use Omnipay\Common\ItemBag;
use Omnipay\Common\ItemInterface;

/**
 * Class PaysonItemBag
 *
 * @package Omnipay\Payson
 */
class PaysonItemBag extends ItemBag
{
    /**
     * Add an item to the bag
     *
     * @see Item
     *
     * @param ItemInterface|array $item An existing item, or associative array of item parameters
     */
    public function add($item)
    {
        if ($item instanceof ItemInterface) {
            $this->items[] = $item;
        } else {
            $this->items[] = new PaysonItem($item);
        }
    }
}
