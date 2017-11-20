<?php

namespace Omnipay\Epay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Epay\Message\CaptureRequest;
use Omnipay\Epay\Message\CompletePurchaseRequest;
use Omnipay\Epay\Message\DeleteRequest;
use Omnipay\Epay\Message\PurchaseRequest;
use Omnipay\Epay\Message\RefundRequest;

/**
 * Epay Gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Epay';
    }

    /**
     * @link http://tech.epay.dk/en/payment-window-parameters
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantnumber' => '',
            'secret' => '',
            'language' => '0',
            'ownreceipt' => '1',
            'timeout' => null,
            'paymentcollection' => '1',
            'lockpaymentcollection' => '1',
            'windowid' => '1',
            'password' => '',
        );
    }

    public function getTimeout()
    {
        return $this->getParameter('timeout');
    }

    public function setTimeout($timeout)
    {
        return $this->setParameter('timeout', $timeout);
    }
    
    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($password)
    {
        return $this->setParameter('password', $password);
    }


    public function getMerchantnumber()
    {
        return $this->getParameter('merchantnumber');
    }

    public function setMerchantnumber($merchantNumber)
    {
        return $this->setParameter('merchantnumber', (string) $merchantNumber);
    }

    public function setPaymenttype($paymenttype)
    {
        return $this->setParameter('paymenttype', $paymenttype);
    }

    public function setPaymentcollection($paymentcollection)
    {
        return $this->setParameter('paymentcollection', $paymentcollection);
    }

    public function getPaymentcollection()
    {
        return $this->getParameter('paymentcollection');
    }

    public function getPaymenttype()
    {
        return $this->getParameter('paymenttype');
    }

    public function setLockpaymentcollection($lockpaymentcollection)
    {
        return $this->setParameter('lockpaymentcollection', $lockpaymentcollection);
    }

    public function getLockpaymentcollection()
    {
        return $this->getParameter('lockpaymentcollection');
    }

    public function getOwnreceipt()
    {
        return $this->getParameter('ownreceipt');
    }

    public function setOwnreceipt($ownreceipt)
    {
        return $this->setParameter('ownreceipt', $ownreceipt);
    }

    public function getWindowid()
    {
        return $this->getParameter('windowid');
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($secret)
    {
        return $this->setParameter('secret', $secret);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($language)
    {
        return $this->setParameter('language', $language);
    }

    public function setWindowstate($windowstate)
    {
        return $this->setParameter('windowstate', $windowstate);
    }

    public function setWindowid($windowId)
    {
        return $this->setParameter('windowid', $windowId);
    }

    public function setMobile($mobile)
    {
        return $this->setParameter('mobile', $mobile);

    }

    // This is the same in both instances since epay recommendes using the payment window.
    public function authorize(array $parameters = array())
    {
        return $this->purchase($parameters);
    }

    // This is the same in both instances since epay recommendes using the payment window.
    public function completeAuthorize(array $parameters = array())
    {
        return $this->purchase($parameters);
    }

    /**
     * @param array $parameters
     * @return PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Epay\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Epay\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Epay\Message\CaptureRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return RefundRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Epay\Message\RefundRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return DeleteRequest
     */
    public function delete(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Epay\Message\DeleteRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return DeleteRequest
     */
    public function getTransaction(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Epay\Message\GetTransactionRequest', $parameters);
    }
}
