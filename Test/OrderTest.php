<?php 

    require_once __DIR__ . "/../Entity/Order.php";

    use Entity\Order;

    function testOrderCostruct(): void
    {
        $order = new Order(1, "Mie Goreng", 6000, 2);
        var_dump($order);
    }

    testOrderCostruct();