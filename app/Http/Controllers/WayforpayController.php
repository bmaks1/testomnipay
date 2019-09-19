<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bmaks1\Wayforpay\WayforpayGateway;

class WayforpayController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function purchase()
    {
        $Wayforpay = new WayforpayGateway();
        $data = [
            'merchantSecretKey' => 'flk3409refn54t54t*FNJRET',
            'merchantAccount'=>'test_merch_n1',
            'merchantDomainName'=>"www.market.ua",
            'orderReference'=>"DH783023",
            'orderDate'=>time(),
            'amount'=>10,
            'currency'=>"UAH",
            'productName'=>["Shoes"],
            'productCount'=>[1],
            'productPrice'=>[10],
        ];

        var_dump($Wayforpay->purchase($data));



    }



}
