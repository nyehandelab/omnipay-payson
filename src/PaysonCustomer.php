<?php
/**
 * Payson Item
 */

namespace Nyehandel\Omnipay\Payson;

use Omnipay\Common\Helper;
use Omnipay\Common\ParametersTrait;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class PaysonCustomer
 *
 * @package Omnipay\Payson
 */
class PaysonCustomer
{
    use ParametersTrait;

    /**
     * Create a new item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on the new object
     */
    public function __construct(array $parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * Initialize this item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on this object
     * @return $this Item
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag;

        Helper::initialize($this, $parameters);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {
        return $this->getParameter('city');
    }

    /**
     * Set the item article number
     */
    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryCode()
    {
        return $this->getParameter('countryCode');
    }

    /**
     * Set the item article number
     */
    public function setCountryCode($value)
    {
        return $this->setParameter('countryCode', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentityNumber()
    {
        return $this->getParameter('identityNumber');
    }

    /**
     * Set the item article number
     */
    public function setIdentityNumber($value)
    {
        return $this->setParameter('identityNumber', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Set the item article number
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {
        return $this->getParameter('firstName');
    }

    /**
     * Set the item article number
     */
    public function setFirstName($value)
    {
        return $this->setParameter('firstName', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {
        return $this->getParameter('lastName');
    }

    /**
     * Set the item article number
     */
    public function setLastName($value)
    {
        return $this->setParameter('lastName', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {
        return $this->getParameter('phone');
    }

    /**
     * Set the item article number
     */
    public function setPhone($value)
    {
        return $this->setParameter('phone', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostalCode()
    {
        return $this->getParameter('postalCode');
    }

    /**
     * Set the item article number
     */
    public function setPostalCode($value)
    {
        return $this->setParameter('postalCode', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getStreet()
    {
        return $this->getParameter('street');
    }

    /**
     * Set the item article number
     */
    public function setStreet($value)
    {
        return $this->setParameter('street', $value);
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

}
