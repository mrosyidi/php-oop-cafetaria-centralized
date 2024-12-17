<?php 

    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Repository/DrinkRepository.php";

    use Entity\Drink;
    use Repository\DrinkRepositoryImpl;

    function testFindAllEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinks = $drinkRepository->findAll();
        var_dump($drinks);
    }

    function testFindAllNotEmpty(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkRepository->drinks[1] = new Drink("Es Teh", 3000);
        $drinkRepository->drinks[2] = new Drink("Es Coklat", 12000);
        $drinkRepository->drinks[3] = new Drink("Jus Wortel", 8000);
        $drinks = $drinkRepository->findAll();
        var_dump($drinks);
    }

    function testSave(): void
    {
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkRepository->save(new Drink("Es Campur", 16000));
        $drinks = $drinkRepository->findAll();
        var_dump($drinks);
    }

    testSave();
