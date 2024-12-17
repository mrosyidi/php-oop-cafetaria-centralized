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

    testViewShowDrinkEmpty();