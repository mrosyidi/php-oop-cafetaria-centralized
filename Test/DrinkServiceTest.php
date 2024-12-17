<?php 

    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Repository/DrinkRepository.php";
    require_once __DIR__ . "/../Service/DrinkService.php";

    use Entity\Drink;
    use Repository\DrinkRepositoryImpl;
    use Service\DrinkServiceImpl;

    function testShowDrinkEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->showDrink();
    }

    function testShowDrinkNotEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->addDrink("Jus Jambu", 8000);
        $drinkService->addDrink("Jus Melon", 8000);
        $drinkService->showDrink();
    }

    function testAddDrink(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->showDrink();
        $drinkService->addDrink("Es Teh", 3000);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->showDrink();
    }

    function testGetDrink(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->addDrink("Jus Jambu", 8000);
        $drinkService->addDrink("Jus Melon", 8000);
        $drinks = $drinkService->getDrink();
        var_dump($drinks);
    }

    function testRemoveDrinkFailed(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->addDrink("Jus Jambu", 8000);
        $drinkService->addDrink("Jus Melon", 8000);
        $drinkService->showDrink();
        $drinkService->removeDrink(-1);
        $drinkService->showDrink();
    }

    testRemoveDrinkFailed();
