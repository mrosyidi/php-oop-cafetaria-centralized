<?php 

    require_once __DIR__ . "/../Entity/Detail.php";

    use Entity\Detail;

    function testDetailCostruct(): void
    {
        $detail = new Detail(1, "Mie Goreng", 6000, 2);
        var_dump($detail);
    }

    function testDetailEncapsulate(): void
    {
        $detail = new Detail();
        $detail->setCode(1);
        $detail->setName("Mie Goreng");
        $detail->setPrice(6000);
        $detail->setQty(2);
        $detail->setSubTotal();
        var_dump($detail);
    }

    testDetailEncapsulate();