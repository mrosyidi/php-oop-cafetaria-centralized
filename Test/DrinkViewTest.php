<?php 

    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Repository/DrinkRepository.php";
    require_once __DIR__ . "/../Service/DrinkService.php";
    require_once __DIR__ . "/../View/DrinkView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";
    require_once __DIR__ . "/../Helper/CheckHelper.php";

    use Entity\Drink;
    use Repository\DrinkRepositoryImpl;
    use Service\DrinkServiceImpl;
    use View\DrinkView;

    function testViewShowDrinkEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkView = new DrinkView($drinkService);
        $drinkView->showDrink();
    }

    function testViewShowDrinkNotEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->addDrink("Es Teh", 3000);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->addDrink("Jus Wortel", 8000);
        $drinkView = new DrinkView($drinkService);
        $drinkView->showDrink();
    }

    function testViewAddDrink(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkService->addDrink("Es Teh", 3000);
        $drinkService->addDrink("Es Coklat", 12000);
        $drinkService->addDrink("Jus Wortel", 8000);
        $drinkView = new DrinkView($drinkService);
        $drinkService->showDrink();
        $drinkView->addDrink();
        $drinkService->showDrink();
    }

    testViewShowDrinkNotEmpty();