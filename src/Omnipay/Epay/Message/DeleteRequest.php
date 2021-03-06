<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Epay Refund Request
 */
class DeleteRequest extends CaptureRequest
{
    protected $transactionIdField = 'transactionid';

    public function getSupportedKeys()
    {
        return ['merchantnumber', $this->transactionIdField, 'group', 'password'];
    }


    public function getData()
    {
        $this->validate('merchantnumber', $this->transactionIdField);

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
        $result = $client->delete($data);


        return $this->response = new RefundResponse(
            $this, array(
            'creditResult' => isset($result->creditResult) ? $result->creditResult : null,
            'pbsResponse' => isset($result->pbsresponse) ? $result->pbsresponse : null,
            'epayresponse' => $result->epayresponse,
        )
        );
    }
}
