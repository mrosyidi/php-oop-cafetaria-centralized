<?php 

    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Helper/FindHelper.php";

    use Repository\OrderRepositoryImpl;
    use Service\OrderServiceImpl;
    use Helper\FindHelper;

    function testFindHelperNotFound(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $orderService->addOrder(1, "Mie Ayam", 6000, 2);
        $orderService->addOrder(1, "Es Campur", 12000, 2);
        $orders = $orderRepository->findAll();
        $total = FindHelper::find($orders, 2);
        var_dump($total);
    }

    testFindHelperNotFound();