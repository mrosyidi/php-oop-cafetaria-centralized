<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Helper/RangeHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Helper\RangeHelper;

    function testRangeHelperOutOfRangeMinus(): void
    {
        $foods[1] = new Food("Pastel", 5000);
        $foods[2] = new Food("Ayam Panggang", 15000);
        $foods[3] = new Food("Somay", 8000);
        $result = RangeHelper::range($foods, -1);
        var_dump($result);
    }

    function testRangeHelperOutOfRangePlus(): void
    {
        $foods[1] = new Food("Pastel", 5000);
        $foods[2] = new Food("Ayam Panggang", 15000);
        $foods[3] = new Food("Somay", 8000);
        $result = RangeHelper::range($foods, 4);
        var_dump($result);
    }

    function testRangeHelperInRange(): void
    {
        $drinks[1] = new Drink("Jus Semangka", 8000);
        $drinks[2] = new Drink("Es Campur", 12000);
        $drinks[3] = new Drink("Es Coklat", 12000);
        $result = RangeHelper::range($drinks, 2);
        var_dump($result);
    }

    testRangeHelperInRange();