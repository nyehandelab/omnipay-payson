<?php
/**
 * Payson Abstract Request
 */

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\Traits\GeneralGatewayParameters;
use Omnipay\Common\ItemBag;
use Nyehandel\Omnipay\Payson\PaysonItemBag;
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
}
