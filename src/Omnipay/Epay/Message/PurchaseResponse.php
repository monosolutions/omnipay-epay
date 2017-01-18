<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Epay Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $endpoint = 'https://ssl.ditonlinebetalingssystem.dk/integration/ewindow/Default.aspx';
    protected $redirectMethod;

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        $urlData = [];
        if (isset($this->data['urldata'])) {
            $urlData = $this->data['urldata'];
            unset($this->data['urldata']);
        }
        if ($this->getRedirectMethod() === 'POST') {
            return $this->endpoint . '?' . http_build_query($urlData);
        }
        return $this->endpoint . '?' . http_build_query(array_merge($urlData, $this->data));
    }

    public function getRedirectMethod()
    {
        return $this->redirectMethod;
    }

    public function setRedirectMethod($method)
    {
        $method = strtoupper($method);
        if (!in_array($method, ['POST', 'GET'])) {
            throw new \InvalidArgumentException("The allowed method is either POST or GET");
        }
        $this->redirectMethod = $method;
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}
