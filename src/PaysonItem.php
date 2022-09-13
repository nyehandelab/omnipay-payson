<?php
/**
 * Payson Item
 */

namespace Nyehandel\Omnipay\Payson;

use Omnipay\Common\Item;

/**
 * Class PaysonItem
 *
 * @package Omnipay\Payson
 */
class PaysonItem extends Item
{
    /**
     * {@inheritDoc}
     */
    public function getTaxRate()
    {
        return $this->getParameter('taxRate');
    }

    /**
     * Set the item article number
     */
    public function setTaxRate($value)
    {
        return $this->setParameter('taxRate', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getReference()
    {
        return $this->getParameter('reference');
    }

    /**
     * Set the item article number
     */
    public function setReference($value)
    {
        return $this->setParameter('reference', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getDiscountRate()
    {
        return $this->getParameter('discountRate');
    }

    /**
     * Set the item article number
     */
    public function setDiscountRate($value)
    {
        return $this->setParameter('discountRate', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getEan()
    {
        return $this->getParameter('ean');
    }

    /**
     * Set the item article number
     */
    public function setEan($value)
    {
        return $this->setParameter('ean', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageUri()
    {
        return $this->getParameter('imageUri');
    }

    /**
     * Set the item article number
     */
    public function setImageUri($value)
    {
        return $this->setParameter('imageUri', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * Set the item article number
     */
    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getUri()
    {
        return $this->getParameter('uri');
    }

    /**
     * Set the item article number
     */
    public function setUri($value)
    {
        return $this->setParameter('uri', $value);
    }
}
