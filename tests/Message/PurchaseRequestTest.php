<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    /** @var  PurchaseRequest */
    protected $request;

    public function setUp()
    {
        parent::setUp();
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData()
    {
        $this->request->initialize(
            [
                'merchantnumber' => 1,
                'orderid' => '10',
                'secret' => 'somefancymd5key',
                'amount' => 10.00,
                'currency' => 'DKK',
                'accepturl' => "http://example.org/callback",
                'language' => 'gr'
            ]
        );
        $data = $this->request->getData();
        $fields = [
            'merchantnumber' => 1,
            'currency' => '208',
            'amount' => '1000',
            'orderid' => '10',
            'language' => 0,
            'accepturl' => 'http://example.org/callback',
        ];

        foreach ($fields as $key => $value) {
            $this->assertEquals($value, $data[$key], 'Key: ' . $key . ' not found in the data');
        }
        $hash = md5(implode("", array_values($fields)) . 'somefancymd5key');
        $this->assertEquals($hash, $data['hash']);
    }

}
