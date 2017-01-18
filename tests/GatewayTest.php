<?php
namespace Omnipay\Epay;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /** @var  Gateway */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testCapture()
    {
        $request = $this->gateway->capture(array('amount' => '10.00', 'transactionId' => 1));
        $this->assertInstanceOf('Omnipay\Epay\Message\CaptureRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
        $this->assertTrue(count($request->getData()) > 0);
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));
        $this->assertInstanceOf('Omnipay\Epay\Message\PurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testRefund()
    {
        $request = $this->gateway->refund(array('amount' => '10.00'));
        $this->assertInstanceOf('Omnipay\Epay\Message\RefundRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testCompletePurchase()
    {
        $request = $this->gateway->completePurchase(['amount' => 10.00]);
        $this->assertInstanceOf('Omnipay\Epay\Message\CompletePurchaseRequest', $request);
    }

}
