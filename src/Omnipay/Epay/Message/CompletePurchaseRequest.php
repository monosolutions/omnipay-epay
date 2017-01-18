<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Epay Complete Purchase Request
 */
class CompletePurchaseRequest extends PurchaseRequest
{
    protected $keys = ['txnid', 'orderid', 'amount', 'currency', 'date', 'time', 'txnfee', 'paymenttype', 'cardno'];

    public function getData()
    {
        if ($this->getParameter('secret') && !$this->verifyHash($this->httpRequest->query->all())) {

            throw new InvalidResponseException('Invalid key');
        }

        return $this->httpRequest->query->all();
    }

    public function verifyHash($data)
    {
        $var = '';
        foreach ($this->keys as $key) {

            if (array_key_exists($key, $data)) {
                $var .= $data[$key];
            }
        }

        $genstamp = md5($var . $this->getParameter('secret'));

        return isset($data['hash']) && $genstamp == $data['hash'];
    }

    public function addKey($key)
    {
        $this->keys[] = $key;
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * Send the request
     *
     * @return ResponseInterface
     */
    public function send()
    {
        return $this->sendData($this->getData());
    }
}
