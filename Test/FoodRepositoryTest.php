<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";

    use Entity\Food;
    use Repository\FoodRepositoryImpl;

    function testFindAll(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $food = new Food("Mie Goreng", 6000);
        $foodRepository->save($food);
        $food = new Food("Soto Ayam", 12000);
        $foodRepository->save($food);
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

    function testRemoveFailed(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Mie Ayam", 6000));
        $foodRepository->save(new Food("Soto Ayam", 12000));
        $foodRepository->save(new Food("Rawon", 15000));
        $foodRepository->save(new Food("Ayam Panggang", 15000));
        $foods = $foodRepository->findAll();
        var_dump($foods);
        $result = $foodRepository->remove(-1);
        var_dump($result);
        $foods = $foodRepository->findAll();
        var_dump($foods);
    }


    testRemoveFailed();