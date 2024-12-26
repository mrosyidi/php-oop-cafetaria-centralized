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
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $food = new Food("Soto Ayam", 12000);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Campur", 12000);
        $orderService->addOrder(1, $drink->getName(), $drink->getPrice(), 2);
        $orderService->showOrder();
    }

    function testAddOrder(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $food = new Food("Pastel", 5000);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Teler", 10000);
        $orderService->addOrder(1, $drink->getName(), $drink->getPrice(), 1);
        $orderService->showOrder();
    }

    function testGetOrder(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $food = new Food("Pastel", 5000);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Teler", 10000);
        $orderService->addOrder(1, $drink->getName(), $drink->getPrice(), 1);
        $orders = $orderService->getOrder();
        var_dump($orders);
    }

    function testRemoveOrderEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->removeOrder(1);
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    function testRemoveOrderNotEmpty(): void
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $food = new Food("Soto Ayam", 12000);
        $orderService->addOrder(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Campur", 12000);
        $orderService->addOrder(2, $drink->getName(), $drink->getPrice(), 2);
        $orderService->removeOrder(2);
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    testRemoveOrderNotEmpty();
