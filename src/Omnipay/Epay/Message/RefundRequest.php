<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Epay Refund Request
 */
class RefundRequest extends CaptureRequest
{
    public function getData()
    {
        $this->validate('merchantnumber', 'amount', 'transactionid');

        $data = array();
        foreach ($this->getSupportedKeys() as $key) {
            $value = $this->parameters->get($key);
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }
        if ($this->getPassword()) {
            $data['pwd'] = $this->getPassword();
        }
        $data['amount'] = $this->getAmountInteger();

        /** Hack from SOAP description */
        $data['pbsresponse'] = -1;
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
        $result = $client->credit($data);


        return $this->response = new RefundResponse($this, array(
            'creditResult' => $result->creditResult,
            'pbsResponse' => $result->pbsresponse,
            'epayresponse' => $result->epayresponse,
        ));
    }


}
