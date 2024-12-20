<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Helper/DataHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Helper\DataHelper;

    function testDataHelperFood(): void
    {
        $foods[1] = new Food("Mie Ayam", 6000);
        $foods[2] = new Food("Pastel", 5000);
        $foods[3] = new Food("Soto Ayam", 12000);
        $data = DataHelper::data($foods, 2);
        var_dump($data);
    }

    testDataHelperFood();