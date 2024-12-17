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

    testShowDrinkEmpty();
