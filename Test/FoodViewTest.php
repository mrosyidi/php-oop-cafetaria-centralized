<?php

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";
    require_once __DIR__ . "/../Service/FoodService.php";
    require_once __DIR__ . "/../View/FoodView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

    use Entity\Food;
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

    function testViewShowFoodNotEmpty(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Ayam Panggang", 15000));
        $foodRepository->save(new Food("Pastel", 5000));
        $foodService = new FoodServiceImpl($foodRepository);
        $foodView = new FoodView($foodService);
        $foodView->showFood();
    }

    testViewShowFoodNotEmpty();