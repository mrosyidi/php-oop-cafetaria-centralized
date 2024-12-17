<?php 

    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Repository/DrinkRepository.php";
    require_once __DIR__ . "/../Service/DrinkService.php";
    require_once __DIR__ . "/../View/DrinkView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

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
        $drinkRepository->drinks[1] = new Drink("Es Teh", 3000);
        $drinkRepository->drinks[2] = new Drink("Es Coklat", 12000);
        $drinkRepository->drinks[3] = new Drink("Jus Wortel", 8000);
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $drinkView = new DrinkView($drinkService);
        $drinkView->showDrink();
    }

    testViewShowDrinkNotEmpty();