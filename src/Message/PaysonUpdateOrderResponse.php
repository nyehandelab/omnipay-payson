<?php
declare(strict_types=1);

namespace Nyehandel\Omnipay\Payson\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

final class PaysonUpdateOrderResponse extends Response implements RedirectResponseInterface
{

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getCode() == 200;
    }
}

