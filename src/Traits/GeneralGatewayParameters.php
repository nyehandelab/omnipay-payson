<?php

namespace Nyehandel\Omnipay\Payson\Traits;

trait GeneralGatewayParameters
{
    public function getAgentId()
    {
        return $this->getParameter('agentId');
    }

    public function setAgentId($value)
    {
        return $this->setParameter('agentId', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

}
