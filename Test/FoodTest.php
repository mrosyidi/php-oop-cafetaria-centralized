<?php

    require_once __DIR__ . "/../Entity/Food.php";

    use Entity\Food;

    function testInstanceFoodConstruct(): void
    {
        $mieGoreng = new Food("Mie Goreng", 7000);
        echo "Nama : " . $mieGoreng->getName() . PHP_EOL;
        echo "Harga : " . $mieGoreng->getPrice() . PHP_EOL;
    }

    function testInstanceFoodEncapsulate(): void
    {
        $sotoAyam = new Food();
        $sotoAyam->setName("Soto Ayam");
        $sotoAyam->setPrice(12000);
        echo "Nama : " . $sotoAyam->getName() . PHP_EOL;
        echo "Harga : " . $sotoAyam->getPrice() . PHP_EOL;
    }

    testInstanceFoodEncapsulate();