<?php

namespace Bmaks1\Wayforpay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = 'https://secure.wayforpay.com/pay';


    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $response = $this->httpClient->post($url, [], $data);
        $responseData = json_decode($response->getBody(), true);
        return $response; //$this->createResponse($responseData);
    }


    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    public function getMerchantSecretKey()
    {
        return $this->getParameter('merchantSecretKey');
    }

    public function setMerchantSecretKey($value)
    {
        return $this->setParameter('merchantSecretKey', $value);
    }

    public function getMerchantAccount()
    {
        return $this->getParameter('merchantAccount');
    }

    public function setMerchantAccount($value)
    {
        return $this->setParameter('merchantAccount', $value);
    }



    public function getMerchantDomainName()
    {
        return $this->getParameter('merchantDomainName');
    }

    public function setMerchantDomainName($value)
    {
        return $this->setParameter('merchantDomainName', $value);
    }



    public function getOrderReference()
    {
        return $this->getParameter('orderReference');
    }

    public function setOrderReference($value)
    {
        return $this->setParameter('orderReference', $value);
    }



    public function getOrderDate()
    {
        return $this->getParameter('orderDate');
    }

    public function setOrderDate($value)
    {
        return $this->setParameter('orderDate', $value);
    }


    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }


    public function getProductName()
    {
        return $this->getParameter('productName');
    }

    public function setProductName($value)
    {
        return $this->setParameter('productName', $value);
    }


    public function getProductCount()
    {
        return $this->getParameter('productCount');
    }

    public function setProductCount($value)
    {
        return $this->setParameter('productCount', $value);
    }



    public function getProductPrice()
    {
        return $this->getParameter('productPrice');
    }

    public function setProductPrice($value)
    {
        return $this->setParameter('productPrice', $value);
    }

    public function calculateSignature($algorithm="md5")
    {
        $stringParams =
            $this->getMerchantAccount().
            $this->getMerchantDomainName().
            $this->getOrderReference().
            $this->getOrderDate().
            $this->getAmount().
            $this->getCurrency().
            implode(";",$this->getProductName()).
            implode(";",$this->getProductCount()).
            implode(";",$this->getProductPrice());
        return hash_hmac($algorithm,$stringParams,$this->getMerchantSecretKey());
    }

    public function getMerchantSignature()
    {
        return $this->getParameter('merchantSignature');
    }

    public function setMerchantSignature($value)
    {
        return $this->setParameter('merchantSignature', $value);
    }

}
