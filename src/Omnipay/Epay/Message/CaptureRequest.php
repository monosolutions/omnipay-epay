<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Epay Capture Request
 */
class CaptureRequest extends PurchaseRequest
{
    protected $endpoint = 'https://ssl.ditonlinebetalingssystem.dk/remote/payment.asmx';


    public function getSupportedKeys()
    {

        return ['merchantnumber', 'amount', 'transactionId', 'group', 'password'];
    }

    public function getGroup()
    {
        return $this->getParameter('group');
    }

    public function setTransactionId($value)
    {
        return $this->setParameter('transactionId', $value);
    }

    public function getData()
    {
        $this->validate('merchantnumber', 'amount', 'transactionId');

        $data = array();
        foreach ($this->getSupportedKeys() as $key) {
            $value = $this->get($key);
            if (!empty($value)) {
                $data[strtolower($key)] = $value;
            }
        }

        $data['amount'] = $this->getAmountInteger();
        if ($this->getPassword()) {
            $data['pwd'] = $this->getPassword();
        }
        /** Hack from SOAP description */
        $data['pbsResponse'] = -1;
        $data['epayresponse'] = -1;

        return $data;
    }

    /**
     * @param mixed $data
     * @return CaptureResponse
     */
    public function sendData($data)
    {
        $client = new \SoapClient($this->endpoint . '?WSDL');
        $result = $client->capture($data);

        return $this->response = new CaptureResponse(
            $this, array(
                'captureResult' => $result->captureResult,
                'pbsResponse' => $result->pbsResponse,
                'epayresponse' => $result->epayresponse,
            )
        );
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
