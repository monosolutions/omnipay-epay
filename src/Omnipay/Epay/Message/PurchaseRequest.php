<?php

namespace Omnipay\Epay\Message;

use Omnipay\Common\Helper;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\ParameterBag;


/**
 * Epay Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    public function setMerchantnumber($merchantnumber)
    {
        return $this->setParameter('merchantnumber', $merchantnumber);
    }

    public function setPassword($password)
    {
        return $this->setParameter('password', $password);
    }

    public function getPassword() {
        return $this->getParameter('password');
    }
    public function setCurrency($currency)
    {
        return $this->setParameter('currency', $currency);
    }

    public function setAmount($amount)
    {
        return $this->setParameter('amount', $amount);
    }

    public function setSecret($secret)
    {
        return $this->setParameter('secret', $secret);
    }

    public function setOrderid($orderid)
    {
        return $this->setParameter('orderid', $orderid);
    }


    public function setWindowstate($windowstate)
    {
        return $this->setParameter('windowstate', $windowstate);
    }

    public function setMobile($mobile)
    {
        return $this->setParameter('mobile', $mobile);
    }

    public function setWindowid($windowid)
    {
        return $this->setParameter('windowid', $windowid);
    }

    public function setPaymentcollection($paymentcollection)
    {
        return $this->setParameter('paymentcollection', $paymentcollection);
    }

    public function setLockpaymentcollection($lockpaymentcollection)
    {
        return $this->setParameter('lockpaymentcollection', $lockpaymentcollection);
    }

    public function setPaymenttype($paymenttype)
    {
        return $this->setParameter('paymenttype', $paymenttype);
    }

    public function setLanguage($language)
    {
        return $this->setParameter('language', $language);
    }

    public function setEncoding($encoding)
    {
        return $this->setParameter('encoding', $encoding);
    }

    public function setCssurl($cssurl)
    {
        return $this->setParameter('cssurl', $cssurl);
    }

    public function setMobilecssurl($mobilecssurl)
    {
        return $this->setParameter('mobilecssurl', $mobilecssurl);
    }

    public function setInstantcapture($instantcapture)
    {
        return $this->setParameter('instantcapture', $instantcapture);
    }

    public function setSplitpayment($splitpayment)
    {
        return $this->setParameter('splitpayment', $splitpayment);
    }

    public function setInstantcallback($instantcallback)
    {
        return $this->setParameter('instantcallback', $instantcallback);
    }

    public function setCallbackurl($callbackurl)
    {
        return $this->setParameter('callbackurl', $callbackurl);
    }

    public function setAccepturl($accepturl)
    {
        return $this->setParameter('accepturl', $accepturl);
    }

    public function setCancelurl($cancelurl)
    {
        return $this->setParameter('cancelurl', $cancelurl);
    }

    public function setOwnreceipt($ownreceipt)
    {
        return $this->setParameter('ownreceipt', $ownreceipt);
    }

    public function setOrdertext($ordertext)
    {
        return $this->setParameter('ordertext', $ordertext);
    }

    public function setGroup($group)
    {
        return $this->setParameter('group', $group);
    }

    public function setDescription($description)
    {
        return $this->setParameter('description', $description);
    }

    public function setSubscription($subscription)
    {
        return $this->setParameter('subscription', $subscription);
    }

    public function setSubscriptionname($subscriptionname)
    {
        return $this->setParameter('subscriptionname', $subscriptionname);
    }

    public function setMailreceipt($mailreceipt)
    {
        return $this->setParameter('mailreceipt', $mailreceipt);
    }

    public function setGoogletracker($googletracker)
    {
        return $this->setParameter('googletracker', $googletracker);
    }

    public function setBackgroundcolor($backgroundcolor)
    {
        return $this->setParameter('backgroundcolor', $backgroundcolor);
    }

    public function setOpacity($opacity)
    {
        return $this->setParameter('opacity', $opacity);
    }

    public function setDeclinetext($declinetext)
    {
        return $this->setParameter('declinetext', $declinetext);
    }

    public function setIframeheight($iframeheight)
    {
        return $this->setParameter('iframeheight', $iframeheight);
    }

    public function setIframewidth($iframewidth)
    {
        return $this->setParameter('iframewidth', $iframewidth);
    }

    public function setTimeout($timeout)
    {
        return $this->setParameter('timeout', $timeout);
    }

    public function setUrldata($urldata)
    {
        return $this->setParameter('urldata', $urldata);
    }

    public function getMerchantnumber()
    {
        return $this->getParameter('merchantnumber');
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function getOwnreceipt()
    {
        return $this->getParameter('ownreceipt');
    }

    public function getTimeout()
    {
        return $this->getParameter('timeout');
    }

    public function getPaymentcollection()
    {
        return $this->getParameter('paymentcollection');
    }

    public function getLockpaymentcollection()
    {
        return $this->getParameter('lockpaymentcollection');
    }

    public function getWindowid()
    {
        return $this->getParameter('windowid');
    }

    public function getEpayLanguageCode()
    {
        list($language) = explode('_', strtolower($this->getLanguage()));
        switch ($language) {
            case 'da':
                return 1;
            case 'en':
                return 2;
            case 'sv':
                return 3;
            case 'no':
                return 4;
            case 'kl':
                return 5;
            case 'is':
                return 6;
            case 'de':
                return 7;
            case 'fi':
                return 8;
            case 'es':
                return 9;
            case 'fr':
                return 10;
            case 'pl':
                return 11;
            case 'it':
                return 12;
            case 'nl':
                return 13;
            default:
                return 0;
        }
    }

    public function getSupportedKeys()
    {

        return [
            'merchantnumber',
            'currency',
            'amount',
            'orderid',
            'windowstate',
            'mobile',
            'windowid',
            'paymentcollection',
            'lockpaymentcollection',
            'paymenttype',
            'language',
            'encoding',
            'cssurl',
            'mobilecssurl',
            'instantcapture',
            'splitpayment',
            'instantcallback',
            'callbackurl',
            'accepturl',
            'cancelurl',
            'ownreceipt',
            'ordertext',
            'group',
            'description',
            'subscription',
            'subscriptionname',
            'mailreceipt',
            'googletracker',
            'backgroundcolor',
            'opacity',
            'declinetext',
            'iframeheight',
            'iframewidth',
            'timeout',
            'secret',
        ];
    }

    public function getUrldata()
    {
        return $this->getParameter('urldata');
    }

    public function getData()
    {
        $this->validate('merchantnumber', 'currency', 'accepturl', 'amount');

        $data = array();
        foreach ($this->getSupportedKeys() as $key) {
            $value = $this->get($key);
            if ($value !== null || !empty($value)) {
                $data[$key] = $value;
            }
        }
        $data['amount'] = $this->getAmountInteger();
        $data['currency'] = $this->getCurrencyNumeric();
        $data['language'] = $this->getEpayLanguageCode();
        if (isset($data['secret'])) {
            unset($data['secret']);
            $data['hash'] = md5(implode("", array_values($data)) . $this->getParameter('secret'));
        }
        if ($this->getUrldata()) {
            $data['urldata'] = $this->getUrldata();
        }

        return $data;
    }

    protected function get($key)
    {
        $getName = 'get' . ucfirst($key);
        if (!method_exists($this, $getName)) {
            return $this->getParameter($key);
        }
        return $this->{$getName}();
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
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
