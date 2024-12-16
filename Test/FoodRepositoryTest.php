<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";

    use Entity\Food;
    use Repository\FoodRepositoryImpl;

    function testFindAll(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $food = new Food("Mie Goreng", 6000);
        $foodRepository->foods[1] = $food;
        $food = new Food("Soto Ayam", 12000);
        $foodRepository->foods[2] = $food;
        $foods = $foodRepository->findAll();
        var_dump($foods);
    }

    function testSave(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $food = new Food("Ayam Panggang", 15000);
        $foodRepository->save($food);
        $foods = $foodRepository->findAll();
        var_dump($foods);
    }

    testSave();