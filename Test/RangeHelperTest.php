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

    testRangeHelperOutOfRangeMinus();