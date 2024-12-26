<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Helper/DuplicateHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\OrderRepositoryImpl;
    use Service\OrderServiceImpl;
    use Helper\DuplicateHelper;

    function testDuplicateEmpty(): void 
    {
        $orderRepository = new OrderRepositoryImpl();
        $orders = $orderRepository->findAll();
        $elements = DuplicateHelper::duplicate($orders, 2);
        var_dump($elements);
    }

    function testDuplicateNotEmpty(): void 
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 3));
        $food = new Food("Soto Ayam", 10000);
        $orderRepository->save(new Order(2, $food->getName(), $food->getPrice(), 2));
        $drink = new Drink("Es Oyen", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $elements = DuplicateHelper::duplicate($orders, 2);
        var_dump($elements);
    }


    testDuplicateNotEmpty();