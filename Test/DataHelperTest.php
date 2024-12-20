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

    function testDataHelperDrink(): void
    {
        $drinks[1] = new Drink("Es Campur", 12000);
        $drinks[2] = new Drink("Es Coklat", 12000);
        $drinks[3] = new Drink("Jus Wortel", 8000);
        $data = DataHelper::data($drinks, 3);
        var_dump($data);
    }

    testDataHelperDrink();