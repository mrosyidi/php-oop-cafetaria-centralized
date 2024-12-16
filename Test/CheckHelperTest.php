<?php

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Helper/CheckHelper.php";

    use Entity\Food;
    use Helper\CheckHelper;

    function testCheckHelperNotFound(): void
    {
        $foods[] = new Food("Mie Ayam", 6000);
        $foods[] = new Food("Pastel", 5000);
        $result = CheckHelper::check($foods, "Ayam Panggang");
        var_dump($result);
    }

    function testCheckHelperFound(): void
    {
        $foods[] = new Food("Mie Ayam", 6000);
        $foods[] = new Food("Pastel", 5000);
        $result = CheckHelper::check($foods, "Mie Ayam");
        var_dump($result);
    }

    testCheckHelperFound();