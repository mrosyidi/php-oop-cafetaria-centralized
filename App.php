<?php 

    require_once __DIR__ . "/Entity/Food.php";
    require_once __DIR__ . "/Repository/FoodRepository.php";
    require_once __DIR__ . "/Service/FoodService.php";

    use Repository\FoodRepositoryImpl;
    use Service\FoodServiceImpl;

    echo "Cafetaria App" . PHP_EOL;