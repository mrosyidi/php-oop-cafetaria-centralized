<?php

    require_once __DIR__ . "/../Repository/FoodRepository.php";
    require_once __DIR__ . "/../Service/FoodService.php";
    require_once __DIR__ . "/../View/FoodView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

    use Repository\FoodRepositoryImpl;
    use Service\FoodServiceImpl;
    use View\FoodView;


    function testViewShowFoodEmpty(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodService = new FoodServiceImpl($foodRepository);
        $foodView = new FoodView($foodService);
        $foodView->showFood();
    }

    testViewShowFoodEmpty();