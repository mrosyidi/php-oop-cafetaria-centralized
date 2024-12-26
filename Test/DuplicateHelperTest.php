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
    
    testDuplicateEmpty();