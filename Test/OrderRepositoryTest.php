<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\OrderRepositoryImpl;

    function testFindAllEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    function testFindAllNotEmpty(): void
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 3));
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    function testSave(): void 
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 3));
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    testFindAllNotEmpty();