<?php 

    require_once __DIR__ . "/Entity/Food.php";
    require_once __DIR__ . "/Repository/FoodRepository.php";
    require_once __DIR__ . "/Service/FoodService.php";
    require_once __DIR__ . "/View/FoodView.php";

    use Repository\FoodRepositoryImpl;
    use Service\FoodServiceImpl;
    use View\FoodView;

    echo "Cafetaria App" . PHP_EOL;