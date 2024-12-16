<?php

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";
    require_once __DIR__ . "/../Service/FoodService.php";
    require_once __DIR__ . "/../View/FoodView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";
    require_once __DIR__ . "/../Helper/CheckHelper.php";

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

    function testViewAddFood(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Ayam Panggang", 15000));
        $foodRepository->save(new Food("Pastel", 5000));
        $foodService = new FoodServiceImpl($foodRepository);
        $foodService->showFood();
        $foodView = new FoodView($foodService);
        $foodView->addFood();
        $foodService->showFood();
    }

    function testViewRemoveFood(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodService = new FoodServiceImpl($foodRepository);
        $foodView = new FoodView($foodService);
        $foodService->addFood("Mie Ayam", 6000);
        $foodService->addFood("Ayam Panggang", 15000);
        $foodService->addFood("Pastel", 5000);
        $foodService->showFood();
        $foodView->removeFood();
        $foodService->showFood();
    }

    testViewRemoveFood();