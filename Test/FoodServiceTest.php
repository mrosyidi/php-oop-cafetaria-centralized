<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";
    require_once __DIR__ . "/../Service/FoodService.php";

    use Entity\Food;
    use Repository\FoodRepositoryImpl;
    use Service\FoodServiceImpl;

    function testShowFoodEmpty(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodService = new FoodServiceImpl($foodRepository);
        $foodService->showFood();
    }

    function testShowFood(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Pastel", 5000));
        $foodRepository->save(new Food("Rawon", 15000));
        $foodService = new FoodServiceImpl($foodRepository);
        $foodService->showFood();
    }

    testShowFood();