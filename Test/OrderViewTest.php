<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Repository/FoodRepository.php";
    require_once __DIR__ . "/../Repository/DrinkRepository.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Service/FoodService.php";
    require_once __DIR__ . "/../Service/DrinkService.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../View/OrderView.php";
    require_once __DIR__ . "/../Helper/CodeHelper.php";
    require_once __DIR__ . "/../Helper/DataHelper.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";
    require_once __DIR__ . "/../Helper/RangeHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\FoodRepositoryImpl;
    use Repository\DrinkRepositoryImpl;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Service\FoodServiceImpl;
    use Service\DrinkServiceImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;
    use View\OrderView;

    function testViewShowOrderEmpty(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Mie Ayam", 6000));
        $foodRepository->save(new Food("Soto Ayam", 10000));
        $foodRepository->save(new Food("Rawon", 12000));
        $foodService = new FoodServiceImpl($foodRepository);
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkRepository->save(new Drink("Es Coklat", 12000));
        $drinkRepository->save(new Drink("Es Teh", 4000));
        $drinkRepository->save(new Drink("Jus Wortel", 6000));
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderView = new OrderView($orderService, $foodService, $drinkService, $paymentService);
        $orderView->showOrder();
    }

    function testViewShowOrderNotEmpty(): void
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodRepository->save(new Food("Mie Ayam", 6000));
        $foodRepository->save(new Food("Soto Ayam", 10000));
        $foodRepository->save(new Food("Rawon", 12000));
        $foodService = new FoodServiceImpl($foodRepository);
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkRepository->save(new Drink("Es Coklat", 12000));
        $drinkRepository->save(new Drink("Es Teh", 4000));
        $drinkRepository->save(new Drink("Jus Wortel", 6000));
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->addOrder(1, "Mie Goreng", 6000, 1);
        $orderService->addOrder(1, "Batagor", 8000, 1);
        $orderService->addOrder(1, "Es Campur", 12000, 2);
        $orderView = new OrderView($orderService, $foodService, $drinkService);
        $orderView->showOrder();
    }

    function testViewAddOrderFood(): void 
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodService = new FoodServiceImpl($foodRepository);
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $foodRepository->save(new Food("Mie Goreng", 6000));
        $foodRepository->save(new Food("Pastel", 4000));
        $foodRepository->save(new Food("Soto Ayam", 12000));
        $orderView = new OrderView($orderService, $foodService, $drinkService);
        $orderView->addOrder(1, false);
        $orderService->showOrder();
        $orderView->addOrder(1, false);
        $orderService->showOrder();
        $orderView->addOrder(1, true);
        $orderService->showOrder();
    }

    function testViewAddOrderDrink(): void 
    {
        $foodRepository = new FoodRepositoryImpl();
        $foodService = new FoodServiceImpl($foodRepository);
        $drinkRepository = new DrinkRepositoryImpl();
        $drinkService = new DrinkServiceImpl($drinkRepository);
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $drinkRepository->save(new Drink("Jus Wortel", 6000));
        $drinkRepository->save(new Drink("Es Teh", 4000));
        $drinkRepository->save(new Drink("Es Coklat", 12000));
        $orderView = new OrderView($orderService, $foodService, $drinkService);
        $orderView->addOrder(2, false);
        $orderService->showOrder();
        $orderView->addOrder(2, false);
        $orderService->showOrder();
        $orderView->addOrder(2, true);
        $orderService->showOrder();
    }

    testViewShowOrderEmpty();