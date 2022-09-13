<?php
declare(strict_types=1);

namespace Nyehandel\Omnipay\Payson\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

final class PaysonCreateCheckoutResponse extends Response implements RedirectResponseInterface
{
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        /*
         * HTTP status code 201 indicates that a new Checkout order was created.
         */
        return $this->getCode() == 201;
    }
}

