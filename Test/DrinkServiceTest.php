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
        $drinkRepository->drinks[1] = new Drink("Es Coklat", 12000);
        $drinkRepository->drinks[2] = new Drink("Jus Jambu", 8000);
        $drinkRepository->drinks[3] = new Drink("Jus Melon", 8000);
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->showDrink();
    }

    testShowDrinkNotEmpty();
