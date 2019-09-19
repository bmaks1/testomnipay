<?php

namespace Bmaks1\Wayforpay\Message;

use Omnipay\Common\Exception\InvalidRequestException;


class PurchaseRequest extends AbstractRequest
{


    /**
     * @return array
     * @throws InvalidRequestException
     */

    public function getData()
    {
        $this->validate(
            'merchantAccount',
            'merchantDomainName',
            'orderReference',
            'orderDate',
            'amount',
            'currency',
            'productName',
            'productCount',
            'productPrice',
            'merchantSignature'
        );
        $signature = $this->calculateSignature();
        $this->setMerchantSignature($signature);
        return array(
            'merchantAccount'   => $this->getMerchantAccount(),
            'merchantDomainName'=> $this->getMerchantDomainName(),
            'orderReference'    => $this->getOrderReference(),
            'orderDate'         => $this->getOrderDate(),
            'amount'            => $this->getAmount(),
            'currency'          => $this->getCurrency(),
            'productName'       => $this->getProductName(),
            'productCount'      => $this->getProductCount(),
            'productPrice'      => $this->getProductPrice(),
            'merchantSignature' => $this->getMerchantSignature(),

        );
    }

    /**
     * @param array $data
     *
     * @return Response
     */
    public function sendData($data)
    {
        return parent::sendData($data);
       // return $this->response = new Response($this, $data);
    }
}
