<?php

namespace Nyehandel\Omnipay\Payson\Message;

use Nyehandel\Omnipay\Payson\Traits\GeneralGatewayParameters;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    use GeneralGatewayParameters;

    protected function getBaseData()
    {
        return [];
    }

    protected function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request($this->getHttpMethod(), $this->getEndpoint(), [], http_build_query($data));

        return $this->createResponse($httpResponse->getBody()->getContents());
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function getResponseBody(ResponseInterface $response): array
    {
        try {
            return \json_decode($response->getBody()->getContents(), true);
        } catch (\TypeError $exception) {
            return [];
        }
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function getHeaders(string $data = '')
    {
        $authToken = base64_encode($this->getAgentId() . ':' . $this->getApiKey());

        return [
            'Content-type' => 'application/json',
            'Authorization' => 'Basic ' . $authToken,
        ];
    }

    /**
     * Lowercases all array data and remove all values that are set to null
     *
     * @param array $input
     * @return array
     */
    protected static function formatData(array $input)
    {
        $return = array();

        foreach ($input as $key => $value) {
            $key = strtolower($key);

            if (!is_null($value)) {
                if (is_array($value)) {
                    $value = self::formatData($value);
                }
                $return[$key] = $value;
            }
        }

        return $return;
    }
}
