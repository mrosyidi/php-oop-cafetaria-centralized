<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\OrderRepositoryImpl;
    use Service\OrderServiceImpl;

    function testShowOrderEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->showOrder();
    }

    function testShowOrderNotEmpty(): void
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->orders[1] = new Order(1, $food->getName(), $food->getPrice(), 1);
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->orders[2] = new Order(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->orders[3] = new Order(1, $drink->getName(), $drink->getPrice(), 2);
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->showOrder();
    }

    testShowOrderNotEmpty();
