<?php 

    require_once __DIR__ . "/../Entity/Payment.php";

    use Entity\Payment;

    function testInstancePaymentConstruct(): void
    {
        $payment = new Payment(1, 28000, 50000);
        echo "Kode Pemesanan : " . $payment->getCode() . PHP_EOL;
        echo "Total Pemesanan : " . $payment->getTotal() . PHP_EOL;
        echo "Uang : " . $payment->getPay() . PHP_EOL;
        echo "Kembalian : " . $payment->getChange() . PHP_EOL;
    }

    testInstancePaymentConstruct();
