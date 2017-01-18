<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;

class CompletePurchaseRequestTest extends TestCase
{
    /** @var  CompletePurchaseRequest */
    protected $request;
    /** @var  Request */
    protected $mockRequest;

    public function setUp()
    {
        parent::setUp();
        $this->mockRequest = $this->getHttpRequest();
        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $this->mockRequest);
    }

    public function testGetData()
    {
        $this->request->initialize(
            ['privateKey' => 1]
        );
        $data = $this->request->getData();
        $this->assertTrue(is_array($data));
        $this->assertTrue(count($data) === 0);
    }

    public function testGeneratingHash()
    {

        $query = array(
            'txnid' => '93318117',
            'orderid' => '41',
            'amount' => '2750',
            'currency' => '978',
            'date' => '20170117',
            'time' => '1907',
            'txnfee' => '0',
            'paymenttype' => '3',
            'cardno' => '333333XXXXXX3000',
            'hash' => 'f0571821c3263299b964074c948a3ade',
        );
        $this->mockRequest->initialize(
            $query
        );
        $this->request->initialize(['secret' => 'somefancymd5key']);
        try {
            // This will throw an exception if the hash doesn't match.
            $this->request->getData();
        } catch (InvalidResponseException $e) {
            $this->fail('We didn\'t expect an exception here');
        }

    }
}
