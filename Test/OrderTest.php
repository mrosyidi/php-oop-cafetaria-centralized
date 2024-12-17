<?php 

    require_once __DIR__ . "/../Entity/Order.php";

    use Entity\Order;

    function testOrderCostruct(): void
    {
        $order = new Order(1, "Mie Goreng", 6000, 2);
        var_dump($order);
    }

    function testOrderEncapsulate(): void
    {
        $order = new Order();
        $order->setCode(1);
        $order->setName("Mie Goreng");
        $order->setPrice(6000);
        $order->setQty(2);
        $order->setSubTotal();
        var_dump($order);
    }

    testOrderEncapsulate();