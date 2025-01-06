<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    public function index()
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-osST89bTb7nqtlaitMNMmadN';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => time(),
                'gross_amount' => 250000,
            ),
            'customer_details' => array(
                'first_name' => 'Kiple',
                'last_name' => 'Kontol',
                'email' => 'kiple@gmail.com',
                'phone' => '085774508370',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data['token'] = $snapToken;

        return view('index', $data);
    }
}
