<?php

namespace Bmaks1\Wayforpay;

use Omnipay\Common\AbstractGateway;

/**
 * Wayforpay Gateway
 */
class WayforpayGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Wayforpay';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantSecretKey' => 'flk3409refn54t54t*FNJRET',
            'merchantAccount' => 'test_merch_n1',
            'merchantAuthType' => 'SimpleSignature',
            'merchantDomainName' => '',
            'merchantTransactionType' => 'AUTO',
            'merchantTransactionSecureType' => 'AUTO',
            'merchantSignature' => '',
            'language' => 'AUTO',
            'returnUrl' => '',
            'serviceUrl' => '',
            'orderDate' => '',
            'orderNo' => '',
            'amount' => '',
            'currency' => '',
            'alternativeAmount' => '',
            'alternativeCurrency' => '',
            'holdTimeout' => '',
            'orderLifetime' => '',
            'recToken' => '',
            'productName' => [],
            'productPrice' => [],
            'productCount' => [],
            'clientAccountId' => '',
            'socialUri' => '',
            'clientFirstName' => '',
            'clientLastName' => '',
            'clientAddress' => '',
            'clientCity' => '',
            'clientState' => '',
            'clientZipCode' => '',
        );
    }




    public function purchase($params=[])
    {

        return $this->createRequest('Bmaks1\Wayforpay\Message\PurchaseRequest',  $params )->send();
    }


}
